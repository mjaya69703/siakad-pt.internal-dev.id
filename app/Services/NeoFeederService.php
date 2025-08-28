<?php

namespace App\Services;

use App\Models\Mahasiswa;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\Kelas;
use App\Models\Akademik\KRS;
use App\Models\Akademik\Nilai;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Exception;

class NeoFeederService
{
    protected $baseUrl;
    protected $username;
    protected $password;
    protected $token;

    public function __construct()
    {
        $this->baseUrl = config('services.neo_feeder.base_url', 'http://localhost:3003/ws');
        $this->username = config('services.neo_feeder.username');
        $this->password = config('services.neo_feeder.password');
    }

    /**
     * Get authentication token from Neo Feeder
     */
    public function authenticate(): array
    {
        try {
            $response = Http::timeout(30)->post($this->baseUrl . '/live2.php', [
                'act' => 'GetToken',
                'username' => $this->username,
                'password' => $this->password,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['data']['token'])) {
                    $this->token = $data['data']['token'];
                    
                    // Cache token for 1 hour
                    Cache::put('neo_feeder_token', $this->token, 3600);
                    
                    return [
                        'success' => true,
                        'token' => $this->token,
                        'message' => 'Authentication successful'
                    ];
                }
            }

            return [
                'success' => false,
                'message' => 'Authentication failed',
                'response' => $response->json()
            ];

        } catch (Exception $e) {
            Log::error('Neo Feeder Authentication Error: ' . $e->getMessage());
            
            return [
                'success' => false,
                'message' => 'Connection error: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Get cached token or authenticate
     */
    protected function getToken(): string
    {
        $token = Cache::get('neo_feeder_token');
        
        if (!$token) {
            $auth = $this->authenticate();
            if (!$auth['success']) {
                throw new Exception('Failed to authenticate with Neo Feeder');
            }
            $token = $auth['token'];
        }
        
        return $token;
    }

    /**
     * Make API request to Neo Feeder
     */
    protected function makeRequest(string $act, array $record = []): array
    {
        try {
            $token = $this->getToken();
            
            $payload = [
                'act' => $act,
                'token' => $token,
            ];
            
            if (!empty($record)) {
                $payload['record'] = $record;
            }

            $response = Http::timeout(60)->post($this->baseUrl . '/live2.php', $payload);
            
            if ($response->successful()) {
                return $response->json();
            }
            
            throw new Exception('API request failed: ' . $response->status());
            
        } catch (Exception $e) {
            Log::error('Neo Feeder API Error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Sync student data to Neo Feeder
     */
    public function syncMahasiswa(Mahasiswa $mahasiswa): array
    {
        try {
            // Prepare student data for Neo Feeder
            $studentData = [
                'nim' => $mahasiswa->nim,
                'nama_mahasiswa' => $mahasiswa->name,
                'jenis_kelamin' => $mahasiswa->bio_gender === 'Laki-laki' ? 'L' : 'P',
                'tanggal_lahir' => $mahasiswa->bio_datebirth,
                'tempat_lahir' => $mahasiswa->bio_placebirth,
                'id_agama' => $this->mapReligion($mahasiswa->bio_religion),
                'nik' => $mahasiswa->numb_ktp,
                'nisn' => $mahasiswa->numb_nisn ?? '',
                'npwp' => $mahasiswa->numb_npwp ?? '',
                'id_jenis_tinggal' => 1, // Default value
                'id_alat_transportasi' => 1, // Default value
                'telepon' => $mahasiswa->phone,
                'handphone' => $mahasiswa->phone,
                'email' => $mahasiswa->email,
                'id_pekerjaan_ayah' => $this->mapJob($mahasiswa->par_father_job),
                'id_penghasilan_ayah' => $this->mapIncome($mahasiswa->par_father_income),
                'nama_ayah' => $mahasiswa->par_father_name ?? '',
                'tanggal_lahir_ayah' => null, // Not available
                'id_pendidikan_ayah' => 1, // Default
                'id_pekerjaan_ibu' => $this->mapJob($mahasiswa->par_mother_job),
                'id_penghasilan_ibu' => $this->mapIncome($mahasiswa->par_mother_income),
                'nama_ibu_kandung' => $mahasiswa->par_mother_name ?? '',
                'tanggal_lahir_ibu' => null, // Not available
                'id_pendidikan_ibu' => 1, // Default
                'nama_wali' => $mahasiswa->par_guardian_name ?? '',
                'tanggal_lahir_wali' => null,
                'id_pendidikan_wali' => 1,
                'id_pekerjaan_wali' => 1,
                'id_penghasilan_wali' => 1,
                'kewarganegaraan' => 'ID', // Default Indonesia
            ];\n\n            // Send to Neo Feeder\n            $response = $this->makeRequest('InsertBiodataMahasiswa', $studentData);\n            \n            if (isset($response['error_code']) && $response['error_code'] == 0) {\n                // Update local record with Neo Feeder ID if provided\n                if (isset($response['data']['id_mahasiswa'])) {\n                    $mahasiswa->update([\n                        'neo_feeder_id' => $response['data']['id_mahasiswa'],\n                        'neo_feeder_synced_at' => now(),\n                    ]);\n                }\n                \n                return [\n                    'success' => true,\n                    'message' => 'Mahasiswa berhasil disinkronisasi ke Neo Feeder',\n                    'neo_feeder_response' => $response\n                ];\n            }\n            \n            return [\n                'success' => false,\n                'message' => 'Sinkronisasi gagal: ' . ($response['error_desc'] ?? 'Unknown error'),\n                'neo_feeder_response' => $response\n            ];\n            \n        } catch (Exception $e) {\n            Log::error('Neo Feeder Sync Mahasiswa Error: ' . $e->getMessage(), [\n                'mahasiswa_id' => $mahasiswa->id,\n                'nim' => $mahasiswa->nim\n            ]);\n            \n            return [\n                'success' => false,\n                'message' => 'Error sinkronisasi: ' . $e->getMessage()\n            ];\n        }\n    }\n\n    /**\n     * Sync academic registration (KRS) to Neo Feeder\n     */\n    public function syncKRS(KRS $krs): array\n    {\n        try {\n            $krsData = [\n                'id_registrasi_mahasiswa' => $krs->mahasiswa->neo_feeder_id,\n                'id_periode' => $this->getNeoFeederPeriodId($krs->taka_id),\n                'id_prodi' => $krs->mahasiswa->programStudi->neo_feeder_id,\n                'id_status_mahasiswa' => $this->mapStudentStatus($krs->mahasiswa->status),\n                'ips' => $krs->ips ?? 0,\n                'ipk' => $krs->ipk ?? 0,\n                'sks_semester' => $krs->total_sks ?? 0,\n                'sks_total' => $krs->mahasiswa->total_sks ?? 0,\n                'biaya_kuliah_smt' => $this->getTotalBillingSemester($krs->mahasiswa, $krs->semester),\n            ];\n\n            $response = $this->makeRequest('InsertPerkuliahanMahasiswa', $krsData);\n            \n            if (isset($response['error_code']) && $response['error_code'] == 0) {\n                $krs->update([\n                    'neo_feeder_id' => $response['data']['id_registrasi_mahasiswa'] ?? null,\n                    'neo_feeder_synced_at' => now(),\n                ]);\n                \n                return [\n                    'success' => true,\n                    'message' => 'KRS berhasil disinkronisasi ke Neo Feeder'\n                ];\n            }\n            \n            return [\n                'success' => false,\n                'message' => 'Sinkronisasi KRS gagal: ' . ($response['error_desc'] ?? 'Unknown error')\n            ];\n            \n        } catch (Exception $e) {\n            Log::error('Neo Feeder Sync KRS Error: ' . $e->getMessage());\n            \n            return [\n                'success' => false,\n                'message' => 'Error sinkronisasi KRS: ' . $e->getMessage()\n            ];\n        }\n    }\n\n    /**\n     * Sync student grades to Neo Feeder\n     */\n    public function syncNilai(Nilai $nilai): array\n    {\n        try {\n            $nilaiData = [\n                'id_registrasi_mahasiswa' => $nilai->mahasiswa->neo_feeder_id,\n                'id_kelas_kuliah' => $nilai->kelasKuliah->neo_feeder_id ?? null,\n                'nilai_angka' => $nilai->nilai_angka,\n                'nilai_indeks' => $nilai->nilai_indeks,\n                'nilai_huruf' => $nilai->nilai_huruf,\n                'sks' => $nilai->mataKuliah->sks ?? 0,\n            ];\n\n            $response = $this->makeRequest('InsertNilaiPerkuliahanMahasiswa', $nilaiData);\n            \n            if (isset($response['error_code']) && $response['error_code'] == 0) {\n                $nilai->update([\n                    'neo_feeder_synced_at' => now(),\n                ]);\n                \n                return [\n                    'success' => true,\n                    'message' => 'Nilai berhasil disinkronisasi ke Neo Feeder'\n                ];\n            }\n            \n            return [\n                'success' => false,\n                'message' => 'Sinkronisasi nilai gagal: ' . ($response['error_desc'] ?? 'Unknown error')\n            ];\n            \n        } catch (Exception $e) {\n            Log::error('Neo Feeder Sync Nilai Error: ' . $e->getMessage());\n            \n            return [\n                'success' => false,\n                'message' => 'Error sinkronisasi nilai: ' . $e->getMessage()\n            ];\n        }\n    }\n\n    /**\n     * Bulk sync multiple students\n     */\n    public function bulkSyncMahasiswa(array $mahasiswaIds): array\n    {\n        $results = [\n            'success' => [],\n            'failed' => [],\n            'summary' => [\n                'total' => count($mahasiswaIds),\n                'success_count' => 0,\n                'failed_count' => 0,\n            ]\n        ];\n\n        foreach ($mahasiswaIds as $mahasiswaId) {\n            $mahasiswa = Mahasiswa::find($mahasiswaId);\n            \n            if (!$mahasiswa) {\n                $results['failed'][] = [\n                    'id' => $mahasiswaId,\n                    'message' => 'Mahasiswa tidak ditemukan'\n                ];\n                $results['summary']['failed_count']++;\n                continue;\n            }\n\n            $syncResult = $this->syncMahasiswa($mahasiswa);\n            \n            if ($syncResult['success']) {\n                $results['success'][] = [\n                    'mahasiswa_id' => $mahasiswa->id,\n                    'nim' => $mahasiswa->nim,\n                    'name' => $mahasiswa->name,\n                ];\n                $results['summary']['success_count']++;\n            } else {\n                $results['failed'][] = [\n                    'mahasiswa_id' => $mahasiswa->id,\n                    'nim' => $mahasiswa->nim,\n                    'name' => $mahasiswa->name,\n                    'message' => $syncResult['message']\n                ];\n                $results['summary']['failed_count']++;\n            }\n            \n            // Add delay to prevent API rate limiting\n            usleep(500000); // 0.5 second delay\n        }\n\n        return $results;\n    }\n\n    /**\n     * Get students that need to be synced\n     */\n    public function getPendingSyncMahasiswa()\n    {\n        return Mahasiswa::where('status', 'Aktif')\n                       ->where(function($query) {\n                           $query->whereNull('neo_feeder_synced_at')\n                                 ->orWhere('updated_at', '>', 'neo_feeder_synced_at');\n                       })\n                       ->with(['programStudi'])\n                       ->get();\n    }\n\n    // Helper methods for mapping data\n    private function mapReligion($religion): int\n    {\n        $religions = [\n            'Islam' => 1,\n            'Kristen Protestan' => 2,\n            'Kristen Katolik' => 3,\n            'Hindu' => 4,\n            'Buddha' => 5,\n            'Konghuchu' => 6,\n        ];\n        \n        return $religions[$religion] ?? 1; // Default to Islam\n    }\n\n    private function mapJob($job): int\n    {\n        // Map job titles to Neo Feeder job IDs\n        // This would need to be expanded based on actual Neo Feeder job codes\n        return 1; // Default\n    }\n\n    private function mapIncome($income): int\n    {\n        // Map income ranges to Neo Feeder income IDs\n        if ($income <= 1000000) return 11;\n        if ($income <= 2000000) return 12;\n        if ($income <= 3000000) return 13;\n        if ($income <= 5000000) return 14;\n        return 15; // > 5 million\n    }\n\n    private function mapStudentStatus($status): int\n    {\n        $statuses = [\n            'Aktif' => 'A',\n            'Cuti' => 'C',\n            'Tidak Aktif' => 'N',\n            'Lulus' => 'L',\n            'Drop Out' => 'D',\n        ];\n        \n        return $statuses[$status] ?? 'A';\n    }\n\n    private function getNeoFeederPeriodId($takaId): string\n    {\n        $taka = TahunAkademik::find($takaId);\n        return $taka ? $taka->code : date('Y') . '1';\n    }\n\n    private function getTotalBillingSemester($mahasiswa, $semester): int\n    {\n        return $mahasiswa->tagihan()\n                        ->where('semester', $semester)\n                        ->where('status', 'Sukses')\n                        ->sum('amount') ?? 0;\n    }\n}