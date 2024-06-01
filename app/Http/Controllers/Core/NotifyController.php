<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// SECTION ADDONS SYSTEM
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Auth;
use Str;
// SECTION ADDONS EXTERNAL
use Alert;
// SECTION AUTH
use App\Models\Notification;

class NotifyController extends Controller
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
        $data['prefix'] = $this->setPrefix();

        $data['Notify'] = Notification::all();
        
        return view('user.admin.system.notify-index', $data);
    }

    public function store(Request $request)
    {
        $notify = new Notification;

        $request->validate([
            'send_to' => 'required|integer',
            'dept_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'faku_id' => 'nullable|integer',
            'prodi_id' => 'nullable|integer',
            'proku_id' => 'nullable|integer',
            'class_id' => 'nullable|integer',
            'student_id' => 'nullable|integer',
            'lecture_id' => 'nullable|integer',
            'name' => 'required|string',
            'type' => 'required|string',
            'desc' => 'required|string',
        ]);

        $notify->auth_id = Auth::user()->id;
        $notify->send_to = $request->send_to;
        $notify->dept_id = $request->dept_id;
        $notify->user_id = $request->user_id;
        $notify->faku_id = $request->faku_id;
        $notify->prodi_id = $request->prodi_id;
        $notify->proku_id = $request->proku_id;
        $notify->class_id = $request->class_id;
        $notify->student_id = $request->student_id;
        $notify->lecture_id = $request->lecture_id;
        $notify->name = $request->name;
        $notify->type = $request->type;
        $notify->code = Str::random(7);
        $notify->desc = $request->desc;
        $notify->save();

        Alert::success('Succcess', 'Data berhasil ditambahkan!');
        return back();

    }

    public function update(Request $request, $code)
    {
        $notify = Notification::where('code', $code)->first();

        $request->validate([
            'send_to' => 'required|integer',
            'dept_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'faku_id' => 'nullable|integer',
            'prodi_id' => 'nullable|integer',
            'proku_id' => 'nullable|integer',
            'class_id' => 'nullable|integer',
            'student_id' => 'nullable|integer',
            'lecture_id' => 'nullable|integer',
            'name' => 'required|string',
            'type' => 'required|string',
            'desc' => 'required|string',
        ]);

        $notify->auth_id = Auth::user()->id;
        $notify->send_to = $request->send_to;
        $notify->dept_id = $request->dept_id;
        $notify->user_id = $request->user_id;
        $notify->faku_id = $request->faku_id;
        $notify->prodi_id = $request->prodi_id;
        $notify->proku_id = $request->proku_id;
        $notify->class_id = $request->class_id;
        $notify->student_id = $request->student_id;
        $notify->lecture_id = $request->lecture_id;
        $notify->name = $request->name;
        $notify->type = $request->type;
        $notify->code = Str::random(7);
        $notify->desc = $request->desc;
        $notify->save();

        Alert::success('Succcess', 'Data berhasil diupdate!');
        return back();

    }

    public function destroy($code)
    {
        $notify = Notification::where('code', $code)->first();
        $notify->delete();
        
        Alert::success('Succcess', 'Data berhasil dihapus!');
        return back();
    }

}
