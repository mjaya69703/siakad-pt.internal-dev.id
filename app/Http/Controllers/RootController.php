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
use App\Models\Publikasi\Berita;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\Fakultas;
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

        // Berita untuk homepage
        $data['beritas'] = Berita::where('status', 'Publish')
            ->with(['kategori', 'author'])
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        // Program Studi untuk homepage (grouped by fakultas)
        $data['programStudis'] = ProgramStudi::where('status', 'Aktif')
            ->with(['fakultas'])
            ->orderBy('fakultas_id')
            ->take(6)
            ->get();

        // Fakultas untuk program studi section
        $data['fakultas'] = Fakultas::withCount(['programStudis' => function($query) {
            $query->where('status', 'Aktif');
        }])
            ->having('program_studis_count', '>', 0)
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

    public function renderProgramStudi()
    {
        if (!Schema::hasTable('web_settings')) {
            return $this->renderWelcome();
        }
        $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = null;
        $data['pages'] = "Program Studi";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Get all active program studi with pagination
        $data['programStudis'] = ProgramStudi::where('status', 'Aktif')
            ->with(['fakultas', 'kaprodi'])
            ->orderBy('name', 'asc')
            ->paginate(12);

        // Get level statistics
        $data['levelStats'] = ProgramStudi::where('status', 'Aktif')
            ->selectRaw('level, COUNT(*) as count')
            ->groupBy('level')
            ->pluck('count', 'level')
            ->toArray();

        // Get fakultas for sidebar
        $data['fakultas'] = Fakultas::withCount(['programStudis' => function($query) {
            $query->where('status', 'Aktif');
        }])->get();

        return view('central.pages.prodi-index', $data, compact('user'));
    }

    public function renderProgramStudiView($slug)
    {
        if (!Schema::hasTable('web_settings')) {
            return $this->renderWelcome();
        }
        $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = null;
        $data['pages'] = "Detail Program Studi";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Get program studi by slug
        $data['programStudi'] = ProgramStudi::where('slug', $slug)
            ->where('status', 'Aktif')
            ->with(['fakultas', 'kaprodi'])
            ->firstOrFail();
        
        // Get related program studi from same faculty
        $data['relatedProdi'] = ProgramStudi::where('status', 'Aktif')
            ->where('fakultas_id', $data['programStudi']->fakultas_id)
            ->where('id', '!=', $data['programStudi']->id)
            ->orderBy('name', 'asc')
            ->take(6)
            ->get();

        // Get other program studi with same level
        $data['sameLevelProdi'] = ProgramStudi::where('status', 'Aktif')
            ->where('level', $data['programStudi']->level)
            ->where('id', '!=', $data['programStudi']->id)
            ->orderBy('name', 'asc')
            ->take(4)
            ->get();

        return view('central.pages.prodi-view', $data, compact('user'));
    }

    public function renderBerita()
    {
        if (!Schema::hasTable('web_settings')) {
            return $this->renderWelcome();
        }
        $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = null;
        $data['pages'] = "Berita";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Get all published news with pagination
        $data['beritas'] = Berita::where('status', 'Publish')
            ->with(['kategori', 'author'])
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        // Get total count of published news
        $data['totalBerita'] = Berita::where('status', 'Publish')->count();

        // Get categories for sidebar
        $data['kategoris'] = Kategori::withCount('beritas')
            ->get();

        // Get recent news for sidebar
        $data['recentBerita'] = Berita::where('status', 'Publish')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('central.pages.berita-index', $data, compact('user'));
    }

    public function renderBeritaView($slug)
    {
        if (!Schema::hasTable('web_settings')) {
            return $this->renderWelcome();
        }
        $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = null;
        $data['pages'] = "Detail Berita";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        // Get news by slug
        $data['berita'] = Berita::where('slug', $slug)
            ->where('status', 'Publish')
            ->with(['kategori', 'author'])
            ->firstOrFail();
        
        // Get related news from same category
        $data['relatedBerita'] = Berita::where('status', 'Publish')
            ->where('kategori_id', $data['berita']->kategori_id)
            ->where('id', '!=', $data['berita']->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('central.pages.berita-view', $data, compact('user'));
    }
}
