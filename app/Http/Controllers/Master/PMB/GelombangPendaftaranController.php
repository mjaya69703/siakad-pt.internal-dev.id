<?php

namespace App\Http\Controllers\Master\PMB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\PMB\GelombangPendaftaran;
use App\Models\PMB\JalurPendaftaran;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class GelombangPendaftaranController extends Controller
{
    public function renderGelombang()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Gelombang Pendaftaran";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['gelombangs'] = GelombangPendaftaran::with('jalur')->get();
        $data['jalurs'] = JalurPendaftaran::All();
        
        return view('master.pmb.gelombang-index', $data, compact('user'));
    }

    public function handleGelombang(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'jalur_id' => 'required|exists:jalur_pendaftarans,id',
                'start_date' => 'required|date',
                'ended_date' => 'required|date|after:start_date',
                'desc' => 'nullable|string',
            ]);

            // Generate unique code
            $code = 'GEL-' . Str::random(8);
            
            // Create new GelombangPendaftaran
            GelombangPendaftaran::create([
                'name' => $request->name,
                'code' => $code,
                'jalur_id' => $request->jalur_id,
                'start_date' => $request->start_date,
                'ended_date' => $request->ended_date,
                'desc' => $request->desc,
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Gelombang Pendaftaran berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Gelombang Pendaftaran: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateGelombang(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'jalur_id' => 'required|exists:jalur_pendaftarans,id',
                'start_date' => 'required|date',
                'ended_date' => 'required|date|after:start_date',
                'desc' => 'nullable|string',
            ]);

            $gelombang = GelombangPendaftaran::where('code', $code)->firstOrFail();

            $gelombang->update([
                'name' => $request->name,
                'jalur_id' => $request->jalur_id,
                'start_date' => $request->start_date,
                'ended_date' => $request->ended_date,
                'desc' => $request->desc,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Gelombang Pendaftaran berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Gelombang Pendaftaran: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteGelombang($code)
    {
        try {
            DB::beginTransaction();

            $gelombang = GelombangPendaftaran::where('code', $code)->firstOrFail();

            // Optional: Add check if Gelombang has related data before deleting
            if ($gelombang->pendaftar()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus Gelombang yang masih memiliki Pendaftar terkait');
            }

            $gelombang->update([
                'deleted_by' => Auth::id()
            ]);
            $gelombang->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Gelombang Pendaftaran berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Gelombang Pendaftaran: ' . $e->getMessage());
        }
    }
}
