<?php

namespace App\Http\Controllers\Master\PMB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\PMB\BiayaPendaftaran;
use App\Models\PMB\JalurPendaftaran;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class BiayaPendaftaranController extends Controller
{
    public function renderBiaya()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Biaya Pendaftaran";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['biayas'] = BiayaPendaftaran::with('jalur')->get();
        $data['jalurs'] = JalurPendaftaran::all();
        
        return view('master.pmb.biaya-index', $data, compact('user'));
    }

    public function handleBiaya(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'jalur_id' => 'required|exists:jalur_pendaftarans,id',
                'value' => 'required|numeric|min:0',
                'desc' => 'nullable|string',
            ]);

            // Generate unique code
            $code = 'BIA-' . Str::random(8);
            
            // Create new BiayaPendaftaran
            BiayaPendaftaran::create([
                'name' => $request->name,
                'code' => $code,
                'jalur_id' => $request->jalur_id,
                'value' => $request->value,
                'desc' => $request->desc,
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Biaya Pendaftaran berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Biaya Pendaftaran: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateBiaya(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'jalur_id' => 'required|exists:jalur_pendaftarans,id',
                'value' => 'required|numeric|min:0',
                'desc' => 'nullable|string',
            ]);

            $biaya = BiayaPendaftaran::where('code', $code)->firstOrFail();

            $biaya->update([
                'name' => $request->name,
                'jalur_id' => $request->jalur_id,
                'value' => $request->value,
                'desc' => $request->desc,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Biaya Pendaftaran berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Biaya Pendaftaran: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteBiaya($code)
    {
        try {
            DB::beginTransaction();

            $biaya = BiayaPendaftaran::where('code', $code)->firstOrFail();

            $biaya->update([
                'deleted_by' => Auth::id()
            ]);
            $biaya->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Biaya Pendaftaran berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Biaya Pendaftaran: ' . $e->getMessage());
        }
    }
}
