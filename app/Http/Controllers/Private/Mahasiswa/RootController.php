<?php

namespace App\Http\Controllers\Private\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// USE SYSTEM
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
// USE MODELS
use App\Models\Pengaturan\WebSetting;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class RootController extends Controller
{
    public function renderDashboard()
    {
        $user = Auth::guard('mahasiswa')->user();
        $today = Carbon::today();
        
        // Get website settings
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Dashboard";
        $data['pages'] = "Dashboard Mahasiswa";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['user'] = $user;

        // Get academic data
        $this->getAcademicData($data, $user);
        
        // Get today's schedule
        $this->getTodaySchedule($data, $user, $today);
        
        // Get financial data
        $this->getFinancialData($data, $user);
        
        // Get announcements
        $this->getAnnouncements($data);
        
        // Get recent activities
        $this->getRecentActivities($data, $user);

        return view('private.mahasiswa.dashboard', $data);
    }
    
    /**
     * Get academic data for dashboard
     */
    private function getAcademicData(&$data, $user)
    {
        // Get KRS data to calculate IPS and IPK
        $krs = \App\Models\Akademik\KRS::where('mahasiswa_id', $user->id)
            ->with(['details', 'details.mataKuliah', 'details.nilai'])
            ->get();
            
        // Calculate IPS and IPK
        $totalSks = 0;
        $totalNilai = 0;
        $totalSksLulus = 0;
        $totalNilaiLulus = 0;
        $semesterNilai = [];
        
        foreach ($krs as $semester) {
            $semesterSks = 0;
            $semesterNilaiTotal = 0;
            
            foreach ($semester->details as $detail) {
                if ($detail->nilai) {
                    $bobot = $this->convertNilaiToBobot($detail->nilai->nilai_akhir);
                    $totalNilai += $bobot * $detail->mataKuliah->bsks;
                    $totalSks += $detail->mataKuliah->bsks;
                    
                    if ($detail->nilai->nilai_akhir >= 60) {
                        $totalNilaiLulus += $bobot * $detail->mataKuliah->bsks;
                        $totalSksLulus += $detail->mataKuliah->bsks;
                    }
                    
                    $semesterNilaiTotal += $bobot * $detail->mataKuliah->bsks;
                    $semesterSks += $detail->mataKuliah->bsks;
                }
            }
            
            if ($semesterSks > 0) {
                $semesterNilai[$semester->semester] = round($semesterNilaiTotal / $semesterSks, 2);
            }
        }
        
        // Get current IPS (last semester)
        $data['ips'] = end($semesterNilai) ?: 0;
        
        // Calculate IPK
        $data['ipk'] = $totalSks > 0 ? round($totalNilai / $totalSks, 2) : 0;
        
        // Get total SKS needed for graduation
        $data['sks_kebutuhan'] = $user->programStudi ? ($user->programStudi->sks_lulus ?? 144) : 144;
        
        // Get completed SKS
        $data['total_sks_lulus'] = $totalSksLulus;
        
        // Calculate SKS progress
        $data['progress_sks'] = $data['sks_kebutuhan'] > 0 
            ? round(($data['total_sks_lulus'] / $data['sks_kebutuhan']) * 100, 1) 
            : 0;
    }
    
    /**
     * Convert nilai to bobot (A=4, B=3, etc.)
     */
    private function convertNilaiToBobot($nilai)
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
     * Get today's schedule
     */
    private function getTodaySchedule(&$data, $user, $today)
    {
        $dayMap = [
            0 => 'Minggu',
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu'
        ];
        
        $dayName = $dayMap[$today->dayOfWeek];
        
        $data['jadwal_hari_ini'] = \App\Models\Akademik\JadwalKuliah::whereHas('kelas', function($q) use ($user) {
                $q->whereHas('mahasiswas', function($q2) use ($user) {
                    $q2->where('id', $user->id);
                });
            })
            ->where('hari', $dayName)
            ->with(['mataKuliah', 'dosen', 'ruang', 'kelas', 'waktuKuliah'])
            ->leftJoin('waktu_kuliahs', 'jadwal_kuliahs.waktu_kuliah_id', '=', 'waktu_kuliahs.id')
            ->orderBy('waktu_kuliahs.time_start')
            ->select('jadwal_kuliahs.*')
            ->get()
            ->map(function($item) use ($today) {
                $now = now();
                $startTime = $item->waktuKuliah ? \Carbon\Carbon::parse($item->waktuKuliah->time_start) : now();
                $endTime = $item->waktuKuliah ? \Carbon\Carbon::parse($item->waktuKuliah->time_ended) : now();
                
                $status = '';
                if ($now->between($startTime, $endTime)) {
                    $status = 'berlangsung';
                } elseif ($now->lt($startTime)) {
                    $status = 'akan_datang';
                } else {
                    $status = 'selesai';
                }
                
                return [
                    'mata_kuliah' => $item->mataKuliah->nama_mk,
                    'bsks' => $item->mataKuliah->bsks,
                    'dosen' => $item->dosen ? $item->dosen->gelar_depan . ' ' . $item->dosen->nama . ($item->dosen->gelar_belakang ? ', ' . $item->dosen->gelar_belakang : '') : '-',
                    'ruang' => $item->ruang ? $item->ruang->nama_ruang : 'Tidak ada ruang',
                    'time_start' => $startTime->format('H:i'),
                    'time_ended' => $endTime->format('H:i'),
                    'metode' => $item->metode_pembelajaran,
                    'status' => $status
                ];
            })
            ->toArray();
    }
    
    /**
     * Get financial data
     */
    private function getFinancialData(&$data, $user)
    {
        // Get active bills
        $data['tagihan_aktif'] = \App\Models\Keuangan\TagihanKuliah::where('mahasiswa_id', $user->id)
            ->where('status', 'Pending')
            ->with('tahunAkademik')
            ->orderBy('due_date')
            ->get()
            ->map(function($item) {
                return [
                    'desc' => $item->desc ?? 'Tagihan ' . ($item->tahunAkademik ? $item->tahunAkademik->nama_tahun_akademik : ''),
                    'amount' => $item->amount,
                    'due_date' => $item->due_date,
                    'status' => $item->status,
                    'tahun_akademik' => $item->tahunAkademik ? $item->tahunAkademik->nama_tahun_akademik : ''
                ];
            })
            ->toArray();
            
        // Calculate total active bills
        $data['total_tagihan'] = array_sum(array_column($data['tagihan_aktif'], 'amount'));
        
        // Get payment history (last 5)
        $data['riwayat_pembayaran'] = \App\Models\Keuangan\RiwayatPembayaran::where('mahasiswa_id', $user->id)
            ->where('status_pembayaran', 'Sukses')
            ->with('tagihanKuliah.tahunAkademik')
            ->orderBy('tgl_pembayaran', 'desc')
            ->limit(5)
            ->get()
            ->map(function($item) {
                return [
                    'desc' => ($item->tagihanKuliah->desc ?? 'Pembayaran') . ' ' . 
                             ($item->tagihanKuliah->tahunAkademik ? $item->tagihanKuliah->tahunAkademik->nama_tahun_akademik : ''),
                    'amount' => $item->jumlah_bayar ?? 0,
                    'updated_at' => $item->tgl_pembayaran,
                    'status' => $item->status_pembayaran ?? 'Sukses',
                    'tahun_akademik' => $item->tagihanKuliah->tahunAkademik ? $item->tagihanKuliah->tahunAkademik->nama_tahun_akademik : ''
                ];
            })
            ->toArray();
    }
    
    /**
     * Get announcements
     */
    private function getAnnouncements(&$data)
    {
        $data['pengumuman'] = \App\Models\Publikasi\Pengumuman::where('status', 'Publish')
            ->where('created_at', '<=', now())
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get(['name', 'content', 'created_at'])
            ->map(function($item) {
                return [
                    'name' => $item->name,
                    'content' => $item->content,
                    'created_at' => $item->created_at
                ];
            })
            ->toArray();
    }
    
    /**
     * Get quick action links for the dashboard
     */
    private function getQuickActions(&$data)
    {
        $data['quick_actions'] = [
            [
                'title' => 'KRS Online',
                'description' => 'Pengajuan Kartu Rencana Studi',
                'url' => route('mahasiswa.akademik.krs-render'),
                'icon' => 'clipboard-list',
                'color' => 'primary'
            ],
            [
                'title' => 'Jadwal Kuliah',
                'description' => 'Lihat jadwal perkuliahan',
                'url' => route('mahasiswa.akademik.jadwal'),
                'icon' => 'calendar',
                'color' => 'info'
            ],
            [
                'title' => 'Pembayaran',
                'description' => 'Lihat tagihan dan riwayat',
                'url' => route('mahasiswa.keuangan.tagihan'),
                'icon' => 'credit-card',
                'color' => 'success'
            ],
            [
                'title' => 'Transkrip Nilai',
                'description' => 'Download transkrip nilai',
                'url' => route('mahasiswa.layanan.transkrip'),
                'icon' => 'file-text',
                'color' => 'warning'
            ],
            [
                'title' => 'Presensi',
                'description' => 'Lihat kehadiran kuliah',
                'url' => route('mahasiswa.akademik.presensi'),
                'icon' => 'map-pin',
                'color' => 'purple'
            ],
            [
                'title' => 'Layanan Mahasiswa',
                'description' => 'Surat-surat dan legalisir',
                'url' => route('mahasiswa.layanan.surat-keterangan'),
                'icon' => 'file-certificate',
                'color' => 'indigo'
            ]
        ];
    }
    
    /**
     * Get calendar events for the dashboard
     */
    private function getCalendarEvents(&$data)
    {
        $data['calendar_events'] = [
            [
                'title' => 'Batas Akhir KRS',
                'date' => '2024-09-15',
                'type' => 'deadline',
                'description' => 'Batas waktu pengajuan KRS semester genap'
            ],
            [
                'title' => 'UTS Semester Genap',
                'date' => '2024-10-14',
                'type' => 'exam',
                'description' => 'Ujian Tengah Semester dimulai'
            ],
            [
                'title' => 'Pembayaran UKT Gelombang 2',
                'date' => '2024-09-30',
                'type' => 'payment',
                'description' => 'Batas pembayaran UKT gelombang ke-2'
            ]
        ];
        
        // Sort by date
        usort($data['calendar_events'], function($a, $b) {
            return strtotime($a['date']) - strtotime($b['date']);
        });
        
        // Only show upcoming events (next 5)
        $data['calendar_events'] = array_slice(array_filter($data['calendar_events'], function($event) {
            return strtotime($event['date']) >= strtotime('today');
        }), 0, 5);
    }
    
    /**
     * Get important notifications
     */
    private function getImportantNotifications(&$data)
    {
        $data['notifications'] = [
            [
                'type' => 'info',
                'title' => 'Sistem Pembaruan',
                'message' => 'Portal SIAKAD telah diperbarui dengan fitur-fitur baru untuk meningkatkan pengalaman pengguna.',
                'time' => Carbon::now()->subHours(2),
                'read' => false
            ],
            [
                'type' => 'warning',
                'title' => 'Pengingat Pembayaran',
                'message' => 'Anda memiliki tagihan yang akan jatuh tempo dalam 7 hari. Segera lakukan pembayaran.',
                'time' => Carbon::now()->subHours(4),
                'read' => false
            ],
            [
                'type' => 'success',
                'title' => 'KRS Disetujui',
                'message' => 'Kartu Rencana Studi Anda telah disetujui oleh dosen pembimbing akademik.',
                'time' => Carbon::now()->subDay(),
                'read' => true
            ]
        ];
        
        // Count unread notifications
        $data['unread_notifications'] = count(array_filter($data['notifications'], function($notif) {
            return !$notif['read'];
        }));
    }

    /**
     * Get recent activities
     */
    private function getRecentActivities(&$data, $user)
    {
        $data['aktivitas_terbaru'] = [];
        
        // Get KRS submission
        $krs = \App\Models\Akademik\KRS::where('mahasiswa_id', $user->id)
            ->with('tahunAkademik')
            ->orderBy('created_at', 'desc')
            ->first();
            
        if ($krs) {
            $data['aktivitas_terbaru'][] = [
                'title' => 'Pengajuan KRS',
                'description' => 'Anda telah mengajukan KRS untuk ' . ($krs->tahunAkademik ? $krs->tahunAkademik->nama_tahun_akademik : ''),
                'time' => $krs->created_at,
                'badge' => 'KRS',
                'badge_color' => 'primary'
            ];
        }
        
        // Get latest payment
        $pembayaran = \App\Models\Keuangan\RiwayatPembayaran::where('mahasiswa_id', $user->id)
            ->where('status_pembayaran', 'Sukses')
            ->orderBy('tgl_pembayaran', 'desc')
            ->first();
            
        if ($pembayaran) {
            $data['aktivitas_terbaru'][] = [
                'title' => 'Pembayaran Berhasil',
                'description' => 'Pembayaran sebesar Rp ' . number_format($pembayaran->jumlah_bayar, 0, ',', '.') . ' telah berhasil',
                'time' => $pembayaran->tgl_pembayaran,
                'badge' => 'Pembayaran',
                'badge_color' => 'success'
            ];
        }
        
        // Get latest grade
        $nilai = \App\Models\Akademik\Nilai::whereHas('krsDetail.krs', function($q) use ($user) {
                $q->where('mahasiswa_id', $user->id);
            })
            ->with(['krsDetail.mataKuliah', 'krsDetail.krs.tahunAkademik'])
            ->orderBy('updated_at', 'desc')
            ->first();
            
        if ($nilai) {
            $data['aktivitas_terbaru'][] = [
                'title' => 'Nilai Baru',
                'description' => 'Nilai untuk mata kuliah ' . ($nilai->krsDetail->mataKuliah->nama_mk ?? '') . ' telah diupdate',
                'time' => $nilai->updated_at,
                'badge' => 'Nilai',
                'badge_color' => 'info'
            ];
        }
        
        // Sort activities by time
        usort($data['aktivitas_terbaru'], function($a, $b) {
            return strtotime($b['time']) - strtotime($a['time']);
        });
        
        // Limit to 5 activities and add sample data if empty
        $data['aktivitas_terbaru'] = array_slice($data['aktivitas_terbaru'], 0, 5);

        // Sample attendance data (can be replaced with real data later)
        $data['kehadiran_bulan_ini'] = 92;
        $data['total_pertemuan'] = 25;
        $data['hadir'] = 23;
        
        // Add sample activities if no real activities found
        if (empty($data['aktivitas_terbaru'])) {
            $data['aktivitas_terbaru'] = [
                [
                    'type' => 'nilai',
                    'title' => 'Tidak ada aktivitas terbaru',
                    'description' => 'Tidak ada aktivitas yang tercatat saat ini',
                    'time' => Carbon::now(),
                    'badge' => 'Info',
                    'badge_color' => 'secondary'
                ]
            ];
        }

        // Get quick action links
        $this->getQuickActions($data);
        
        // Get calendar events
        $this->getCalendarEvents($data);
        
        // Get important notifications
        $this->getImportantNotifications($data);
    }

    public function renderProfile()
    {
        $user = Auth::guard('mahasiswa')->user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Detail";
        $data['pages'] = "Profile Mahasiswa";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        
        return view('central.backpage.profile-mahasiswa', $data, compact('user'));
    }

    public function handleProfile(Request $request)
    {
        try {
            // Validate the request
            $validator = Validator::make($request->all(), [
                // Personal Information
                'name' => 'required|string|max:255',
                'title_front' => 'nullable|string|max:50',
                'title_behind' => 'nullable|string|max:50',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'bio_placebirth' => 'nullable|string|max:100',
                'bio_datebirth' => 'nullable|date',
                'bio_gender' => 'nullable|in:Laki-laki,Perempuan',
                'bio_religion' => 'nullable|string|max:50',
                'bio_blood' => 'nullable|string|max:5',
                'bio_height' => 'nullable|numeric',
                'bio_weight' => 'nullable|numeric',

                // Contact Information
                'email' => 'required|email|unique:mahasiswas,email,' . Auth::guard('mahasiswa')->user()->id,
                'phone' => 'required|string|unique:mahasiswas,phone,' . Auth::guard('mahasiswa')->user()->id,
                'link_ig' => 'nullable|url',
                'link_fb' => 'nullable|url',
                'link_in' => 'nullable|url',

                // Address Information
                'ktp_addres' => 'nullable|string',
                'ktp_rt' => 'nullable|string|max:10',
                'ktp_rw' => 'nullable|string|max:10',
                'ktp_village' => 'nullable|string|max:100',
                'ktp_subdistrict' => 'nullable|string|max:100',
                'ktp_city' => 'nullable|string|max:100',
                'ktp_province' => 'nullable|string|max:100',
                'ktp_poscode' => 'nullable|string|max:10',
                'domicile_same' => 'required|in:Yes,No',
                'domicile_addres' => 'nullable|required_if:domicile_same,No|string',
                'domicile_rt' => 'nullable|required_if:domicile_same,No|string|max:10',
                'domicile_rw' => 'nullable|required_if:domicile_same,No|string|max:10',
                'domicile_village' => 'nullable|required_if:domicile_same,No|string|max:100',
                'domicile_subdistrict' => 'nullable|required_if:domicile_same,No|string|max:100',
                'domicile_city' => 'nullable|required_if:domicile_same,No|string|max:100',
                'domicile_province' => 'nullable|required_if:domicile_same,No|string|max:100',
                'domicile_poscode' => 'nullable|required_if:domicile_same,No|string|max:10',

                // Education Information
                'edu1_type' => 'required|in:SMA/SMK,Diploma,Sarjana,Magister,Doktor',
                'edu1_place' => 'required|string|max:255',
                'edu1_major' => 'required|string|max:255',
                'edu1_average_score' => 'required|string|max:10',
                'edu1_graduate_year' => 'required|string|max:4',
                'edu2_type' => 'nullable|in:SMA/SMK,Diploma,Sarjana,Magister,Doktor',
                'edu2_place' => 'nullable|string|max:255',
                'edu2_major' => 'nullable|string|max:255',
                'edu2_average_score' => 'nullable|string|max:10',
                'edu2_graduate_year' => 'nullable|string|max:4',
                'edu3_type' => 'nullable|in:SMA/SMK,Diploma,Sarjana,Magister,Doktor',
                'edu3_place' => 'nullable|string|max:255',
                'edu3_major' => 'nullable|string|max:255',
                'edu3_average_score' => 'nullable|string|max:10',
                'edu3_graduate_year' => 'nullable|string|max:4',

                // Family Information
                'father_name' => 'nullable|string|max:255',
                'father_datebirth' => 'nullable|date',
                'father_lifestat' => 'nullable|in:Hidup,Meninggal',
                'father_education' => 'nullable|string|max:100',
                'father_occupation' => 'nullable|string|max:100',
                'father_income' => 'nullable|string|max:50',
                'father_phone' => 'nullable|string|max:20',
                'father_address' => 'nullable|string',

                'mother_name' => 'nullable|string|max:255',
                'mother_datebirth' => 'nullable|date',
                'mother_lifestat' => 'nullable|in:Hidup,Meninggal',
                'mother_education' => 'nullable|string|max:100',
                'mother_occupation' => 'nullable|string|max:100',
                'mother_income' => 'nullable|string|max:50',
                'mother_phone' => 'nullable|string|max:20',
                'mother_address' => 'nullable|string',

                'guard_name' => 'nullable|string|max:255',
                'guard_nik' => 'nullable|string|max:20',
                'guard_datebirth' => 'nullable|date',
                'guard_relation' => 'nullable|string|max:50',
                'guard_phone' => 'nullable|string|max:20',
                'guard_address' => 'nullable|string',

                // Identity Information
                'numb_kk' => 'nullable|string|max:20',
                'numb_ktp' => 'nullable|string|max:20',
                'numb_nim' => 'nullable|string|max:20',
                'numb_reg' => 'nullable|string|max:20',
                'numb_nisn' => 'nullable|string|max:20',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $user = Auth::guard('mahasiswa')->user();
            $data = $validator->validated();

            // Handle photo upload
            if ($request->hasFile('photo')) {
                // Delete old photo if exists
                if ($user->photo && $user->photo !== 'default.jpg') {
                    Storage::disk('public')->delete('images/profile/' . $user->photo);
                }

                // Kompres dan simpan foto profil
                $photoName = time() . '-' . $user->code . '-' . uniqid() . '-' . uniqid() . '.jpg';
                
                // Buat instance ImageManager dengan driver GD
                $manager = new ImageManager(new Driver());
                
                // Baca dan kompres gambar
                $image = $manager->read($request->photo->getRealPath());
                
                // Resize dengan ukuran yang lebih besar untuk foto profil
                if ($image->height() > 1200) {
                    $image->scaleDown(height: 1200); 
                }
                
                // Simpan dengan kualitas tinggi (90%)
                Storage::disk('public')->put('images/profile/' . $photoName, $image->toJpeg(90));
                
                $data['photo'] = $photoName;
            }

            // Update mahasiswa information
            $user->update($data);

            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update profile: ' . $e->getMessage())
                ->withInput();
        }
    }
}
