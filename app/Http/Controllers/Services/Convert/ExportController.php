<?php

namespace App\Http\Controllers\Services\Convert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// SECTION ADDONS SYSTEM
use Illuminate\Support\Facades\File;
use Auth;
use Hash;
use Str;
use Carbon\Carbon;
// SECTION ADDONS EXTERNAL
use Alert;
use Rap2hpoutre\FastExcel\FastExcel;
// SECTION MODELS
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class ExportController extends Controller
{
    public function exportUsers()
    {
        $users = User::all();

        (new FastExcel($users))->export('export-users-'.uniqid().'.csv', function ($user) {
            return [
                'Username' => $user->user,
                'Email' => $user->email,
                'Phone' => $user->phone,
                'FullName' => $user->name,
                'Gender' => $user->gend,
                'Religion' => $user->raw_reli,
                'BirthPlace' => $user->birth_place,
                'BirthDate' => $user->birth_date,
                'TypeUser' => $user->raw_type,
                'Status' => $user->status,
            ];
        });

        return (new FastExcel($users))->download('export-users-'.uniqid().'.csv');

    }

    public function exportStudent()
    {
        $users = Mahasiswa::all();

        (new FastExcel($users))->export('export-student-'.uniqid().'.csv', function ($user) {
            return [
                'NIM' => $user->mhs_nim,
                'Email' => $user->mhs_mail,
                'Phone' => $user->mhs_phone,
                'FullName' => $user->mhs_name,
                'Gender' => $user->mhs_gend,
                'Religion' => $user->raw_mhs_reli,
                'BirthPlace' => $user->mhs_birthplace,
                'BirthDate' => $user->mhs_birthdate,
                'TypeUser' => $user->raw_mhs_stat,
                'YearsID' => $user->years_id,
                'ClassID' => $user->class_id,
            ];
        });

        return (new FastExcel($users))->download('export-student-'.uniqid().'.csv');

    }
}
