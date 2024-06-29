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
use App\Models\ProgramStudi;
use App\Models\ProgramKuliah;
use App\Models\TahunAkademik;
use App\Models\Settings\webSettings;

class ProgramKuliahController extends Controller
{
    use roleTrait;

    public function index()
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['prefix'] = $this->setPrefix();
        $data['taka'] = TahunAkademik::all();
        $data['pstudi'] = ProgramStudi::all();
        $data['proku'] = ProgramKuliah::all();

        return view('user.admin.master.admin-proku-index', $data);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'wave' => 'required|string|max:255',
            'wave_start' => 'required|date',
            'wave_ended' => 'required|date',
            'taka_id' => 'required',
            'pstudi_id' => 'required',
        ]);

        $pstudi = new ProgramKuliah;
        $pstudi->name = $request->name;
        $pstudi->code = $request->code;
        $pstudi->wave = $request->wave;
        $pstudi->wave_start = $request->wave_start;
        $pstudi->wave_ended = $request->wave_ended;
        $pstudi->taka_id = $request->taka_id;
        $pstudi->pstudi_id = $request->pstudi_id;
        $pstudi->save();

        Alert::success('success', 'Data telah berhasil disimpan');
        return back();
    }

    public function update(Request $request, $code)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'wave' => 'required|string|max:255',
            'wave_start' => 'required|date',
            'wave_ended' => 'required|date',
            'taka_id' => 'required',
            'pstudi_id' => 'required',
        ]);

        $pstudi = ProgramKuliah::where('code', $code)->first();
        $pstudi->name = $request->name;
        $pstudi->code = $request->code;
        $pstudi->wave = $request->wave;
        $pstudi->wave_start = $request->wave_start;
        $pstudi->wave_ended = $request->wave_ended;
        $pstudi->taka_id = $request->taka_id;
        $pstudi->pstudi_id = $request->pstudi_id;
        $pstudi->save();

        Alert::success('success', 'Data telah berhasil diupdate');
        return back();
    }

    public function destroy(Request $request, $code)
    {

        $pstudi = ProgramKuliah::where('code', $code)->first();
        $pstudi->delete();

        Alert::success('success', 'Data telah berhasil dihapus');
        return back();
    }
}
