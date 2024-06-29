<?php

namespace App\Http\Controllers\Admin\Pages\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// SECTION ADDONS SYSTEM
use Illuminate\Support\Facades\File;
use Auth;
use Hash;
use Str;
// SECTION ADDONS EXTERNAL
use Alert;
use App\Helper\roleTrait;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// SECTION MODELS
use App\Models\User;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\ProgramStudi;
use App\Models\ProgramKuliah;
use App\Models\Mahasiswa;
use App\Models\TagihanKuliah;
use App\Models\HistoryTagihan;
use App\Models\Settings\webSettings;

class PembayaranController extends Controller
{
    use roleTrait;
    
    public function index(Request $request)
    {
        $data['income'] = HistoryTagihan::where('stat', 1)->whereHas('tagihan', function ($query) use ($request){
            $query->select('price');
        })->with('tagihan')->get()->sum(function ($history) {
            return $history->tagihan->price;
        });
        $data['tagihan'] = TagihanKuliah::all();
        $data['history'] = HistoryTagihan::where('stat', 1)->latest()->get();
        $data['prefix'] = $this->setPrefix();
        $data['web'] = webSettings::where('id', 1)->first();


        return view('user.finance.pages.pembayaran-index', $data);
    }
}
