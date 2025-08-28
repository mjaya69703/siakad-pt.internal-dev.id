<?php

namespace App\Http\Controllers\PMB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

// Models
use App\Models\PMB\PeriodePendaftaran;
use App\Models\PMB\JalurPendaftaran;
use App\Models\PMB\GelombangPendaftaran;
use App\Models\PMB\BiayaPendaftaran;
use App\Models\PMB\SyaratPendaftaran;
use App\Models\PMB\JadwalPMB;
use App\Models\Akademik\JenjangPendidikan;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\Fakultas;
use App\Models\Publikasi\Berita;
use App\Models\Publikasi\Pengumuman;
use App\Models\Pengaturan\WebSetting;
use App\Models\Pendaftaran\Pendaftar;

class PmbController extends Controller
{
    /**
     * PMB Landing Page with slideshow, agenda, and guides
     */
    public function index(Request $request)
    {
        $data = [
            'webs' => WebSetting::first(),
            'currentDate' => Carbon::now(),
        ];

        // Get active registration periods
        $data['activePeriods'] = PeriodePendaftaran::where('status', 'Aktif')
            ->where('tgl_mulai', '<=', now())
            ->where('tgl_selesai', '>=', now())
            ->with(['gelombangs', 'jalurs'])
            ->get();

        // Get slideshow content (using latest news/announcements)
        $data['slideshows'] = Berita::where('status', 'Publish')
            ->where('kategori_id', 1) // PMB category
            ->latest()
            ->take(5)
            ->get();

        // Get PMB agenda/schedule
        $data['agendas'] = JadwalPMB::where('tanggal', '>=', now())
            ->orderBy('tanggal', 'asc')
            ->take(10)
            ->get();

        // Get announcements
        $data['announcements'] = Pengumuman::where('status', 'Publish')
            ->where('kategori_id', 1) // PMB category
            ->latest()
            ->take(5)
            ->get();

        // Get registration statistics
        $data['statistics'] = $this->getRegistrationStatistics();

        // Get faculties and study programs
        $data['faculties'] = Fakultas::with(['programStudis' => function($query) {
            $query->where('status', 'Aktif');
        }])->where('status', 'Aktif')->get();

        // Get registration guides
        $data['guides'] = $this->getRegistrationGuides();

        // Get payment information
        $data['paymentInfo'] = BiayaPendaftaran::with('jalur', 'jenjang')
            ->where('status', 'Aktif')
            ->get()
            ->groupBy('jalur.name');

        return view('pmb.landing-page', $data);
    }

    /**
     * Registration form page
     */
    public function registrationForm(Request $request)
    {
        $data = [
            'webs' => WebSetting::first(),
            'currentDate' => Carbon::now(),
        ];

        // Get available registration options
        $data['jenjangs'] = JenjangPendidikan::all();
        $data['jalurs'] = JalurPendaftaran::where('status', 'Aktif')->get();
        $data['gelombangs'] = GelombangPendaftaran::where('status', 'Aktif')
            ->where('tgl_mulai', '<=', now())
            ->where('tgl_selesai', '>=', now())
            ->get();
        $data['faculties'] = Fakultas::with('programStudis')->where('status', 'Aktif')->get();

        // Get requirements
        $data['requirements'] = SyaratPendaftaran::where('status', 'Aktif')->get();

        // Get payment information
        $data['paymentInfo'] = BiayaPendaftaran::with('jalur', 'jenjang')->get();

        return view('pmb.registration-form', $data);
    }

    /**
     * Get program studi by jenjang (AJAX)
     */
    public function getProgramStudi(Request $request)
    {
        $jenjangId = $request->jenjang_id;
        $fakultasId = $request->fakultas_id;

        $query = ProgramStudi::where('status', 'Aktif');

        if ($jenjangId) {
            $query->where('jenjang_id', $jenjangId);
        }

        if ($fakultasId) {
            $query->where('fakultas_id', $fakultasId);
        }

        $programStudis = $query->get(['id', 'name', 'code', 'fakultas_id', 'jenjang_id']);

        return response()->json([
            'success' => true,
            'data' => $programStudis
        ]);
    }

    /**
     * Get registration fee by criteria (AJAX)
     */
    public function getRegistrationFee(Request $request)
    {
        $jalurId = $request->jalur_id;
        $jenjangId = $request->jenjang_id;
        $gelombangId = $request->gelombang_id;

        $biaya = BiayaPendaftaran::where('jalur_id', $jalurId)
            ->where('jenjang_id', $jenjangId)
            ->where('gelombang_id', $gelombangId)
            ->where('status', 'Aktif')
            ->first();

        if ($biaya) {
            return response()->json([
                'success' => true,
                'data' => [
                    'biaya_pendaftaran' => $biaya->biaya_pendaftaran,
                    'biaya_tes' => $biaya->biaya_tes,
                    'total_biaya' => $biaya->biaya_pendaftaran + $biaya->biaya_tes,
                    'keterangan' => $biaya->keterangan
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Biaya pendaftaran tidak ditemukan'
        ]);
    }

    /**
     * Payment information page
     */
    public function paymentInfo(Request $request)
    {
        $data = [
            'webs' => WebSetting::first(),
        ];

        // Get payment methods and bank information
        $data['paymentMethods'] = [
            'bank_transfer' => [
                'name' => 'Transfer Bank',
                'banks' => [
                    [
                        'name' => 'Bank Mandiri',
                        'account_number' => '1234567890',
                        'account_name' => 'Universitas Ibn Khaldun Bogor'
                    ],
                    [
                        'name' => 'Bank BCA',
                        'account_number' => '0987654321',
                        'account_name' => 'Universitas Ibn Khaldun Bogor'
                    ]
                ]
            ],
            'virtual_account' => [
                'name' => 'Virtual Account',
                'description' => 'Pembayaran otomatis menggunakan virtual account'
            ]
        ];

        // Get payment fees
        $data['paymentFees'] = BiayaPendaftaran::with(['jalur', 'jenjang', 'gelombang'])
            ->where('status', 'Aktif')
            ->get()
            ->groupBy(['jalur.name', 'jenjang.nama']);

        return view('pmb.payment-info', $data);
    }

    /**
     * Selection results page
     */
    public function selectionResults(Request $request)
    {
        $data = [
            'webs' => WebSetting::first(),
        ];

        // Get published results
        $data['results'] = Pendaftar::where('status', 'Lulus')
            ->with(['programStudi1', 'jalur', 'gelombang'])
            ->orderBy('updated_at', 'desc')
            ->paginate(50);

        // Get statistics
        $data['statistics'] = [
            'total_pendaftar' => Pendaftar::where('status', '!=', 'Draft')->count(),
            'lulus_seleksi' => Pendaftar::where('status', 'Lulus')->count(),
            'tidak_lulus' => Pendaftar::where('status', 'Tidak Lulus')->count(),
            'belum_diumumkan' => Pendaftar::where('status', 'Seleksi')->count(),
        ];

        return view('pmb.selection-results', $data);
    }

    /**
     * Check registration status
     */
    public function checkStatus(Request $request)
    {
        $data = [
            'webs' => WebSetting::first(),
        ];

        if ($request->has('registration_number')) {
            $pendaftar = Pendaftar::where('numb_reg', $request->registration_number)
                ->with(['programStudi1', 'jalur', 'gelombang', 'dokumens'])
                ->first();

            if ($pendaftar) {
                $data['pendaftar'] = $pendaftar;
                $data['status_timeline'] = $this->getStatusTimeline($pendaftar);
            } else {
                $data['error'] = 'Nomor registrasi tidak ditemukan';
            }
        }

        return view('pmb.check-status', $data);
    }

    /**
     * Get registration statistics
     */
    protected function getRegistrationStatistics()
    {
        $currentYear = date('Y');
        
        return [
            'total_pendaftar' => Pendaftar::whereYear('created_at', $currentYear)->count(),
            'pendaftar_hari_ini' => Pendaftar::whereDate('created_at', today())->count(),
            'lulus_seleksi' => Pendaftar::where('status', 'Lulus')->whereYear('updated_at', $currentYear)->count(),
            'daftar_ulang' => Pendaftar::where('status', 'Daftar Ulang')->whereYear('updated_at', $currentYear)->count(),
        ];
    }

    /**
     * Get registration guides
     */
    protected function getRegistrationGuides()
    {
        return [
            [
                'title' => 'Panduan Pendaftaran Online',
                'icon' => 'fas fa-user-plus',
                'steps' => [
                    'Akses website PMB',
                    'Isi formulir pendaftaran',
                    'Upload dokumen persyaratan',
                    'Lakukan pembayaran',
                    'Cetak kartu ujian'
                ]
            ],
            [
                'title' => 'Persyaratan Pendaftaran',
                'icon' => 'fas fa-file-alt',
                'steps' => [
                    'Ijazah SMA/SMK/MA',
                    'Transkrip nilai',
                    'Foto 3x4 (3 lembar)',
                    'Fotocopy KTP',
                    'Fotocopy Kartu Keluarga'
                ]
            ],
            [
                'title' => 'Jadwal Seleksi',
                'icon' => 'fas fa-calendar-alt',
                'steps' => [
                    'Pendaftaran: Januari - Mei',
                    'Ujian tulis: Juni',
                    'Pengumuman: Juli',
                    'Daftar ulang: Agustus',
                    'Mulai kuliah: September'
                ]
            ]
        ];
    }

    /**
     * Get status timeline for applicant
     */
    protected function getStatusTimeline($pendaftar)
    {
        $timeline = [
            [
                'title' => 'Pendaftaran',
                'date' => $pendaftar->created_at,
                'status' => 'completed',
                'description' => 'Pendaftaran berhasil disubmit'
            ],
            [
                'title' => 'Verifikasi Berkas',
                'date' => $pendaftar->verified_at ?? null,
                'status' => $pendaftar->document_status === 'Verified' ? 'completed' : 'pending',
                'description' => 'Verifikasi kelengkapan dokumen'
            ],
            [
                'title' => 'Pembayaran',
                'date' => $pendaftar->payment_date ?? null,
                'status' => $pendaftar->payment_status === 'Paid' ? 'completed' : 'pending',
                'description' => 'Pembayaran biaya pendaftaran'
            ],
            [
                'title' => 'Ujian Seleksi',
                'date' => null, // Set based on schedule
                'status' => $pendaftar->test_status === 'Completed' ? 'completed' : 'pending',
                'description' => 'Mengikuti ujian seleksi'
            ],
            [
                'title' => 'Pengumuman',
                'date' => $pendaftar->status === 'Lulus' ? $pendaftar->updated_at : null,
                'status' => in_array($pendaftar->status, ['Lulus', 'Tidak Lulus']) ? 'completed' : 'pending',
                'description' => 'Pengumuman hasil seleksi'
            ]
        ];

        return $timeline;
    }
}