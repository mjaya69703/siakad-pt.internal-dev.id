<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
// Use Models
use App\Models\Pengaturan\WebSetting;
use App\Models\Publikasi\Pengumuman;
use App\Models\Publikasi\KalenderAkademik;
use App\Models\Publikasi\Kategori;
// Use Plugins

class RootController extends Controller
{

    public function renderWelcome()
    {
        return view('welcome');
    }

    public function renderHomePage()
    {
        if (!Schema::hasTable('web_settings')) {
            return $this->renderWelcome();
        }
        $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = null;
        $data['pages'] = "HomePage";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Publikasi
        $data['pengumuman'] = Pengumuman::where('status', 'Publish')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $data['kalender'] = KalenderAkademik::where('status', 'Publish')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('central.main-content', $data, compact('user'));
    }

    public function renderPengumuman()
    {
        // if (!Schema::hasTable('web_settings')) {
        //     return $this->renderWelcome();
        // }
        $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = null;
        $data['pages'] = "Pengumuman";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Get all Publish announcements with pagination
        $data['pengumuman'] = Pengumuman::where('status', 'Publish')
            ->with(['kategori', 'author'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Get categories for sidebar
        $data['kategoris'] = Kategori::withCount('pengumumans')
            ->get();

        // Get recent announcements for sidebar
        $data['recentPengumuman'] = Pengumuman::where('status', 'Publish')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('central.pages.pengumuman-index', $data, compact('user'));
    }

    public function renderPengumumanView($slug)
    {
        if (!Schema::hasTable('web_settings')) {
            return $this->renderWelcome();
        }
        $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = null;
        $data['pages'] = "Detail Pengumuman";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Get announcement by slug/code
        $data['pengumuman'] = Pengumuman::where('slug', $slug)
            ->where('status', 'Publish')
            ->with(['kategori', 'author'])
            ->firstOrFail();
        
        // Get related announcements
        $data['relatedPengumuman'] = Pengumuman::where('status', 'Publish')
            ->where('kategori_id', $data['pengumuman']->kategori_id)
            ->where('id', '!=', $data['pengumuman']->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('central.pages.pengumuman-view', $data, compact('user'));
    }

    public function renderKalenderAkademik()
    {
        if (!Schema::hasTable('web_settings')) {
            return $this->renderWelcome();
        }
        $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = null;
        $data['pages'] = "Kalender Akademik";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Get all Publish academic calendar events
        $data['kalenderAkademik'] = KalenderAkademik::where('status', 'Publish')
            ->orderBy('start_date', 'asc')
            ->get();

        return view('central.pages.kalender-index', $data, compact('user'));
    }

    public function renderKalenderAkademikView($code)
    {
        if (!Schema::hasTable('web_settings')) {
            return $this->renderWelcome();
        }
        $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = null;
        $data['pages'] = "Detail Kalender Akademik";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Get calendar event by ID/code
        $data['kalenderAkademik'] = KalenderAkademik::where('code', $code)
            ->where('status', 'Publish')
            ->firstOrFail();

        // Get related events of same type
        $data['relatedEvents'] = KalenderAkademik::where('status', 'Publish')
            ->where('type', $data['kalenderAkademik']->type)
            ->where('id', '!=', $data['kalenderAkademik']->id)
            ->orderBy('start_date', 'asc')
            ->take(5)
            ->get();

        return view('central.pages.kalender-view', $data, compact('user'));
    }
}
