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
use PDF;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// SECTION MODELS
use App\Models\ProgramStudi;
use App\Models\MataKuliah;
use App\Models\Kurikulum;
use App\Models\Dosen;
use App\Models\TahunAkademik;
use App\Models\JadwalKuliah;
use App\Models\AbsensiMahasiswa;
use App\Models\Ruang;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Settings\webSettings;

class JadwalKuliahController extends Controller
{
    use roleTrait;

    public function index()
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['prefix'] = $this->setPrefix();
        $data['kuri'] = Kurikulum::all();
        $data['taka'] = TahunAkademik::all();
        $data['dosen'] = MataKuliah::where('dosen');
        $data['pstudi'] = ProgramStudi::all();
        $data['matkul'] = MataKuliah::all();
        $data['jadkul'] = JadwalKuliah::all();
        $data['ruang'] = Ruang::all();
        $data['kelas'] = Kelas::all();


        return view('user.admin.master.admin-jadkul-index', $data);
    }

    public function create()
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['prefix'] = $this->setPrefix();
        $data['kuri'] = Kurikulum::all();
        $data['taka'] = TahunAkademik::all();
        $data['dosen'] = Dosen::all();
        $data['pstudi'] = ProgramStudi::all();
        $data['matkul'] = MataKuliah::all();
        $data['jadkul'] = JadwalKuliah::latest()->paginate(2);
        $data['ruang'] = Ruang::all();
        $data['kelas'] = kelas::all();

        return view('user.admin.master.admin-jadkul-create', $data);
    }

    public function viewAbsen($code)
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['prefix'] = $this->setPrefix();
        $data['kuri'] = Kurikulum::all();
        $data['taka'] = TahunAkademik::all();
        $data['dosen'] = Dosen::all();
        $data['pstudi'] = ProgramStudi::all();
        $data['absen'] = AbsensiMahasiswa::where('jadkul_code', $code)->get();
        $data['matkul'] = MataKuliah::all();
        $data['jadkul'] = JadwalKuliah::where('code', $code)->first();
        $data['ruang'] = Ruang::all();
        $data['kelas'] = kelas::all();
        
        return view('user.admin.master.admin-jadkul-view-absen', $data);
    }
    public function updateAbsen(Request $request,$code)
    {
        $absen = AbsensiMahasiswa::where('code', $code)->first();

        $absen->absen_desc = $request->absen_desc;
        $absen->save();

        Alert::success('success', 'Data telah berhasil diupdate');
        return back();
    }
    
    public function cetakAbsen(Request $request, $code)
    {

        // Dapatkan data absensi mahasiswa berdasarkan kode kelas yang dipilih 
        // $data['jadwal'] = JadwalKuliah::where('code', $code)->first();
        $data['web'] = webSettings::where('id', 1)->first();
        $data['jadkul'] = JadwalKuliah::where('code', $code)->first();
        $data['absen'] = AbsensiMahasiswa::whereHas('jadkul', function ($query) use ($request) {
            $query->whereHas('kelas', function ($q) use ($request) {
                $q->where('code', $request->kode_kelas);
            });
        })->where('jadkul_code', $code)->get();
    
        $data['student'] = Mahasiswa::whereHas('kelas', function ($q) use ($request){
            $q->where('code', $request->kode_kelas);
        })->get();

        // return view('base.cetak.cetak-data-absensi', $data);
        $pdf = PDF::loadView('base.cetak.cetak-data-absensi', $data);
       
        return $pdf->download('Daftar-Absen-'.$data['jadkul']->matkul->name.'-'.$data['jadkul']->pert_id.'-'.$request->kode_kelas.'.pdf');

    }

    public function store(Request $request)
    {
        $request->validate([
            'bsks' => 'required|string|max:255',
            'makul_id' => 'required',
            'kelas_id' => 'required',
            'dosen_id' => 'required',
            'ruang_id' => 'required',
            'pert_id' => 'required',
            'meth_id' => 'required',
            'days_id' => 'required',
            'start' => 'required',
            'ended' => 'required',
            'bsks' => 'required',
            'date' => 'required',
        ]);

        $jadkul = new JadwalKuliah;
        $jadkul->code = Str::random(6);
        $jadkul->bsks = $request->bsks;
        $jadkul->date = $request->date;
        $jadkul->start = $request->start;
        $jadkul->ended = $request->ended;
        $jadkul->days_id = $request->days_id;
        $jadkul->meth_id = $request->meth_id;
        $jadkul->pert_id = $request->pert_id;
        $jadkul->ruang_id = $request->ruang_id;
        $jadkul->dosen_id = $request->dosen_id;
        $jadkul->kelas_id = $request->kelas_id;
        $jadkul->makul_id = $request->makul_id;
        $jadkul->save();

        Alert::success('success', 'Data telah berhasil disimpan');
        return back();
    }

    public function update(Request $request, $code)
    {
        $request->validate([
            'bsks' => 'required|string|max:255',
            'makul_id' => 'required',
            'kelas_id' => 'required',
            'dosen_id' => 'required',
            'ruang_id' => 'required',
            'pert_id' => 'required',
            'meth_id' => 'required',
            'days_id' => 'required',
            'start' => 'required',
            'ended' => 'required',
            'bsks' => 'required',
            'date' => 'required',
        ]);

        $jadkul = JadwalKuliah::where('code', $code)->first();
        $jadkul->bsks = $request->bsks;
        $jadkul->date = $request->date;
        $jadkul->start = $request->start;
        $jadkul->ended = $request->ended;
        $jadkul->days_id = $request->days_id;
        $jadkul->meth_id = $request->meth_id;
        $jadkul->pert_id = $request->pert_id;
        $jadkul->ruang_id = $request->ruang_id;
        $jadkul->dosen_id = $request->dosen_id;
        $jadkul->kelas_id = $request->kelas_id;
        $jadkul->makul_id = $request->makul_id;
        $jadkul->save();

        Alert::success('success', 'Data telah berhasil diupdate');
        return back();
    }

    public function destroy(Request $request, $code)
    {

        $jadkul = JadwalKuliah::where('code', $code)->first();
        $jadkul->delete();

        Alert::success('success', 'Data telah berhasil dihapus');
        return back();
    }
}
