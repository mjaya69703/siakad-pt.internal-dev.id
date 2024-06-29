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
use App\Models\Settings\webSettings;

class SupportController extends Controller
{
    public function index()
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $userId = Auth::guard('mahasiswa')->user()->id;
        $data['ticket'] = TicketSupport::whereNotNull('code')->where('users_id', $userId)->latest()->get();

        return view('mahasiswa.pages.support-ticket-index', $data);
    }

    public function open()
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $userId = Auth::guard('mahasiswa')->user()->id;
        $data['ticket'] = TicketSupport::whereNotNull('code')->where('users_id', $userId)->get();

        return view('mahasiswa.pages.support-ticket-open', $data);
    }

    public function create(Request $request, $dept)
    {
        $data['dept'] = $request->dept;
        $data['web'] = webSettings::where('id', 1)->first();
        // dd($request->dept);
        return view('mahasiswa.pages.support-ticket-create', $data);
    }
    public function view(Request $request, $code)
    {
        $data['ticket'] = TicketSupport::where('code', $code)->first();
        $initialSupport = TicketSupport::where('codr', $code)->latest()->get();
        $data['support'] = $initialSupport;
        $data['web'] = webSettings::where('id', 1)->first();
        
        $checkStatus = TicketSupport::where('code', $code)->first();
        if($checkStatus->raw_stat_id === 2){
            Alert::error('Error', 'Ticket Sudah diClose');
            return back();
        } else {

            return view('mahasiswa.pages.support-ticket-view', $data);
        }
    }

    public function AjaxLastReply($code)
    {
        $latestSupport = TicketSupport::where('codr', $code)->latest()->get();
        $newData = array_diff_assoc($latestSupport->toArray(), $this->support->toArray()); // Efficient data comparison

        // Check for any changes
        if (!empty($newData)) {
            $this->support = $latestSupport; // Update controller's cached support data
            return response()->json($latestSupport);
        } else {
            return response()->json(null); // No changes, send empty response to avoid unnecessary updates
        }
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

    public function storeReply(Request $request, $code)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        // UPDATE TICKET
        $ticket = TicketSupport::where('code', $code)->first();
        $ticket->stat_id = 4;
        $ticket->updated_at = now();
        $ticket->save();

        $rticket = new TicketSupport;
        $rticket->codr = $code;
        $rticket->core = Str::random(6);
        $rticket->prio_id = $ticket->raw_prio_id;
        $rticket->dept_id = $ticket->raw_dept_id;
        $rticket->sent_to = $ticket->raw_dept_id;
        $rticket->users_id = Auth::guard('mahasiswa')->user()->id;
        $rticket->subject = $request->subject;
        $rticket->message = $request->message;
        $rticket->save();



        Alert::success('Berhasil', 'Ticket telah berhasil dibuat!');
        return back();
    }


}
