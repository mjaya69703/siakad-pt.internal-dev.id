<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// UNTUK PLUGIN TAMBAHAN
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Alert;
use Auth;
use Hash;
use App\Models\uAttendance;
use Carbon\Carbon;

class PresensiController extends Controller
{
    private function setPrefix()
    {
        $rawType = Auth::user()->raw_type;
        switch ($rawType) {
            case 1:
                return 'finance.';
            case 2:
                return 'officer.';
            case 3:
                return 'academic.';
            case 4:
                return 'admin.';
            case 5:
                return 'support.';
            default:
                return 'web-admin.';
        }
    }

    public function index()
    {

        $data['userid'] = Auth::user()->id;
        $data['today'] = date('Y-m-d');
        $data['hadir'] = uAttendance::where('absen_user_id', $data['userid'])->whereIn('absen_type', [0,1,4,5])->get();
        $data['izin'] = uAttendance::where('absen_user_id', $data['userid'])->whereIn('absen_type', [2,3,6,7])->get();
        $data['sakit'] = uAttendance::where('absen_user_id', $data['userid'])->whereIn('absen_type', [2])->get();
        // Filter data untuk terlambat (waktu masuk lebih dari jam 8 pagi)
        $data['terlambat'] = uAttendance::where('absen_user_id', $data['userid'])
        ->whereIn('absen_type', [0,1,5])
        ->whereTime('absen_time_in', '>', '08:00:00')
        ->get();
        // Check Data Absen Hari Ini
        $data['absen'] = UAttendance::where('absen_user_id', $data['userid'])
        ->where('absen_date', $data['today'])
        ->first();
        $data['prefix'] = $this->setPrefix();


        // dd($data['absen']);

        if($data['absen']){

            return view('user.home-presensi-update', $data);
        } else {
            return view('user.home-presensi-index', $data);

        }

    }
    public function presensiList()
    {

        $data['userid'] = Auth::user()->id;
        $data['today'] = date('Y-m-d');
        $data['absen'] = uAttendance::where('absen_user_id', $data['userid'])->whereIn('absen_type', [0,1,4,5])->get();
        $data['prefix'] = $this->setPrefix();

        $data['hadir'] = uAttendance::where('absen_user_id', $data['userid'])->whereIn('absen_type', [0,1,4,5])->get();
        $data['izin'] = uAttendance::where('absen_user_id', $data['userid'])->whereIn('absen_type', [2,3,6,7])->get();
        $data['sakit'] = uAttendance::where('absen_user_id', $data['userid'])->whereIn('absen_type', [2])->get();
        // Filter data untuk terlambat (waktu masuk lebih dari jam 8 pagi)
        $data['terlambat'] = uAttendance::where('absen_user_id', $data['userid'])
        ->whereIn('absen_type', [0,1,5])
        ->whereTime('absen_time_in', '>', '08:00:00')
        ->get();


        return view('user.home-presensi-view', $data);


    }
    public function presensiView($date)
    {

        $data['userid'] = Auth::user()->id;
        $data['today'] = date('Y-m-d');
        $data['hadir'] = uAttendance::where('absen_user_id', $data['userid'])->whereIn('absen_type', [0,1,4,5])->get();
        $data['izin'] = uAttendance::where('absen_user_id', $data['userid'])->whereIn('absen_type', [2,3,6,7])->get();
        $data['sakit'] = uAttendance::where('absen_user_id', $data['userid'])->whereIn('absen_type', [2])->get();
        // Filter data untuk terlambat (waktu masuk lebih dari jam 8 pagi)
        $data['terlambat'] = uAttendance::where('absen_user_id', $data['userid'])
        ->whereIn('absen_type', [0,1,5])
        ->whereTime('absen_time_in', '>', '08:00:00')
        ->get();
        // Check Data Absen Hari Ini
        $data['absen'] = UAttendance::where('absen_user_id', $data['userid'])
        ->where('absen_date', $date)
        ->first();


        // dd($data['absen']);

        if($data['absen']){

            return view('user.home-presensi-update', $data);
        } else {

            Alert::error('Kamu belum absen pada tanggal ini !');
            return back();
            // return view('user.home-presensi-index', $data);

        }


    }

    public function absenPulang(Request $request)
    {
        $absen = uAttendance::where('absen_user_id', $request->absen_user_id)->where('absen_date', $request->absen_date)->first();

        $absen->absen_time_out = $request->absen_time_out;
        $absen->absen_desc = $request->absen_desc;
        $absen->update();

        Alert::success('Success', 'Data berhasil diupdate');
        return back();
    }
}
