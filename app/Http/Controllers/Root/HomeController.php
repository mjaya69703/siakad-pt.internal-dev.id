<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// SECTION ADDONS SYSTEM
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Auth;
use Hash;
use Str;
// SECTION ADDONS EXTERNAL
use Alert;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// SECTION MODELS
use App\Models\Fakultas;
use App\Models\newsPost;
use App\Models\newsCategory;
use App\Models\KotakSaran;
use App\Models\ProgramStudi;

class HomeController extends Controller
{
    private function setPrefix()
    {
        if(Auth::user()){

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
    }


    public function index()
    {
        $data['fakultas'] = Fakultas::all();
        $data['posts'] = newsPost::latest()->paginate(7);
        $data['prefix'] = $this->setPrefix();
        $data['title'] = " - ESEC Academy";
        $data['menu'] = "Halaman Utama";
        return view('root.root-index', $data);
    }

    public function postView($slug)
    {
        $data['fakultas'] = Fakultas::all();
        $data['post'] = newsPost::where('slug', $slug)->first();
        $data['posts'] = newsPost::latest()->paginate(7);
        $data['prefix'] = $this->setPrefix();
        $data['title'] = " - ESEC Academy";
        $data['menu'] = "Lihat Postingan " . $data['post']->name;
        return view('root.pages.news-view', $data);
    }
    

    public function adviceIndex()
    {
        $data['fakultas'] = Fakultas::all();
        $data['title'] = " - ESEC Academy";
        $data['menu'] = "Kotak Saran";
        $data['prefix'] = $this->setPrefix();
        return view('root.pages.advice-index', $data);
    }
    public function prodiIndex($slug)
    {
        $data['fakultas'] = Fakultas::all();
        $data['pstudi'] = ProgramStudi::where('slug', $slug)->first();
        $data['title'] = " - ESEC Academy";
        $data['menu'] = "Program Studi ". $data['pstudi']->name;
        $data['prefix'] = $this->setPrefix();
        return view('root.pages.prodi-index', $data);
    }
    public function adviceStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'desc' => 'required',
        ]);

        $saran = new KotakSaran;
        $saran->name = $request->name;
        $saran->email = $request->email;
        $saran->subject = $request->subject;
        $saran->desc = $request->desc;
        if($saran->save()){
            Mail::send('base.resource.mail-kotak-saran-admin', ['saran' => $saran], function($message) use ($saran) {
                $message->to([
                    'jaya.kusuma@internal-dev.id',
                    'mjaya69703@gmail.com'
                ]);
                $message->subject('[ SARAN ] - ESEC Academy - ' . $saran->subject);
                $message->from('admin@internal-dev.id', 'SIAKAD PT by Internal-Dev');
            });

            Alert::success('Sukses', 'Terima kasih telah mengirimkan Saran ^_^');
            return back();
        } else {
            Alert::error('Error', 'Email tidak berhasil dikirim.');
            return back();
        }

    }
}
