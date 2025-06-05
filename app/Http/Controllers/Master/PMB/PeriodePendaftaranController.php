<?php

namespace App\Http\Controllers\Master\PMB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\PMB\PeriodePendaftaran;
use App\Models\Akademik\TahunAkademik;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class PeriodePendaftaranController extends Controller
{
    public function renderPeriode()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Periode Pendaftaran";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['periodes'] = PeriodePendaftaran::all();
        $data['takas'] = TahunAkademik::all();
        
        return view('master.pmb.periode-index', $data, compact('user'));
    }

    public function handlePeriode(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'desc' => 'nullable|string',
                'taka_id' => 'required|integer',
                'start_date' => 'required|date',
                'ended_date' => 'required|date|after:start_date',
            ]);

            // Generate unique code
            $code = 'PRD-' . Str::random(8);
            
            // Create new Periode
            PeriodePendaftaran::create([
                'name' => $request->name,
                'code' => $code,
                'desc' => $request->desc,
                'taka_id' => $request->taka_id,
                'start_date' => $request->start_date,
                'ended_date' => $request->ended_date,
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Periode Pendaftaran berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Periode Pendaftaran: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updatePeriode(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'desc' => 'nullable|string',
                'taka_id' => 'required|integer',
                'start_date' => 'required|date',
                'ended_date' => 'required|date|after:start_date',
            ]);

            $periode = PeriodePendaftaran::where('code', $code)->firstOrFail();

            $periode->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'taka_id' => $request->taka_id,
                'start_date' => $request->start_date,
                'ended_date' => $request->ended_date,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Periode Pendaftaran berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Periode Pendaftaran: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deletePeriode($code)
    {
        try {
            DB::beginTransaction();

            $periode = PeriodePendaftaran::where('code', $code)->firstOrFail();

            // Optional: Add check if Periode has related Jalur Pendaftaran before deleting
            if ($periode->jalurs()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus Periode yang masih memiliki Jalur Pendaftaran');
            }

            $periode->update([
                'deleted_by' => Auth::id()
            ]);
            $periode->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Periode Pendaftaran berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Periode Pendaftaran: ' . $e->getMessage());
        }
    }
}
