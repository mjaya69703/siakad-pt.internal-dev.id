<?php

namespace App\Http\Controllers\Admin\Pages\Inventory;

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
use App\Models\Gedung;
use App\Models\Ruang;
use App\Models\Settings\webSettings;

class RuangController extends Controller
{
    use roleTrait; 

    public function index()
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['prefix'] = $this->setPrefix();
        $data['gedung'] = Gedung::all();
        $data['ruang'] = Ruang::all();

        return view('user.admin.master-inventory.admin-ruang-index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'gedu_id' => 'required|integer',
            'type' => 'required|integer',
            'floor' => 'required|integer',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:5',
        ]);

        $ruang = new Ruang;
        $ruang->gedu_id = $request->gedu_id;
        $ruang->type = $request->type;
        $ruang->floor = $request->floor;
        $ruang->name = $request->name;
        $ruang->code = $request->code;
        $ruang->save();

        Alert::success('success', 'Data telah berhasil disimpan');
        return back();
    }

    public function update(Request $request, $code)
    {
        $request->validate([
            'gedu_id' => 'required|integer',
            'type' => 'required|integer',
            'floor' => 'required|integer',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:5',
        ]);

        $ruang = Ruang::where('code', $code)->first();
        $ruang->gedu_id = $request->gedu_id;
        $ruang->type = $request->type;
        $ruang->floor = $request->floor;
        $ruang->name = $request->name;
        $ruang->code = $request->code;
        $ruang->save();

        Alert::success('success', 'Data telah berhasil diupdate');
        return back();
    }

    public function destroy(Request $request, $code)
    {

        $ruang = Ruang::where('code', $code)->first();
        $ruang->delete();

        Alert::success('success', 'Data telah berhasil dihapus');
        return back();
    }
}