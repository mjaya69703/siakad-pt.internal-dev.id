<?php

namespace App\Http\Controllers\Integration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
// USE MODELS
use App\Models\Pengaturan\WebSetting;
use App\Models\Integration\NeoFeederSetting;
use App\Models\Integration\NeoFeederLog;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\MataKuliah;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\KRS;
use App\Models\Akademik\Nilai;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Traits\HasLogAktivitas;

class NeoFeederController extends Controller
{
    use HasLogAktivitas;

    private $baseUrl;
    private $username;
    private $password;
    private $token;

    public function __construct()
    {
        $this->loadNeoFeederConfig();
    }

    /**
     * Load NeoFeeder configuration
     */
    private function loadNeoFeederConfig()
    {
        try {
            $setting = NeoFeederSetting::first();
            
            if ($setting) {
                $this->baseUrl = $setting->base_url;
                $this->username = $setting->username;
                $this->password = decrypt($setting->password);
            }
        } catch (\Exception $e) {
            // Handle case where table doesn't exist yet
            Log::info('NeoFeeder settings table not found, using defaults');
        }
    }

    /**
     * NeoFeeder Dashboard
     */
    public function dashboard()
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "NeoFeeder Integration";
        $data['pages'] = "Dashboard NeoFeeder";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Get integration statistics
        $this->getNeoFeederStats($data);
        
        // Get recent sync logs
        $this->getRecentSyncLogs($data);
        
        // Get sync status
        $this->getSyncStatus($data);

        return view('integration.neofeeder.dashboard', $data);
    }

    /**
     * Get NeoFeeder statistics
     */
    private function getNeoFeederStats(&$data)
    {
        $data['stats'] = [
            'total_mahasiswa' => Mahasiswa::count(),
            'synced_mahasiswa' => Mahasiswa::whereNotNull('neofeeder_id')->count(),
            'total_dosen' => Dosen::count(),
            'synced_dosen' => Dosen::whereNotNull('neofeeder_id')->count(),
            'total_prodi' => ProgramStudi::count(),
            'synced_prodi' => ProgramStudi::whereNotNull('neofeeder_id')->count(),
            'total_matakuliah' => MataKuliah::count(),
            'synced_matakuliah' => MataKuliah::whereNotNull('neofeeder_id')->count(),
            'last_sync' => NeoFeederLog::orderBy('created_at', 'desc')->first()?->created_at,
            'sync_errors' => NeoFeederLog::where('status', 'error')->whereDate('created_at', today())->count()
        ];

        // Calculate sync percentages
        $data['sync_percentages'] = [
            'mahasiswa' => $data['stats']['total_mahasiswa'] > 0 
                ? round(($data['stats']['synced_mahasiswa'] / $data['stats']['total_mahasiswa']) * 100, 1) 
                : 0,
            'dosen' => $data['stats']['total_dosen'] > 0 
                ? round(($data['stats']['synced_dosen'] / $data['stats']['total_dosen']) * 100, 1) 
                : 0,
            'prodi' => $data['stats']['total_prodi'] > 0 
                ? round(($data['stats']['synced_prodi'] / $data['stats']['total_prodi']) * 100, 1) 
                : 0,
            'matakuliah' => $data['stats']['total_matakuliah'] > 0 
                ? round(($data['stats']['synced_matakuliah'] / $data['stats']['total_matakuliah']) * 100, 1) 
                : 0
        ];
    }

    /**
     * Get recent sync logs
     */
    private function getRecentSyncLogs(&$data)
    {
        $data['recent_logs'] = NeoFeederLog::orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->map(function($log) {
                return [
                    'operation' => $log->operation,
                    'data_type' => $log->data_type,
                    'status' => $log->status,
                    'message' => $log->message,
                    'records_processed' => $log->records_processed,
                    'created_at' => $log->created_at
                ];
            });
    }

    /**
     * Get sync status
     */
    private function getSyncStatus(&$data)
    {
        $lastSync = NeoFeederLog::orderBy('created_at', 'desc')->first();
        
        $data['sync_status'] = [
            'last_sync_time' => $lastSync ? $lastSync->created_at : null,
            'is_syncing' => Cache::has('neofeeder_syncing'),
            'connection_status' => $this->checkConnection(),
            'next_scheduled_sync' => $this->getNextScheduledSync()
        ];
    }

    /**
     * Check NeoFeeder connection
     */
    public function checkConnection()
    {
        try {
            if (!$this->baseUrl || !$this->username || !$this->password) {
                return 'not_configured';
            }

            $token = $this->getToken();
            if (!$token) {
                return 'auth_failed';
            }

            return 'connected';
        } catch (\Exception $e) {
            Log::error('NeoFeeder connection check failed: ' . $e->getMessage());
            return 'error';
        }
    }

    /**
     * Get authentication token
     */
    private function getToken()
    {
        if ($this->token && Cache::has('neofeeder_token')) {
            return Cache::get('neofeeder_token');
        }

        try {
            $response = Http::timeout(30)->post($this->baseUrl . '/ws/live2.php', [
                'act' => 'GetToken',
                'username' => $this->username,
                'password' => $this->password
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['data']['token'])) {
                    $this->token = $data['data']['token'];
                    Cache::put('neofeeder_token', $this->token, 3600); // Cache for 1 hour
                    return $this->token;
                }
            }

            return null;
        } catch (\Exception $e) {
            Log::error('Failed to get NeoFeeder token: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Sync mahasiswa data to NeoFeeder
     */
    public function syncMahasiswa(Request $request)
    {
        try {
            Cache::put('neofeeder_syncing', true, 3600);
            
            $token = $this->getToken();
            if (!$token) {
                throw new \Exception('Gagal mendapatkan token autentikasi');
            }

            $mahasiswas = Mahasiswa::where('type', 'Aktif');
            
            if ($request->has('unsync_only') && $request->unsync_only) {
                $mahasiswas = $mahasiswas->whereNull('neofeeder_id');
            }
            
            $mahasiswas = $mahasiswas->with(['programStudi'])->get();
            
            $successCount = 0;
            $errorCount = 0;
            $errors = [];

            foreach ($mahasiswas as $mahasiswa) {
                try {
                    $result = $this->syncSingleMahasiswa($mahasiswa, $token);
                    
                    if ($result['success']) {
                        $successCount++;
                        $mahasiswa->update(['neofeeder_id' => $result['neofeeder_id']]);
                    } else {
                        $errorCount++;
                        $errors[] = "Mahasiswa {$mahasiswa->name}: {$result['message']}";
                    }
                } catch (\Exception $e) {
                    $errorCount++;
                    $errors[] = "Mahasiswa {$mahasiswa->name}: {$e->getMessage()}";
                }
            }

            // Log the sync operation
            NeoFeederLog::create([
                'operation' => 'sync',
                'data_type' => 'mahasiswa',
                'status' => $errorCount == 0 ? 'success' : ($successCount > 0 ? 'partial' : 'error'),
                'message' => "Berhasil: {$successCount}, Gagal: {$errorCount}",
                'records_processed' => $successCount + $errorCount,
                'details' => json_encode(['errors' => $errors])
            ]);

            Cache::forget('neofeeder_syncing');

            return response()->json([
                'success' => true,
                'message' => "Sinkronisasi selesai. Berhasil: {$successCount}, Gagal: {$errorCount}",
                'data' => [
                    'success_count' => $successCount,
                    'error_count' => $errorCount,
                    'errors' => $errors
                ]
            ]);

        } catch (\Exception $e) {
            Cache::forget('neofeeder_syncing');
            
            NeoFeederLog::create([
                'operation' => 'sync',
                'data_type' => 'mahasiswa',
                'status' => 'error',
                'message' => $e->getMessage(),
                'records_processed' => 0
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Gagal melakukan sinkronisasi: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Sync single mahasiswa
     */
    private function syncSingleMahasiswa($mahasiswa, $token)
    {
        try {
            $data = [
                'act' => 'InsertBiodataMahasiswa',
                'token' => $token,
                'record' => [
                    'nama_mahasiswa' => $mahasiswa->name,
                    'jenis_kelamin' => $mahasiswa->bio_gender === 'Laki-laki' ? 'L' : 'P',
                    'jalur_masuk' => '1', // Regular
                    'jenis_pendaftaran' => '1', // Baru
                    'tanggal_lahir' => $mahasiswa->bio_datebirth ? Carbon::parse($mahasiswa->bio_datebirth)->format('Y-m-d') : null,
                    'tempat_lahir' => $mahasiswa->bio_placebirth,
                    'nim' => $mahasiswa->numb_nim,
                    'id_prodi' => $mahasiswa->programStudi ? $mahasiswa->programStudi->neofeeder_id : null,
                    'angkatan' => $mahasiswa->year_generation,
                    'id_periode_masuk' => $this->getCurrentPeriodeId(),
                    'email' => $mahasiswa->email,
                    'handphone' => $mahasiswa->phone
                ]
            ];

            $response = Http::timeout(30)->post($this->baseUrl . '/ws/live2.php', $data);

            if ($response->successful()) {
                $result = $response->json();
                
                if (isset($result['error_code']) && $result['error_code'] == '0') {
                    return [
                        'success' => true,
                        'neofeeder_id' => $result['data']['id_mahasiswa'] ?? null,
                        'message' => 'Berhasil disinkronkan'
                    ];
                } else {
                    return [
                        'success' => false,
                        'message' => $result['error_desc'] ?? 'Error tidak diketahui'
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'HTTP Error: ' . $response->status()
                ];
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Sync KRS data to NeoFeeder
     */
    public function syncKRS(Request $request)
    {
        try {
            Cache::put('neofeeder_syncing', true, 3600);
            
            $token = $this->getToken();
            if (!$token) {
                throw new \Exception('Gagal mendapatkan token autentikasi');
            }

            $currentYear = TahunAkademik::where('is_active', true)->first();
            if (!$currentYear) {
                throw new \Exception('Tidak ada tahun akademik aktif');
            }

            $krsList = KRS::where('tahun_akademik_id', $currentYear->id)
                ->where('status', 'Approved')
                ->with(['mahasiswa', 'details.mataKuliah'])
                ->get();

            $successCount = 0;
            $errorCount = 0;
            $errors = [];

            foreach ($krsList as $krs) {
                foreach ($krs->details as $detail) {
                    try {
                        $result = $this->syncSingleKRSDetail($detail, $token, $currentYear);
                        
                        if ($result['success']) {
                            $successCount++;
                            $detail->update(['neofeeder_id' => $result['neofeeder_id']]);
                        } else {
                            $errorCount++;
                            $errors[] = "KRS {$krs->mahasiswa->name} - {$detail->mataKuliah->nama_mk}: {$result['message']}";
                        }
                    } catch (\Exception $e) {
                        $errorCount++;
                        $errors[] = "KRS {$krs->mahasiswa->name} - {$detail->mataKuliah->nama_mk}: {$e->getMessage()}";
                    }
                }
            }

            // Log the sync operation
            NeoFeederLog::create([
                'operation' => 'sync',
                'data_type' => 'krs',
                'status' => $errorCount == 0 ? 'success' : ($successCount > 0 ? 'partial' : 'error'),
                'message' => "Berhasil: {$successCount}, Gagal: {$errorCount}",
                'records_processed' => $successCount + $errorCount,
                'details' => json_encode(['errors' => $errors])
            ]);

            Cache::forget('neofeeder_syncing');

            return response()->json([
                'success' => true,
                'message' => "Sinkronisasi KRS selesai. Berhasil: {$successCount}, Gagal: {$errorCount}",
                'data' => [
                    'success_count' => $successCount,
                    'error_count' => $errorCount,
                    'errors' => $errors
                ]
            ]);

        } catch (\Exception $e) {
            Cache::forget('neofeeder_syncing');
            
            NeoFeederLog::create([
                'operation' => 'sync',
                'data_type' => 'krs',
                'status' => 'error',
                'message' => $e->getMessage(),
                'records_processed' => 0
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Gagal melakukan sinkronisasi KRS: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Sync single KRS detail
     */
    private function syncSingleKRSDetail($detail, $token, $tahunAkademik)
    {
        try {
            $data = [
                'act' => 'InsertKelasKuliah',
                'token' => $token,
                'record' => [
                    'id_mahasiswa' => $detail->krs->mahasiswa->neofeeder_id,
                    'id_matkul' => $detail->mataKuliah->neofeeder_id,
                    'id_semester' => $tahunAkademik->neofeeder_id,
                    'sks_mata_kuliah' => $detail->mataKuliah->bsks,
                    'angka_kredit' => $detail->mataKuliah->bsks
                ]
            ];

            $response = Http::timeout(30)->post($this->baseUrl . '/ws/live2.php', $data);

            if ($response->successful()) {
                $result = $response->json();
                
                if (isset($result['error_code']) && $result['error_code'] == '0') {
                    return [
                        'success' => true,
                        'neofeeder_id' => $result['data']['id_kelas_kuliah'] ?? null,
                        'message' => 'Berhasil disinkronkan'
                    ];
                } else {
                    return [
                        'success' => false,
                        'message' => $result['error_desc'] ?? 'Error tidak diketahui'
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'HTTP Error: ' . $response->status()
                ];
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Sync nilai data to NeoFeeder
     */
    public function syncNilai(Request $request)
    {
        try {
            Cache::put('neofeeder_syncing', true, 3600);
            
            $token = $this->getToken();
            if (!$token) {
                throw new \Exception('Gagal mendapatkan token autentikasi');
            }

            $currentYear = TahunAkademik::where('is_active', true)->first();
            if (!$currentYear) {
                throw new \Exception('Tidak ada tahun akademik aktif');
            }

            $nilaiList = Nilai::whereHas('krsDetail.krs', function($q) use ($currentYear) {
                    $q->where('tahun_akademik_id', $currentYear->id);
                })
                ->with(['krsDetail.krs.mahasiswa', 'krsDetail.mataKuliah'])
                ->whereNotNull('nilai_akhir')
                ->get();

            $successCount = 0;
            $errorCount = 0;
            $errors = [];

            foreach ($nilaiList as $nilai) {
                try {
                    $result = $this->syncSingleNilai($nilai, $token);
                    
                    if ($result['success']) {
                        $successCount++;
                        $nilai->update(['neofeeder_id' => $result['neofeeder_id']]);
                    } else {
                        $errorCount++;
                        $mahasiswa = $nilai->krsDetail->krs->mahasiswa;
                        $matkul = $nilai->krsDetail->mataKuliah;
                        $errors[] = "Nilai {$mahasiswa->name} - {$matkul->nama_mk}: {$result['message']}";
                    }
                } catch (\Exception $e) {
                    $errorCount++;
                    $mahasiswa = $nilai->krsDetail->krs->mahasiswa;
                    $matkul = $nilai->krsDetail->mataKuliah;
                    $errors[] = "Nilai {$mahasiswa->name} - {$matkul->nama_mk}: {$e->getMessage()}";
                }
            }

            // Log the sync operation
            NeoFeederLog::create([
                'operation' => 'sync',
                'data_type' => 'nilai',
                'status' => $errorCount == 0 ? 'success' : ($successCount > 0 ? 'partial' : 'error'),
                'message' => "Berhasil: {$successCount}, Gagal: {$errorCount}",
                'records_processed' => $successCount + $errorCount,
                'details' => json_encode(['errors' => $errors])
            ]);

            Cache::forget('neofeeder_syncing');

            return response()->json([
                'success' => true,
                'message' => "Sinkronisasi nilai selesai. Berhasil: {$successCount}, Gagal: {$errorCount}",
                'data' => [
                    'success_count' => $successCount,
                    'error_count' => $errorCount,
                    'errors' => $errors
                ]
            ]);

        } catch (\Exception $e) {
            Cache::forget('neofeeder_syncing');
            
            NeoFeederLog::create([
                'operation' => 'sync',
                'data_type' => 'nilai',
                'status' => 'error',
                'message' => $e->getMessage(),
                'records_processed' => 0
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Gagal melakukan sinkronisasi nilai: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Sync single nilai
     */
    private function syncSingleNilai($nilai, $token)
    {
        try {
            $data = [
                'act' => 'InsertNilaiPerkuliahanKelas',
                'token' => $token,
                'record' => [
                    'id_registrasi_mahasiswa' => $nilai->krsDetail->neofeeder_id,
                    'nilai_angka' => $nilai->nilai_akhir,
                    'nilai_huruf' => $this->convertNilaiToHuruf($nilai->nilai_akhir),
                    'nilai_indeks' => $this->convertNilaiToIndeks($nilai->nilai_akhir),
                    'nilai_angka_mid' => $nilai->nilai_uts ?? 0,
                    'nilai_angka_final' => $nilai->nilai_uas ?? 0
                ]
            ];

            $response = Http::timeout(30)->post($this->baseUrl . '/ws/live2.php', $data);

            if ($response->successful()) {
                $result = $response->json();
                
                if (isset($result['error_code']) && $result['error_code'] == '0') {
                    return [
                        'success' => true,
                        'neofeeder_id' => $result['data']['id_nilai'] ?? null,
                        'message' => 'Berhasil disinkronkan'
                    ];
                } else {
                    return [
                        'success' => false,
                        'message' => $result['error_desc'] ?? 'Error tidak diketahui'
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'HTTP Error: ' . $response->status()
                ];
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Convert nilai angka to huruf
     */
    private function convertNilaiToHuruf($nilai)
    {
        if ($nilai >= 85) return 'A';
        if ($nilai >= 80) return 'A-';
        if ($nilai >= 75) return 'B+';
        if ($nilai >= 70) return 'B';
        if ($nilai >= 65) return 'B-';
        if ($nilai >= 60) return 'C';
        if ($nilai >= 55) return 'D';
        return 'E';
    }

    /**
     * Convert nilai angka to indeks
     */
    private function convertNilaiToIndeks($nilai)
    {
        if ($nilai >= 85) return 4.0;
        if ($nilai >= 80) return 3.7;
        if ($nilai >= 75) return 3.3;
        if ($nilai >= 70) return 3.0;
        if ($nilai >= 65) return 2.7;
        if ($nilai >= 60) return 2.0;
        if ($nilai >= 55) return 1.0;
        return 0.0;
    }

    /**
     * Get current periode ID for NeoFeeder
     */
    private function getCurrentPeriodeId()
    {
        $currentYear = TahunAkademik::where('is_active', true)->first();
        return $currentYear ? $currentYear->neofeeder_periode_id : null;
    }

    /**
     * Get next scheduled sync time
     */
    private function getNextScheduledSync()
    {
        // This would be based on your sync schedule configuration
        return Carbon::now()->addDay()->setTime(2, 0); // Daily at 2 AM
    }

    /**
     * Settings page
     */
    public function settings()
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "NeoFeeder Integration";
        $data['pages'] = "Pengaturan NeoFeeder";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        
        $data['setting'] = NeoFeederSetting::first();

        return view('integration.neofeeder.settings', $data);
    }

    /**
     * Update settings
     */
    public function updateSettings(Request $request)
    {
        $request->validate([
            'base_url' => 'required|url',
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255'
        ]);

        try {
            $setting = NeoFeederSetting::first();
            
            if ($setting) {
                $setting->update([
                    'base_url' => $request->base_url,
                    'username' => $request->username,
                    'password' => encrypt($request->password),
                    'is_active' => $request->has('is_active')
                ]);
            } else {
                NeoFeederSetting::create([
                    'base_url' => $request->base_url,
                    'username' => $request->username,
                    'password' => encrypt($request->password),
                    'is_active' => $request->has('is_active')
                ]);
            }

            // Clear token cache
            Cache::forget('neofeeder_token');
            
            // Update configuration
            $this->loadNeoFeederConfig();

            return redirect()->back()
                ->with('success', 'Pengaturan NeoFeeder berhasil diperbarui');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui pengaturan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Sync logs page
     */
    public function logs(Request $request)
    {
        $data['webs'] = WebSetting::first();
        $data['menus'] = "NeoFeeder Integration";
        $data['pages'] = "Log Sinkronisasi";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        $query = NeoFeederLog::query();

        // Filter by data type
        if ($request->has('data_type') && $request->data_type) {
            $query->where('data_type', $request->data_type);
        }

        // Filter by status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->has('date_from') && $request->date_from) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->has('date_to') && $request->date_to) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $data['logs'] = $query->orderBy('created_at', 'desc')->paginate(20);
        $data['filters'] = $request->only(['data_type', 'status', 'date_from', 'date_to']);

        return view('integration.neofeeder.logs', $data);
    }
}