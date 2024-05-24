<?php

namespace App\Http\Controllers\Mahasiswa\Pages;

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
use App\Models\TicketSupport;

class SupportController extends Controller
{
    public function index()
    {
        $userId = Auth::guard('mahasiswa')->user()->id;
        $data['ticket'] = TicketSupport::whereNotNull('code')->where('users_id', $userId)->latest()->get();

        return view('mahasiswa.pages.support-ticket-index', $data);
    }

    public function open()
    {
        $userId = Auth::guard('mahasiswa')->user()->id;
        $data['ticket'] = TicketSupport::whereNotNull('code')->where('users_id', $userId)->get();

        return view('mahasiswa.pages.support-ticket-open', $data);
    }

    public function create(Request $request, $dept)
    {
        $data['dept'] = $request->dept;

        // dd($request->dept);
        return view('mahasiswa.pages.support-ticket-create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'dept_id' => 'required|integer',
            'prio_id' => 'required|integer',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $ticket = new TicketSupport;
        $ticket->code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $ticket->core = Str::random(6);
        $ticket->prio_id = $request->prio_id;
        $ticket->dept_id = $request->dept_id;
        $ticket->sent_to = $request->dept_id;
        $ticket->users_id = Auth::guard('mahasiswa')->user()->id;
        $ticket->subject = $request->subject;
        $ticket->message = $request->message;
        $ticket->save();

        Alert::success('Berhasil', 'Ticket telah berhasil dibuat!');
        return redirect()->route('mahasiswa.support.ticket-index');
    }
}
