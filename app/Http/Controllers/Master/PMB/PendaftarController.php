<?php

namespace App\Http\Controllers\Master\PMB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
// Use Models
use App\Models\Pendaftaran\Pendaftar;
use App\Models\Pendaftaran\DokumenPMB;
use App\Models\PMB\SyaratPendaftaran;
use App\Models\Pengaturan\WebSetting;
use App\Models\Mahasiswa;
use App\Models\Akademik\JenisKelas;
use App\Models\Akademik\Kelas;
use App\Models\Akademik\ProgramStudi;
use App\Models\PMB\JalurPendaftaran;
use App\Models\PMB\GelombangPendaftaran;
// Use Plugins
use PDF;
use Excel;

class PendaftarController extends Controller
{
    public function renderPendaftar()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Pendaftar";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        
        // Load necessary data for filtering and display
        $data['pendaftars'] = Pendaftar::with([
            'dokumen.syarat', 
            'jalur', 
            'gelombang', 
            'prodi1.jenjang', 
            'prodi2.jenjang',
            'jenisKelas',
            'tahunAkademik'
        ])->get();
        
        $data['jalurs'] = JalurPendaftaran::all();
        $data['jenisKelas'] = JenisKelas::all();
        $data['prodis'] = ProgramStudi::with('jenjang')->get();
        $data['gelombangs'] = GelombangPendaftaran::all();
        
        // Add missing variables for view
        $data['activeTaka'] = \App\Models\Akademik\TahunAkademik::where('is_active', true)->first();
        $data['takas'] = \App\Models\Akademik\TahunAkademik::orderBy('created_at', 'desc')->get();
        
        // Load periodes dengan relationship taka yang benar
        if(class_exists(\App\Models\PMB\PeriodePendaftaran::class)) {
            $data['periodes'] = \App\Models\PMB\PeriodePendaftaran::with('taka')->orderBy('created_at', 'desc')->get();
        } else {
            $data['periodes'] = collect([]); // Empty collection jika model tidak ada
        }
        
        $data['selectedPeriodeId'] = request('periode_id');
        $data['jenjangs'] = \App\Models\Akademik\JenjangPendidikan::all();
        
        return view('master.pmb.pendaftar-index', $data, compact('user'));
    }

    public function handlePendaftar(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'jalur_id' => 'required|integer',
                'prodi_1' => 'required|integer',
                'prodi_2' => 'required|integer',
                'jenis_id' => 'required|integer',
                'gelombang_id' => 'required|integer',
                'phone' => 'required|string|unique:mahasiswas',
                'email' => 'required|email|unique:mahasiswas',
                'name' => 'required|string',
                'bio_gender' => 'required|string',
                'bio_placebirth' => 'required|string',
                'bio_datebirth' => 'required|date',
                'bio_religion' => 'required|string',
                'ktp_addres' => 'required|string',
                'ktp_rt' => 'required|string',
                'ktp_rw' => 'required|string',
                'ktp_village' => 'required|string',
                'ktp_subdistrict' => 'required|string',
                'ktp_city' => 'required|string',
                'ktp_province' => 'required|string',
                'ktp_poscode' => 'required|string',
                'numb_ktp' => 'required|string|unique:mahasiswas',
            ]);

            // Generate unique code for mahasiswa
            $mahasiswaCode = 'MHS-' . Str::random(8);
            
            // Generate unique code and registration number for pendaftar
            $code = 'PMB-' . Str::random(8);
            $numbReg = 'REG-' . date('Ymd') . '-' . Str::random(4);

            // Create new Mahasiswa
            $mahasiswa = Mahasiswa::create([
                'type' => 0, // Default type
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'bio_gender' => $request->bio_gender,
                'bio_placebirth' => $request->bio_placebirth,
                'bio_datebirth' => $request->bio_datebirth,
                'bio_religion' => $request->bio_religion,
                'ktp_addres' => $request->ktp_addres,
                'ktp_rt' => $request->ktp_rt,
                'ktp_rw' => $request->ktp_rw,
                'ktp_village' => $request->ktp_village,
                'ktp_subdistrict' => $request->ktp_subdistrict,
                'ktp_city' => $request->ktp_city,
                'ktp_province' => $request->ktp_province,
                'ktp_poscode' => $request->ktp_poscode,
                'numb_ktp' => $request->numb_ktp,
                'numb_reg' => $numbReg,
                'code' => $mahasiswaCode,
                'password' => Hash::make($mahasiswaCode), 
                'created_by' => Auth::id(),
            ]);


            
            // Create new Pendaftar
            $pendaftar = Pendaftar::create([
                'mahasiswa_id' => $mahasiswa->id,
                'jalur_id' => $request->jalur_id,
                'jenis_id' => $request->jenis_id,
                'prodi_1' => $request->prodi_1,
                'prodi_2' => $request->prodi_2,
                'gelombang_id' => $request->gelombang_id,
                'phone' => $request->phone,
                'email' => $request->email,
                'name' => $request->name,
                'code' => $code,
                'numb_reg' => $numbReg,
                'register_date' => now(),
                'status' => 'Pending', // Status pendaftaran calon mahasiswa
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Pendaftaran berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan pendaftaran: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updatePendaftar(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'phone' => 'required|string|unique:pendaftars,phone,' . $code . ',code',
                'email' => 'required|email|unique:pendaftars,email,' . $code . ',code',
                'name' => 'required|string',
                'status' => 'required|in:Pending,Lulus,Gagal,Batal' // Status pendaftaran calon mahasiswa
            ]);

            $pendaftar = Pendaftar::where('code', $code)->firstOrFail();
            $mahasiswa = Mahasiswa::where('id', $pendaftar->mahasiswa_id)->firstOrFail();

            $pendaftar->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'name' => $request->name,
                'status' => $request->status,
                'updated_by' => Auth::id(),
            ]);

            $mahasiswa->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'name' => $request->name,
                'updated_by' => Auth::id(),
            ]);

            if($request->status == 'Lulus'){
                // Ambil semua kelas yang sesuai dengan jenis kelas dan program studi
                $availableKelas = Kelas::where('jenis_kelas_id', $pendaftar->jenis_id)
                    ->where('prodi_id', $request->prodi_id)
                    ->get();

                $selectedKelas = null;
                
                // Loop untuk mencari kelas yang masih memiliki kapasitas tersedia
                foreach($availableKelas as $kelas) {
                    $countStudent = Mahasiswa::where('kelas_id', $kelas->id)->count();
                    
                    // Pilih kelas yang kapasitasnya masih lebih besar dari jumlah mahasiswa saat ini
                    if($kelas->capacity > $countStudent) {
                        $selectedKelas = $kelas;
                        break;
                    }
                }

                // Jika tidak ada kelas yang tersedia, buat error atau handling khusus
                if(!$selectedKelas) {
                    throw new \Exception('Tidak ada kelas yang tersedia dengan kapasitas mencukupi');
                }

                $mahasiswa->update([
                    'type' => 1,
                    'semester' => 1,
                    'prodi_id' => $request->prodi_id,
                    'kelas_id' => $selectedKelas->id,
                    'taka_regist' => $pendaftar->gelombang->jalur->periode->taka_id,
                    'taka_active' => $pendaftar->gelombang->jalur->periode->taka_id,
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Data pendaftar berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui data pendaftar: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deletePendaftar($code)
    {
        try {
            DB::beginTransaction();

            $pendaftar = Pendaftar::where('code', $code)->firstOrFail();
            $mahasiswa = Mahasiswa::where('id', $pendaftar->mahasiswa_id)->firstOrFail();

            // Soft delete dokumen
            DokumenPMB::where('pendaftar_id', $pendaftar->id)->update([
                'deleted_by' => Auth::id()
            ]);
            DokumenPMB::where('pendaftar_id', $pendaftar->id)->delete();

            // Soft delete pendaftar
            $pendaftar->update([
                'deleted_by' => Auth::id()
            ]);
            $mahasiswa->update([
                'deleted_by' => Auth::id()
            ]);
            $pendaftar->delete();
            $mahasiswa->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Pendaftar berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus pendaftar: ' . $e->getMessage());
        }
    }

    public function renderDetail($code)
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Detail Pendaftar";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        
        $data['pendaftar'] = Pendaftar::with(['dokumen.syarat', 'jalur', 'gelombang', 'mahasiswa'])
            ->where('code', $code)
            ->firstOrFail();

        return view('master.pmb.pendaftar-detail', $data, compact('user'));
    }

    public function handleDokumen(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'dokumen' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'type' => 'required|string',
                'syarat_id' => 'required|exists:syarat_pendaftarans,id'
            ]);

            $pendaftar = Pendaftar::where('code', $code)->firstOrFail();
            $file = $request->file('dokumen');
            $path = $file->store('dokumen-pmb/' . $code);
            $dokumenCode = 'DOC-' . Str::random(8);

            DokumenPMB::create([
                'pendaftar_id' => $pendaftar->id,
                'syarat_id' => $request->syarat_id,
                'type' => $request->type,
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'code' => $dokumenCode,
                'status' => 'Pending', // Status validasi dokumen
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Dokumen berhasil diupload');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal upload dokumen: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function validasiDokumen(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'status' => 'required|in:Pending,Valid,Tidak Valid', // Status validasi dokumen
                'catatan' => 'nullable|string'
            ]);

            $dokumen = DokumenPMB::where('code', $code)->firstOrFail();
            $dokumen->update([
                'status' => $request->status,
                'desc' => $request->catatan,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Status dokumen berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui status dokumen: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function validasiDokumenBatch(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'dokumen_ids' => 'required|array',
                'status' => 'required|in:Pending,Valid,Tidak Valid', // Status validasi dokumen
                'catatan' => 'nullable|string'
            ]);

            DokumenPMB::whereIn('id', $request->dokumen_ids)->update([
                'status' => $request->status,
                'desc' => $request->catatan,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Status dokumen berhasil diperbarui secara batch');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui status dokumen: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateStatusBatch(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'pendaftar_ids' => 'required|array',
                'status' => 'required|in:Pending,Lulus,Gagal,Batal', // Status pendaftaran calon mahasiswa
                'catatan' => 'nullable|string'
            ]);

            Pendaftar::whereIn('id', $request->pendaftar_ids)->update([
                'status' => $request->status,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Status pendaftar berhasil diperbarui secara batch');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui status pendaftar: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function exportPendaftarExcel(Request $request)
    {
        try {
            $request->validate([
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date',
                'jalur_id' => 'nullable|integer',
                'status' => 'nullable|string'
            ]);

            $query = Pendaftar::with(['dokumen', 'jalur', 'gelombang', 'mahasiswa']);

            if ($request->start_date && $request->end_date) {
                $query->whereBetween('register_date', [$request->start_date, $request->end_date]);
            }

            if ($request->jalur_id) {
                $query->where('jalur_id', $request->jalur_id);
            }

            if ($request->status) {
                $query->where('status', $request->status);
            }

            $pendaftars = $query->get();

            return Excel::download(new PendaftarExport($pendaftars), 'pendaftar-' . date('Y-m-d') . '.xlsx');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal export data: ' . $e->getMessage());
        }
    }

    public function exportPendaftarPDF(Request $request)
    {
        try {
            $request->validate([
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date',
                'jalur_id' => 'nullable|integer',
                'status' => 'nullable|string'
            ]);

            $query = Pendaftar::with(['dokumen', 'jalur', 'gelombang', 'mahasiswa']);

            if ($request->start_date && $request->end_date) {
                $query->whereBetween('register_date', [$request->start_date, $request->end_date]);
            }

            if ($request->jalur_id) {
                $query->where('jalur_id', $request->jalur_id);
            }

            if ($request->status) {
                $query->where('status', $request->status);
            }

            $pendaftars = $query->get();
            $data['pendaftars'] = $pendaftars;
            $data['webs'] = WebSetting::first();

            $pdf = PDF::loadView('master.pmb.pendaftar-pdf', $data);
            return $pdf->download('pendaftar-' . date('Y-m-d') . '.pdf');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal export data: ' . $e->getMessage());
        }
    }

    /*
    public function sendNotifikasi($code)
    {
        try {
            $pendaftar = Pendaftar::where('code', $code)->firstOrFail();
            
            // Email notification
            // Mail::to($pendaftar->email)->send(new PendaftarStatusNotification($pendaftar));
            
            // WhatsApp notification
            // WhatsApp::send($pendaftar->phone, "Status pendaftaran Anda telah diperbarui menjadi: {$pendaftar->status}");
            
            return redirect()->back()->with('success', 'Notifikasi berhasil dikirim');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengirim notifikasi: ' . $e->getMessage());
        }
    }
    */

    /**
     * Set active tahun akademik
     */
    public function setActiveTahunAkademik(Request $request)
    {
        try {
            $request->validate([
                'taka_id' => 'required|exists:tahun_akademiks,id',
            ]);

            // Set semua tahun akademik menjadi tidak aktif
            \App\Models\Akademik\TahunAkademik::query()->update(['is_active' => false]);

            // Set tahun akademik yang dipilih menjadi aktif
            \App\Models\Akademik\TahunAkademik::where('id', $request->taka_id)->update(['is_active' => true]);

            return back()->with('success', 'Tahun akademik aktif berhasil diperbarui!');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui tahun akademik aktif: ' . $e->getMessage());
        }
    }

    /**
     * PMB Payment verification for Finance users
     */
    public function pmbPembayaran()
    {
        // Check if user is finance
        $spref = 'finance.';
        
        $pendaftars = Pendaftar::with(['prodi1.jenjang', 'gelombang', 'jalur', 'tahunAkademik'])
                              ->whereNotNull('bukti_pembayaran')
                              ->orderBy('created_at', 'desc')
                              ->get();

        return view('finance.pmb-pembayaran', compact('pendaftars', 'spref'));
    }

    public function verifyPembayaran($code)
    {
        try {
            $pendaftar = Pendaftar::where('code', $code)->firstOrFail();
            
            $pendaftar->update([
                'status_pembayaran' => 'verified',
                'tanggal_verifikasi_pembayaran' => now(),
                'updated_by' => Auth::id(),
            ]);

            return back()->with('success', 'Pembayaran berhasil diverifikasi!');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memverifikasi pembayaran: ' . $e->getMessage());
        }
    }

    public function rejectPembayaran(Request $request, $code)
    {
        $request->validate([
            'catatan_verifikasi' => 'required|string|max:500',
        ]);

        try {
            $pendaftar = Pendaftar::where('code', $code)->firstOrFail();
            
            $pendaftar->update([
                'status_pembayaran' => 'rejected',
                'catatan_verifikasi' => $request->catatan_verifikasi,
                'tanggal_verifikasi_pembayaran' => now(),
                'updated_by' => Auth::id(),
            ]);

            return back()->with('success', 'Pembayaran berhasil ditolak!');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menolak pembayaran: ' . $e->getMessage());
        }
    }
}
