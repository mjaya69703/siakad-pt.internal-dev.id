<?php

namespace App\Http\Controllers\Master\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// Use Models
use App\Models\Akademik\TahunAkademik;
use App\Models\Pengaturan\WebSetting;
// Use Plugins


class TahunAkademikController extends Controller
{
    public function renderTaka()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Tahun Akademik";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['taka'] = TahunAkademik::all();
        
        return view('master.akademik.taka-index', $data, compact('user'));
    }

    public function handleTaka(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|in:Ganjil,Genap',
                'start_date' => 'required|date',
                'ended_date' => 'required|date|after:start_date',
                'desc' => 'nullable|string',
            ]);

            // Generate unique code
            $code = 'TAK-' . Str::random(10);

            // Create new Tahun Akademik
            TahunAkademik::create([
                'name' => $request->name,
                'type' => $request->type,
                'code' => $code,
                'start_date' => $request->start_date,
                'ended_date' => $request->ended_date,
                'desc' => $request->desc,
                'status' => 'Tidak Aktif', // Default status
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Tahun Akademik berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Tahun Akademik: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateTaka(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|in:Ganjil,Genap',
                'start_date' => 'required|date',
                'ended_date' => 'required|date|after:start_date',
                'desc' => 'nullable|string',
                'status' => 'required|in:Aktif,Tidak Aktif',
            ]);

            $taka = TahunAkademik::where('code', $code)->firstOrFail();

            // If status is being changed to Aktif, set all other records to Tidak Aktif
            if ($request->status === 'Aktif' && $taka->status !== 'Aktif') {
                TahunAkademik::where('status', 'Aktif')->update(['status' => 'Tidak Aktif']);
            }

            $taka->update([
                'name' => $request->name,
                'type' => $request->type,
                'start_date' => $request->start_date,
                'ended_date' => $request->ended_date,
                'desc' => $request->desc,
                'status' => $request->status,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Tahun Akademik berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Tahun Akademik: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteTaka($code)
    {
        try {
            DB::beginTransaction();

            $taka = TahunAkademik::where('code', $code)->firstOrFail();
            
            // Check if this is the active academic year
            if ($taka->status === 'Aktif') {
                return redirect()->back()->with('error', 'Tidak dapat menghapus Tahun Akademik yang sedang aktif');
            }

            $taka->update([
                'deleted_by' => Auth::id()
            ]);
            $taka->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Tahun Akademik berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Tahun Akademik: ' . $e->getMessage());
        }
    }
}
