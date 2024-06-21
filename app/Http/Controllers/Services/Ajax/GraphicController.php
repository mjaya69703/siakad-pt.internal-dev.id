<?php

namespace App\Http\Controllers\Services\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// SECTION ADDONS SYSTEM
use Illuminate\Support\Facades\File;
use Auth;
use Hash;
use Str;
// SECTION ADDONS EXTERNAL
use Alert;
// SECTION MODELS
use App\Models\FeedBack\FBPerkuliahan;

class GraphicController extends Controller
{
    public function getKepuasanMengajar($code)
    {
        $tidakPuas = FBPerkuliahan::where('fb_jakul_code', $code)->where('fb_score', 'Tidak Puas')->count();
        $cukupPuas = FBPerkuliahan::where('fb_jakul_code', $code)->where('fb_score', 'Cukup Puas')->count();
        $sangatPuas = FBPerkuliahan::where('fb_jakul_code', $code)->where('fb_score', 'Sangat Puas')->count();

        return response()->json([
            'tidakpuas' => $tidakPuas,
            'cukuppuas' => $cukupPuas,
            'sangatpuas' => $sangatPuas,
        ]);
    }

    public function getKepuasanMengajarDosen()
    {
        $dosenId = Auth::guard('dosen')->user()->id;

        $tidakPuas = FBPerkuliahan::whereHas('jadkul', function ($query) use ($dosenId) {
            $query->where('dosen_id', $dosenId);
        })->where('fb_score', 'Tidak Puas')->count();
        $cukupPuas = FBPerkuliahan::whereHas('jadkul', function ($query) use ($dosenId) {
            $query->where('dosen_id', $dosenId);
        })->where('fb_score', 'Cukup Puas')->count();
        $sangatPuas = FBPerkuliahan::whereHas('jadkul', function ($query) use ($dosenId) {
            $query->where('dosen_id', $dosenId);
        })->where('fb_score', 'Sangat Puas')->count();

        return response()->json([
            'tidakpuas' => $tidakPuas,
            'cukuppuas' => $cukupPuas,
            'sangatpuas' => $sangatPuas,
        ]);
    }
}
