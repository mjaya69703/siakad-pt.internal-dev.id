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
        $data['pendaftars'] = Pendaftar::with(['dokumen.syarat', 'jalur', 'gelombang'])->get();
        $data['jalurs'] = JalurPendaftaran::all();
        $data['gelombangs'] = GelombangPendaftaran::all();
        
        return view('master.pmb.pendaftar-index', $data, compact('user'));
    }

    public function handlePendaftar(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'jalur_id' => 'required|integer',
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
                'status' => $request->status,
                'updated_by' => Auth::id(),
            ]);


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
}
