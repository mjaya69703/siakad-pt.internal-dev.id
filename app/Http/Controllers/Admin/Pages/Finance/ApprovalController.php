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
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// SECTION MODELS
use App\Models\uAttendance;

class ApprovalController extends Controller
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

    public function indexAbsen()
    {
        $data['prefix'] = $this->setPrefix();
        $data['absen'] = uAttendance::where('absen_approve', 1)->latest()->get();

        return view('user.finance.pages.approval-absen-index', $data);
    }
    public function indexAbsenApproved()
    {
        $data['prefix'] = $this->setPrefix();
        $data['absen'] = uAttendance::where('absen_approve', 2)->latest()->get();

        return view('user.finance.pages.approval-absen-index', $data);
    }
    public function indexAbsenRejected()
    {
        $data['prefix'] = $this->setPrefix();
        $data['absen'] = uAttendance::where('absen_approve', 3)->latest()->get();

        return view('user.finance.pages.approval-absen-index', $data);
    }

    public function updateAbsenAccept(Request $request, $code)
    {
        $absen = uAttendance::where('absen_code', $code)->first();
        $absen->absen_approve = 2;
        $absen->save();

        Alert::success('success', 'Absensi Berhasil Disetujui.');
        return back();
    }
    public function updateAbsenReject(Request $request, $code)
    {
        $absen = uAttendance::where('absen_code', $code)->first();
        $absen->absen_approve = 3;
        $absen->save();

        Alert::success('success', 'Absensi Berhasil Disetujui.');
        return back();
    }
}
