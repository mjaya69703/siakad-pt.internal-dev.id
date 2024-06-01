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
use App\Models\TicketSupport;

class TicketSupportController extends Controller
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
        $userId = Auth::user()->raw_type;

        // dd($userId);
        if($userId === 0){

            $data['ticket'] = TicketSupport::whereNotNull('code')->latest()->get();
        }else{

            $data['ticket'] = TicketSupport::whereNotNull('code')->where('dept_id', $userId)->latest()->get();
        }
        $data['prefix'] = $this->setPrefix();

        return view('user.finance.pages.support-ticket-index', $data);
    }

    public function view(Request $request, $code)
    {
        $data['ticket'] = TicketSupport::where('code', $code)->first();
        $data['support'] = TicketSupport::where('codr', $code)->latest()->get();
        $data['prefix'] = $this->setPrefix();
        
        
        // dd($checkStatus);
        $checkStatus = TicketSupport::where('code', $code)->first();
        if($checkStatus->raw_stat_id === 2){
            Alert::error('error', 'Ticket Sudah diClose');
            return back();
        } else {

            return view('user.finance.pages.support-ticket-view', $data);
        }

    }

    public function storeReply(Request $request, $code)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        // UPDATE TICKET
        $ticket = TicketSupport::where('code', $code)->first();
        $ticket->stat_id = $request->stat_id;
        $ticket->updated_at = now();
        $ticket->save();

        $rticket = new TicketSupport;
        $rticket->codr = $code;
        $rticket->core = Str::random(6);
        $rticket->prio_id = $ticket->raw_prio_id;
        $rticket->dept_id = $ticket->raw_dept_id;
        $rticket->sent_to = $ticket->raw_dept_id;
        $rticket->admin_id = Auth::user()->id;
        $rticket->subject = $request->subject;
        $rticket->message = $request->message;
        $rticket->save();



        Alert::success('Berhasil', 'Ticket telah berhasil dibuat!');
        return back();
    }
}
