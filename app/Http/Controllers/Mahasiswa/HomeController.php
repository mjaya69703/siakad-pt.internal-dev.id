<?php

namespace App\Http\Controllers\Mahasiswa;

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
use App\Models\ProgramStudi;
use App\Models\MataKuliah;
use App\Models\Kurikulum;
use App\Models\Dosen;
use App\Models\TahunAkademik;
use App\Models\JadwalKuliah;
use App\Models\Ruang;
use App\Models\Kelas;
use App\Models\AbsensiMahasiswa;

class HomeController extends Controller
{
    public function index(){


        return view('mahasiswa.home-index');

    }
    public function profile(){


        return view('mahasiswa.home-profile');

    }

    public function jadkulIndex()
    {
        $data['kuri'] = Kurikulum::all();
        $data['taka'] = TahunAkademik::all();
        // $data['dosen'] = MataKuliah::where('dosen');
        $data['pstudi'] = ProgramStudi::all();
        $data['matkul'] = MataKuliah::all();
        $data['jadkul'] = JadwalKuliah::where('kelas_id', Auth::guard('mahasiswa')->user()->class_id)->get();
        $data['ruang'] = Ruang::all();
        $data['kelas'] = Kelas::all();


        return view('mahasiswa.pages.mhs-jadkul-index', $data);
    }
    public function jadkulAbsen($code)
    {
        $date = \Carbon\Carbon::now()->format('Y-m-d');
        $checkAbsen = AbsensiMahasiswa::where('jadkul_code', $code)->where('author_id', Auth::guard('mahasiswa')->user()->id)->count();
        $checkDate = JadwalKuliah::where('code', $code)->where('date', $date)->count();
        
        // dd($timeStart);
        if($checkAbsen === 0){
            if($checkDate !== 0){

                $data['kuri'] = Kurikulum::all();
                $data['taka'] = TahunAkademik::all();
                // $data['dosen'] = MataKuliah::where('dosen');
                $data['pstudi'] = ProgramStudi::all();
                $data['matkul'] = MataKuliah::all();
                $data['jadkul'] = JadwalKuliah::where('code', $code)->first();
                $data['ruang'] = Ruang::all();
                $data['kelas'] = Kelas::all();
    
                // dd($data['jadkul']);
    
                return view('mahasiswa.pages.mhs-jadkul-absen', $data);
            } else {

                Alert::error('Error', 'Kamu belum bisa absen pada saat ini.');
                return back();
            }
        } else {
            Alert::error('Error', 'Kamu sudah absen untuk matakuliah ini.');
            return back();
        }
    }

    public function jadkulAbsenStore(Request $request)
    {
        $request->validate([
            'absen_proof' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'absen_type' => 'required|string',
        ]);
    
        $timeStart = \Carbon\Carbon::now()->format('H:i:s');
        $checkStart = JadwalKuliah::where('code', $request->jadkul_code)->first();


        $absen = new AbsensiMahasiswa;
    
        if ($request->hasFile('absen_proof')) {
            $image = $request->file('absen_proof');
            $name = 'profile-'. $request->jadkul_code. '-' . $request->absen_date . '-' . $request->author_id .'-' .uniqid().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/images/profile/absen/');
            $destinationPaths = storage_path('app/public/images');
    
            // Compress image
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());
            // $image->resize(width: 250);
            $image->scaleDown(height: 300);
            $image->toPng()->save($destinationPath.'/'.$name);
    
            if ($absen->absen_proof != 'default/default-profile.jpg') {
                File::delete($destinationPaths.'/'.$absen->absen_proof); // hapus gambar lama
            }
            $absen->absen_proof = "profile/absen/".$name;
            $absen->author_id = $request->author_id;
            $absen->jadkul_code = $request->jadkul_code;
            $absen->absen_date = $request->absen_date;
            $absen->absen_time = $request->absen_time;
            $absen->absen_type = $request->absen_type;
            $absen->code = uniqid();
            if ($timeStart >= $checkStart->ended) {
                // Jika waktu saat ini sudah melewati waktu selesai perkuliahan
                Alert::error('Error', 'Waktu perkuliahan telah selesai. Anda sudah tidak bisa absen hari ini.');
                return back();
            } elseif ($timeStart >= $checkStart->start) {
                // Jika waktu saat ini sudah sama atau setelah waktu mulai perkuliahan
                $absen->save();
            } else {
                // Jika waktu saat ini masih sebelum waktu mulai perkuliahan
                Alert::error('Error', 'Waktu absen belum dimulai. Silahkan coba kembali nanti.');
                return back();
            }
    
            Alert::success('Success', 'Kamu telah berhasil absen pada matakuliah ini');
            return redirect()->route('mahasiswa.home-jadkul-index');
        }

    }

    public function saveImageProfile(Request $request)
    {
        $request->validate([
            'mhs_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);
    
        $user = Auth::guard('mahasiswa')->user();
    
        if ($request->hasFile('mhs_image')) {
            $image = $request->file('mhs_image');
            $name = 'profile-'. $user->mhs_code.'-' .uniqid().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/images/profile');
            $destinationPaths = storage_path('app/public/images');
    
            // Compress image
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());
            // $image->resize(width: 250);
            $image->scaleDown(height: 300);
            $image->toPng()->save($destinationPath.'/'.$name);
    
            if ($user->mhs_image != 'default/default-profile.jpg') {
                File::delete($destinationPaths.'/'.$user->mhs_image); // hapus gambar lama
            }
            $user->mhs_image = "profile/".$name;
            $user->save();
    
            Alert::success('Success', 'Data berhasil diupdate');
            return redirect()->route('mahasiswa.home-profile');
        }
    }
    // public function saveImageProfile(Request $request){
    //     $request->validate([
    //         'mhs_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $user = Auth::guard('mahasiswa')->user();

    //     if ($request->hasFile('mhs_image')) {
    //         $image = $request->file('mhs_image');
    //         $name = 'profile-'. $user->mhs_code.'-' .uniqid().'.'.$image->getClientOriginalExtension();
    //         $destinationPath = storage_path('app/public/images/profile');
    //         $destinationPaths = storage_path('app/public/images');
    //         $image->move($destinationPath, $name);
    //         if ($user->mhs_image != 'default/default-profile.jpg') {
    //             File::delete($destinationPaths.'/'.$user->mhs_image); // hapus gambar lama
    //         }
    //         $user->mhs_image = "profile/".$name;
    //         $user->save();

    //         // dd($user->image);

    //         Alert::success('Success', 'Data berhasil diupdate');
    //         return redirect()->route('mahasiswa.home-profile');
    //     }

    // }

    public function saveDataProfile(Request $request){

        $request->validate([
            'mhs_name' => 'required|string|max:255',
            'mhs_nim' => 'required|string|max:255|unique:users,user,' . Auth::guard('mahasiswa')->user()->id,
            'mhs_birthplace' => 'required|string|max:255', // New field
            'mhs_birthdate' => 'required|date', // New field
        ]);
        $user = Auth::guard('mahasiswa')->user();

        $user->mhs_name = $request->mhs_name;
        $user->mhs_nim = $request->mhs_nim;
        $user->mhs_reli = $request->mhs_reli;
        $user->mhs_gend = $request->mhs_gend;
        $user->mhs_birthplace = $request->mhs_birthplace; // New field
        $user->mhs_birthdate = $request->mhs_birthdate; // New field


        $user->save();

        Alert::success('Success', 'Data berhasil diupdate');
        return back();
    }

    public function saveDataKontak(Request $request){

        $request->validate([
            'mhs_phone' => 'required|numeric|unique:users,phone,' . Auth::guard('mahasiswa')->user()->id,
            'mhs_mail' => 'required|email|max:255|unique:users,email,' . Auth::guard('mahasiswa')->user()->id,
            'mhs_parent_father' => 'nullable|string|max:255',
            'mhs_parent_mother' => 'nullable|string|max:255',
            'mhs_parent_father_phone' => 'nullable|string|max:14',
            'mhs_parent_mother_phone' => 'nullable|string|max:14',
            'mhs_parent_wali_name' => 'string|max:14',
            'mhs_parent_wali_phone' => 'string|max:14',
            'mhs_addr_domisili' => 'nullable|string|max:4192',
            'mhs_addr_kelurahan' => 'nullable|string|max:255',
            'mhs_addr_kecamatan' => 'nullable|string|max:255',
            'mhs_addr_kota' => 'nullable|string|max:255',
            'mhs_addr_provinsi' => 'nullable|string|max:255',
        ]);
        $user = Auth::guard('mahasiswa')->user();

        $user->mhs_phone = $request->mhs_phone;
        $user->mhs_mail = $request->mhs_mail;
        $user->mhs_parent_father = $request->mhs_parent_father;
        $user->mhs_parent_father_phone = $request->mhs_parent_father_phone;
        $user->mhs_parent_mother = $request->mhs_parent_mother;
        $user->mhs_parent_mother_phone = $request->mhs_parent_mother_phone;
        $user->mhs_wali_name = $request->mhs_wali_name;
        $user->mhs_wali_phone = $request->mhs_wali_phone;
        $user->mhs_addr_domisili = $request->mhs_addr_domisili;
        $user->mhs_addr_kelurahan = $request->mhs_addr_kelurahan;
        $user->mhs_addr_kecamatan = $request->mhs_addr_kecamatan;
        $user->mhs_addr_kota = $request->mhs_addr_kota;
        $user->mhs_addr_provinsi = $request->mhs_addr_provinsi;


        $user->save();

        Alert::success('Success', 'Data berhasil diupdate');
        return back();
    }

    public function saveDataPassword(Request $request)
    {
        // Validate the request...
        $request->validate([
            'old_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'same:new_password_confirmed'],
        ]);

        $user = Auth::guard('mahasiswa')->user();

        // Check if the old password is correct
        if (!Hash::check($request->old_password, $user->password)) {
            Alert::error('Error', 'Password lama yang diberikan tidak cocok dengan catatan kami.');
            return back();
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        Alert::success('Success', 'Password berhasil diubah!');
        return back();
    }
}
