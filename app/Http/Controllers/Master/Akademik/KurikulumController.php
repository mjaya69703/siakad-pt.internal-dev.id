<?php

namespace App\Http\Controllers\Master\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// USE MODELS
use App\Models\Akademik\Kurikulum;
use App\Models\Akademik\ProgramStudi;
use App\Models\Pengaturan\WebSetting;

class KurikulumController extends Controller
{
    public function renderKurikulum()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Kurikulum";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['prodi'] = ProgramStudi::all();
        $data['kurikulum'] = Kurikulum::all();

        return view('master.akademik.kurikulum-index', $data, compact('user'));
    }

    public function handleKurikulum(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'prodi_id' => 'required|exists:program_studis,id',
                'taka_start' => 'required|integer',
                'taka_ended' => 'nullable|integer',
                'name' => 'required|string|max:255',
                'desc' => 'nullable|string',
                'status' => 'required|in:Masih Berlaku,Tidak Berlaku',
            ]);

            $code = 'KRK-' . Str::random(8);

            Kurikulum::create([
                'prodi_id' => $request->prodi_id,
                'taka_start' => $request->taka_start,
                'taka_ended' => $request->taka_ended,
                'name' => $request->name,
                'code' => $code,
                'desc' => $request->desc,
                'status' => $request->status,
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Kurikulum berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menambahkan Kurikulum: ' . $e->getMessage())->withInput();
        }
    }

    public function updateKurikulum(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'prodi_id' => 'required|exists:program_studis,id',
                'taka_start' => 'required|integer',
                'taka_ended' => 'nullable|integer',
                'name' => 'required|string|max:255',
                'desc' => 'nullable|string',
                'status' => 'required|in:Masih Berlaku,Tidak Berlaku',
            ]);

            $kurikulum = Kurikulum::where('code', $code)->firstOrFail();

            $kurikulum->update([
                'prodi_id' => $request->prodi_id,
                'taka_start' => $request->taka_start,
                'taka_ended' => $request->taka_ended,
                'name' => $request->name,
                'desc' => $request->desc,
                'status' => $request->status,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Kurikulum berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal memperbarui Kurikulum: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteKurikulum($code)
    {
        try {
            DB::beginTransaction();

            $kurikulum = Kurikulum::where('code', $code)->firstOrFail();
            $kurikulum->update(['deleted_by' => Auth::id()]);
            $kurikulum->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Kurikulum berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Kurikulum: ' . $e->getMessage());
        }
    }
}