<?php

namespace App\Http\Controllers\Admin\Pages\Core;

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
use App\Models\TahunAkademik;
use App\Models\Settings\webSettings;

class TahunAkademikController extends Controller
{
    use roleTrait;

    public function index()
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['prefix'] = $this->setPrefix();
        $data['taka'] = TahunAkademik::all();
        // $data['dosen'] = Dosen::where('dsn_stat', 1)->get();

        return view('user.admin.master.admin-taka-index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:999999',
            'semester' => 'required|string',
            'year_start' => 'required|integer',
        ]);

        $taka = new TahunAkademik;
        $taka->name = $request->name;
        $taka->code = $request->code;
        $taka->semester = $request->semester;
        $taka->year_start = $request->year_start;
        $taka->save();

        Alert::success('success', 'Data telah berhasil disimpan');
        return back();
    }

    public function update(Request $request, $code)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:999999',
            'semester' => 'required|string',
            'year_start' => 'required|integer',
        ]);

        $taka = TahunAkademik::where('code', $code)->first();
        $taka->name = $request->name;
        $taka->code = $request->code;
        $taka->semester = $request->semester;
        $taka->year_start = $request->year_start;
        $taka->save();

        Alert::success('success', 'Data telah berhasil diupdate');
        return back();
    }

    public function destroy(Request $request, $code)
    {

        $taka = TahunAkademik::where('code', $code)->first();
        $taka->delete();

        Alert::success('success', 'Data telah berhasil dihapus');
        return back();
    }
}
