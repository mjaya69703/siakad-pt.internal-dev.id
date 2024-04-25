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
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// SECTION MODELS
use App\Models\Fakultas;
use App\Models\ProgramStudi;
use App\Models\Dosen;

class ProgramStudiController extends Controller
{
    public function index()
    {
        $data['fakultas'] = Fakultas::all();
        $data['pstudi'] = ProgramStudi::all();
        $data['dosen'] = Dosen::where('dsn_stat', 1)->get();

        return view('user.admin.master.admin-pstudi-index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:3',
            'head_id' => 'required',
            'faku_id' => 'required',
        ]);

        $pstudi = new ProgramStudi;
        $pstudi->name = $request->name;
        $pstudi->code = $request->code;
        $pstudi->head_id = $request->head_id;
        $pstudi->faku_id = $request->faku_id;
        $pstudi->save();

        Alert::success('success', 'Data telah berhasil disimpan');
        return back();
    }

    public function update(Request $request, $code)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:3',
            'head_id' => 'required',
            'faku_id' => 'required',
        ]);

        $pstudi = ProgramStudi::where('code', $code)->first();
        $pstudi->name = $request->name;
        $pstudi->code = $request->code;
        $pstudi->head_id = $request->head_id;
        $pstudi->faku_id = $request->faku_id;
        $pstudi->save();

        Alert::success('success', 'Data telah berhasil diupdate');
        return back();
    }

    public function destroy(Request $request, $code)
    {

        $pstudi = ProgramStudi::where('code', $code)->first();
        $pstudi->delete();

        Alert::success('success', 'Data telah berhasil dihapus');
        return back();
    }
}
