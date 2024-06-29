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
use App\Models\MataKuliah;
use App\Models\Kurikulum;
use App\Models\Dosen;
use App\Models\TahunAkademik;
use App\Models\Settings\webSettings;

class MataKuliahController extends Controller
{
    use roleTrait;

    public function index()
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['prefix'] = $this->setPrefix();
        $data['kuri'] = Kurikulum::all();
        $data['taka'] = TahunAkademik::all();
        $data['pstudi'] = ProgramStudi::all();
        $data['dosen'] = Dosen::all();
        $data['matkul'] = MataKuliah::all();

        return view('user.admin.master.admin-matkul-index', $data);
    }
    public function create()
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['prefix'] = $this->setPrefix();
        $data['kuri'] = Kurikulum::all();
        $data['taka'] = TahunAkademik::all();
        $data['pstudi'] = ProgramStudi::all();
        $data['matkul'] = MataKuliah::all();
        $data['dosen'] = Dosen::all();

        return view('user.admin.master.admin-matkul-create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'bsks' => 'required|string|max:255',
            'desc' => 'required|string',
            'pstudi_id' => 'required',
            'kuri_id' => 'required',
            'taka_id' => 'required',
            'dosen_1' => 'required',
            'dosen_2' => 'nullable',
            'dosen_3' => 'nullable',
            'requ_id' => 'nullable',
        ]);

        $matkul = new MataKuliah;
        $matkul->name = $request->name;
        $matkul->code = $request->code;
        $matkul->bsks = $request->bsks;
        $matkul->desc = $request->desc;
        $matkul->pstudi_id = $request->pstudi_id;
        $matkul->kuri_id = $request->kuri_id;
        $matkul->taka_id = $request->taka_id;
        $matkul->requ_id = $request->requ_id;
        $matkul->dosen_1 = $request->dosen_1;
        $matkul->dosen_2 = $request->dosen_2;
        $matkul->dosen_3 = $request->dosen_3;
        $matkul->save();

        Alert::success('success', 'Data telah berhasil disimpan');
        return back();
    }

    public function update(Request $request, $code)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'bsks' => 'required|string|max:255',
            'desc' => 'required|string',
            'pstudi_id' => 'required',
            'kuri_id' => 'required',
            'taka_id' => 'required',
            'dosen_1' => 'required',
            'dosen_2' => 'nullable',
            'dosen_3' => 'nullable',
            'requ_id' => 'nullable',
        ]);

        $matkul = MataKuliah::where('code', $code)->first();
        $matkul->name = $request->name;
        $matkul->code = $request->code;
        $matkul->bsks = $request->bsks;
        $matkul->desc = $request->desc;
        $matkul->pstudi_id = $request->pstudi_id;
        $matkul->kuri_id = $request->kuri_id;
        $matkul->taka_id = $request->taka_id;
        $matkul->requ_id = $request->requ_id;
        $matkul->dosen_1 = $request->dosen_1;
        $matkul->dosen_2 = $request->dosen_2;
        $matkul->dosen_3 = $request->dosen_3;
        $matkul->save();

        Alert::success('success', 'Data telah berhasil diupdate');
        return back();
    }

    public function destroy(Request $request, $code)
    {

        $matkul = MataKuliah::where('code', $code)->first();
        $matkul->delete();

        Alert::success('success', 'Data telah berhasil dihapus');
        return back();
    }
}
