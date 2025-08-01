<?php

namespace App\Http\Controllers\Master\Publikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\Publikasi\KalenderAkademik;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class KalenderAkademikController extends Controller
{
    public function renderKalenderAkademik()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Kalender Akademik";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['kalender'] = KalenderAkademik::latest()->get();
        
        return view('master.publikasi.kalender-akademik-index', $data, compact('user'));
    }

    public function viewKalenderAkademik($code)
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Kalender Akademik";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['kalender'] = KalenderAkademik::where('code', $code)->firstOrFail();
        
        return view('master.publikasi.kalender-akademik-view', $data, compact('user'));
    }

    public function handleKalenderAkademik(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'desc' => 'nullable|string',
                'start_date' => 'required|date',
                'ended_date' => 'nullable|date|after_or_equal:start_date',
                'type' => 'required|in:Perkuliahan,Ujian,Libur,Pendaftaran,Wisuda,Orientasi,Seminar,Lainnya',
                'status' => 'required|in:Draft,Publish,Archive',
                'color' => 'nullable|string|max:7',
                'highlight' => 'required|in:Ya,Tidak',
                'note' => 'nullable|string'
            ]);

            $code = 'KAL-' . strtoupper(Str::random(8));
            
            $kalender = KalenderAkademik::create([
                'code' => $code,
                'name' => $request->name,
                'desc' => $request->desc,
                'start_date' => $request->start_date,
                'ended_date' => $request->ended_date,
                'type' => $request->type,
                'status' => $request->status,
                'color' => $request->color ?? '#007bff',
                'highlight' => $request->highlight,
                'note' => $request->note,
                'created_by' => Auth::id()
            ]);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'publikasi.kalender-akademik-render')->with('success', 'Kalender akademik berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function updateKalenderAkademik(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $kalender = KalenderAkademik::where('code', $code)->firstOrFail();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'desc' => 'nullable|string',
                'start_date' => 'required|date',
                'ended_date' => 'nullable|date|after_or_equal:start_date',
                'type' => 'required|in:Perkuliahan,Ujian,Libur,Pendaftaran,Wisuda,Orientasi,Seminar,Lainnya',
                'status' => 'required|in:Draft,Publish,Archive',
                'color' => 'nullable|string|max:7',
                'highlight' => 'required|in:Ya,Tidak',
                'note' => 'nullable|string'
            ]);

            $kalender->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'start_date' => $request->start_date,
                'ended_date' => $request->ended_date,
                'type' => $request->type,
                'status' => $request->status,
                'color' => $request->color ?? '#007bff',
                'highlight' => $request->highlight,
                'note' => $request->note,
                'updated_by' => Auth::id()
            ]);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'publikasi.kalender-akademik-render')->with('success', 'Kalender akademik berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteKalenderAkademik($code)
    {
        try {
            $kalender = KalenderAkademik::where('code', $code)->firstOrFail();
            $kalender->update(['deleted_by' => Auth::id()]);
            $kalender->delete();
            
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'publikasi.kalender-akademik-render')->with('success', 'Kalender akademik berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
