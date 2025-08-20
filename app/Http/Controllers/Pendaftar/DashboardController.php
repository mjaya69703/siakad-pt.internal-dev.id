<?php

namespace App\Http\Controllers\Pendaftar;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran\Pendaftar;
use App\Models\Pendaftaran\DokumenPMB;
use App\Models\PMB\SyaratPendaftaran;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\JenjangPendidikan;
use App\Models\Akademik\TahunAkademik;
use App\Models\PMB\JalurPendaftaran;
use App\Models\PMB\GelombangPendaftaran;
use App\Models\Akademik\JenisKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pendaftar');
    }

    public function index()
    {
        $user = Auth::guard('pendaftar')->user();
        $pendaftaran = $user->pendaftaran()->with(['prodi1.jenjang', 'gelombang', 'jalur'])->first();
        $dokumentCount = 0;
        
        // Count documents through pendaftaran relationship
        if ($pendaftaran && $pendaftaran->exists) {
            $dokumentCount = $pendaftaran->dokumen()->count();
        }
        
        $data = [
            'user' => $user,
            'pendaftaran' => $pendaftaran,
            'dokumentCount' => $dokumentCount,
        ];

        return view('pendaftar.dashboard.index', $data);
    }

    public function pendaftaran()
    {
        // Check if user is authenticated
        $user = Auth::guard('pendaftar')->user();
        $pendaftaran = $user ? $user->pendaftaran()->with(['prodi1.jenjang', 'gelombang', 'jalur'])->first() : null;
        $activeTaka = TahunAkademik::where('is_active', true)->first();
        
        $data = [
            'user' => $user,
            'pendaftaran' => $pendaftaran,
            'activeTaka' => $activeTaka,
            'jenjangs' => JenjangPendidikan::all(),
            'prodis' => ProgramStudi::with('jenjang')->where('status', 'Aktif')->get(),
            'jalurs' => collect([(object)['id' => 1, 'name' => 'Reguler', 'code' => 'REG']]),
            'gelombangs' => collect([(object)['id' => 1, 'name' => 'Gelombang 1', 'code' => 'G1']]),
            'jenisKelas' => collect([(object)['id' => 1, 'name' => 'Reguler', 'code' => 'REG']]),
        ];

        return view('pendaftar.dashboard.pendaftaran', $data);
    }

    public function storePendaftaran(Request $request)
    {
        $user = Auth::guard('pendaftar')->user();
        
        // Check if already registered
        $existingRegistration = $user->pendaftaran;
        if ($existingRegistration) {
            return redirect()->route('pendaftar.dashboard')->with('error', 'Anda sudah terdaftar.');
        }

        $request->validate([
            'jenjang_id' => 'required|exists:jenjang_pendidikans,id',
            'program_studi_id' => 'required|exists:program_studis,id',
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:pendaftars,nik',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:50',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before:today',
            'alamat_lengkap' => 'required|string',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
            'desa_kelurahan' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kota_kabupaten' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'kode_pos' => 'required|string|size:5',
            'jalur_id' => 'required|integer',
            'gelombang_id' => 'required|integer',
            'jenis_id' => 'required|integer',
            'no_hp' => 'required|string|max:20|unique:pendaftars,phone',
        ]);

        try {
            // Get active tahun akademik
            $activeTaka = TahunAkademik::where('is_active', true)->first();
            
            if (!$activeTaka) {
                return back()->with('error', 'Tidak ada tahun akademik yang aktif. Hubungi administrator.')->withInput();
            }

            // Create pendaftar record using existing table structure
            $pendaftaran = \App\Models\Pendaftaran\Pendaftar::create([
                'mahasiswa_id' => 0, // Temporary, will be updated after mahasiswa creation
                'jalur_id' => $request->jalur_id,
                'jenis_id' => $request->jenis_id,
                'gelombang_id' => $request->gelombang_id,
                'prodi_1' => $request->program_studi_id, // Primary choice
                'prodi_2' => $request->program_studi_id, // Same as primary for now (database constraint)
                'prodi_3' => null, // No third choice
                'phone' => $request->no_hp,
                'email' => $user->email,
                'name' => $request->nama_lengkap,
                'code' => 'PMB-' . date('Y') . '-' . str_pad($user->id, 6, '0', STR_PAD_LEFT),
                'numb_reg' => 'PMB-' . date('Y') . '-' . str_pad($user->id, 6, '0', STR_PAD_LEFT),
                'register_date' => now(),
                'status' => 'Pending',
                'pendaftar_user_id' => $user->id,
                'tahun_akademik_id' => $activeTaka->id, // Set to active tahun akademik
                // Personal Data
                'nik' => $request->nik,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                // Address Data
                'alamat_lengkap' => $request->alamat_lengkap,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'desa_kelurahan' => $request->desa_kelurahan,
                'kecamatan' => $request->kecamatan,
                'kota_kabupaten' => $request->kota_kabupaten,
                'provinsi' => $request->provinsi,
                'kode_pos' => $request->kode_pos,
            ]);

            return redirect()->route('pendaftar.dashboard')->with('success', 'Pendaftaran berhasil disimpan untuk tahun akademik ' . $activeTaka->name . '!');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyimpan pendaftaran: ' . $e->getMessage())->withInput();
        }
    }

    public function updatePendaftaran(Request $request, $id)
    {
        $user = Auth::guard('pendaftar')->user();
        $pendaftaran = $user->pendaftaran;
        
        if (!$pendaftaran || $pendaftaran->id != $id) {
            return redirect()->route('pendaftar.dashboard')->with('error', 'Data tidak ditemukan.');
        }

        $request->validate([
            'jenjang_id' => 'required|exists:jenjang_pendidikans,id',
            'prodi_id' => 'required|exists:program_studis,id',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
        ]);

        try {
            $pendaftaran->update($request->all());
            return redirect()->route('pendaftar.dashboard')->with('success', 'Data pendaftaran berhasil diperbarui!');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage())->withInput();
        }
    }

    public function dokumen()
    {
        $user = Auth::guard('pendaftar')->user();
        $pendaftaran = $user->pendaftaran;
        
        if (!$pendaftaran) {
            return redirect()->route('pendaftar.pendaftaran')->with('error', 'Silakan lengkapi data pendaftaran terlebih dahulu.');
        }
        
        // Get documents through pendaftaran relationship
        $dokumen = $pendaftaran->dokumen;
        
        return view('pendaftar.dashboard.dokumen', compact('user', 'pendaftaran', 'dokumen'));
    }

    public function uploadDokumen(Request $request)
    {
        $user = Auth::guard('pendaftar')->user();
        $pendaftaran = $user->pendaftaran;
        
        if (!$pendaftaran) {
            return redirect()->route('pendaftar.pendaftaran')->with('error', 'Silakan lengkapi data pendaftaran terlebih dahulu.');
        }

        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'file_dokumen' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        try {
            $file = $request->file('file_dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('dokumen-pmb/' . $user->id, $filename, 'public');

            \App\Models\Pendaftaran\DokumenPMB::create([
                'pendaftar_id' => $pendaftaran->id, // Use pendaftaran ID instead of user ID
                'nama_dokumen' => $request->nama_dokumen,
                'file_path' => $path,
                'file_name' => $filename,
                'file_size' => $file->getSize(),
                'mime_type' => $file->getMimeType(),
                'status' => 'pending',
            ]);

            return back()->with('success', 'Dokumen berhasil diupload!');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal upload dokumen: ' . $e->getMessage());
        }
    }

    public function deleteDokumen($id)
    {
        $user = Auth::guard('pendaftar')->user();
        $pendaftaran = $user->pendaftaran;
        
        if (!$pendaftaran) {
            return redirect()->route('pendaftar.pendaftaran')->with('error', 'Silakan lengkapi data pendaftaran terlebih dahulu.');
        }
        
        $dokumen = \App\Models\Pendaftaran\DokumenPMB::where('pendaftar_id', $pendaftaran->id)
                                                    ->where('id', $id)
                                                    ->firstOrFail();
        
        try {
            // Delete file from storage
            Storage::disk('public')->delete($dokumen->file_path);
            
            // Delete record
            $dokumen->delete();
            
            return back()->with('success', 'Dokumen berhasil dihapus!');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus dokumen: ' . $e->getMessage());
        }
    }

    public function status()
    {
        $user = Auth::guard('pendaftar')->user();
        $pendaftaran = $user->pendaftaran;
        
        // Load necessary relationships
        if ($pendaftaran) {
            $pendaftaran->load(['prodi1.jenjang', 'tahunAkademik']);
        }
        
        return view('pendaftar.dashboard.status', compact('user', 'pendaftaran'));
    }

    public function getProgramStudi($jenjang_id)
    {
        $prodis = ProgramStudi::where('jenjang_id', $jenjang_id)
                             ->where('status', 'Aktif')
                             ->get(['id', 'name', 'code']);
        
        return response()->json($prodis);
    }

    public function profile()
    {
        $user = Auth::guard('pendaftar')->user();
        $pendaftaran = $user->pendaftaran;
        return view('pendaftar.profile', compact('user', 'pendaftaran'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::guard('pendaftar')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:pendaftar_users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'phone', 'email'));

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function changePassword(Request $request)
    {
        $user = Auth::guard('pendaftar')->user();

        $request->validate([
            'password' => 'required|min:8|confirmed',
        ], [
            'password.required' => 'Password baru harus diisi',
            'password.min' => 'Password baru minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password berhasil diubah.');
    }

    public function uploadPembayaran(Request $request)
    {
        $user = Auth::guard('pendaftar')->user();
        $pendaftaran = $user->pendaftaran;
        
        if (!$pendaftaran) {
            return redirect()->route('pendaftar.pendaftaran')->with('error', 'Silakan lengkapi data pendaftaran terlebih dahulu.');
        }

        $request->validate([
            'bank_tujuan' => 'required|string',
            'bank_pengirim' => 'required|string|max:50',
            'nama_pengirim' => 'required|string|max:100',
            'jumlah_transfer' => 'required|numeric|min:1',
            'tanggal_transfer' => 'required|date',
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'catatan_transfer' => 'nullable|string|max:500',
        ], [
            'bank_tujuan.required' => 'Bank tujuan harus dipilih',
            'bank_pengirim.required' => 'Bank pengirim harus diisi',
            'nama_pengirim.required' => 'Nama pengirim harus diisi',
            'jumlah_transfer.required' => 'Jumlah transfer harus diisi',
            'tanggal_transfer.required' => 'Tanggal transfer harus diisi',
            'bukti_pembayaran.required' => 'Bukti pembayaran harus diupload',
            'bukti_pembayaran.max' => 'Ukuran file maksimal 2MB',
        ]);

        try {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_bukti_' . $user->id . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('bukti-pembayaran/' . $user->id, $filename, 'public');

            // Update pendaftaran dengan data pembayaran
            $pendaftaran->update([
                'bank_tujuan' => $request->bank_tujuan,
                'bank_pengirim' => $request->bank_pengirim,
                'nama_pengirim' => $request->nama_pengirim,
                'jumlah_transfer' => $request->jumlah_transfer,
                'tanggal_transfer' => $request->tanggal_transfer,
                'bukti_pembayaran' => $path,
                'catatan_transfer' => $request->catatan_transfer,
                'status_pembayaran' => 'pending',
            ]);

            return back()->with('success', 'Bukti pembayaran berhasil diupload! Menunggu verifikasi admin.');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal upload bukti pembayaran: ' . $e->getMessage());
        }
    }

    public function downloadKartu()
    {
        $user = Auth::guard('pendaftar')->user();
        $pendaftaran = $user->pendaftaran;
        
        if (!$pendaftaran) {
            return redirect()->route('pendaftar.dashboard')->with('error', 'Data pendaftaran tidak ditemukan.');
        }

        // Load necessary relationships
        $pendaftaran->load(['prodi1.jenjang', 'tahunAkademik']);

        // Get pas foto from documents
        $pasFoto = $pendaftaran->dokumen()
            ->where(function($query) {
                $query->where('nama_dokumen', 'like', '%pas foto%')
                      ->orWhere('nama_dokumen', 'like', '%foto%')
                      ->orWhere('nama_dokumen', 'like', '%pasfoto%');
            })
            ->where('status', '!=', 'rejected')
            ->first();

        // Generate PDF kartu peserta
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pendaftar.kartu-peserta', compact('user', 'pendaftaran', 'pasFoto'));
        $pdf->setPaper('A4', 'portrait');
        
        $filename = 'kartu-peserta-' . ($pendaftaran->numb_reg ?? $pendaftaran->code ?? 'PMB-' . date('Y') . '-' . str_pad($user->id, 6, '0', STR_PAD_LEFT)) . '.pdf';
        
        return $pdf->download($filename);
    }
}
