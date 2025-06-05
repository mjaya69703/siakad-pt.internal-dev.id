<?php

namespace App\Http\Controllers\Master\PMB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\PMB\SyaratPendaftaran;
use App\Models\PMB\JalurPendaftaran;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class SyaratPendaftaranController extends Controller
{
    public function renderSyarat()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Syarat Pendaftaran";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['syarats'] = SyaratPendaftaran::with('jalur')->get();
        $data['jalurs'] = JalurPendaftaran::all();
        
        return view('master.pmb.syarat-index', $data, compact('user'));
    }

    public function handleSyarat(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'jalur_id' => 'required|exists:jalur_pendaftarans,id',
                'desc' => 'nullable|string',
            ]);

            // Generate unique code
            $code = 'SYR-' . Str::random(8);
            
            // Create new SyaratPendaftaran
            SyaratPendaftaran::create([
                'name' => $request->name,
                'code' => $code,
                'jalur_id' => $request->jalur_id,
                'desc' => $request->desc,
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Syarat Pendaftaran berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Syarat Pendaftaran: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateSyarat(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'jalur_id' => 'required|exists:jalur_pendaftarans,id',
                'desc' => 'nullable|string',
            ]);

            $syarat = SyaratPendaftaran::where('code', $code)->firstOrFail();

            $syarat->update([
                'name' => $request->name,
                'jalur_id' => $request->jalur_id,
                'desc' => $request->desc,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Syarat Pendaftaran berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Syarat Pendaftaran: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteSyarat($code)
    {
        try {
            DB::beginTransaction();

            $syarat = SyaratPendaftaran::where('code', $code)->firstOrFail();

            // Optional: Add check if Syarat has related data before deleting
            // if ($syarat->dokumen()->count() > 0) {
            //     return redirect()->back()->with('error', 'Tidak dapat menghapus Syarat yang masih memiliki Dokumen terkait');
            // }

            $syarat->update([
                'deleted_by' => Auth::id()
            ]);
            $syarat->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Syarat Pendaftaran berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Syarat Pendaftaran: ' . $e->getMessage());
        }
    }
}
