<?php

namespace App\Http\Controllers\Services\Convert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// SECTION ADDONS SYSTEM
use Illuminate\Support\Facades\File;
use Auth;
use Hash;
use Str;
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

        (new FastExcel($users))->export('users.csv', function ($user) {
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

        return (new FastExcel($users))->download('file.csv');

    }
}
