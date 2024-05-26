<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// SECTION ADDONS SYSTEM
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Coderflex\LaravelTurnstile\Rules\TurnstileCheck;
use Coderflex\LaravelTurnstile\Facades\LaravelTurnstile;
use Auth;
use Str;
// SECTION ADDONS EXTERNAL
use Alert;
// SECTION AUTH
use App\Models\Mahasiswa;

class AuthController extends Controller
{
    public function AuthSignInPage()
    {
        if(Auth::guard('dosen')->check()){
            Alert::info('info', 'Saat ini kamu telah login sebagai ' . Auth::guard('dosen')->user()->dsn_name);
            return redirect()->route('dosen.home-index');
        }
        if(Auth::guard('mahasiswa')->check()){
            Alert::info('Informasi', 'Saat ini kamu telah login sebagai ' . Auth::guard('mahasiswa')->user()->dsn_name);
            return redirect()->route('mahasiswa.home-index');
        }

        $data['title'] = "ESEC PPDB - ESchool Ecosystem";
        $data['menu'] = "Halaman Login Admin";
        $data['submenu'] = "SignIn to continue";
        $data['subdesc'] = "Gunakan id unique anda untuk login...";

        return view('base.auth.auth-mhs-signin', $data);

    }

    public function AuthSignInPost(Request $request){

        $request->validate([
            'login' => 'required',
            'password' => 'required',
            'cf-turnstile-response' => ['required', new TurnstileCheck()],
        ]);

        // Ambil input 'login' dari request
        $login = $request->input('login');

        // Cek apakah input 'login' adalah email atau username
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'mhs_mail' : 'mhs_nim';

        // Jika input 'login' adalah nomor dengan 10 digit, maka kita asumsikan itu adalah nomor telepon
        if(preg_match('/^[0-9]{10,13}$/', $login)) {
            $fieldType = 'mhs_phone';
        }

        $user = Mahasiswa::where($fieldType, $request->login)->first();


        if(!$user){
            Alert::error('Error', 'Mohon maaf akun anda belum terdaftar');
            return back();
        }

        $remember_me = $request->has('remember_me') ? true : false;

        // Coba untuk melakukan autentikasi menggunakan metode 'attempt' dari facade 'Auth'
        if (Auth::guard('mahasiswa')->attempt(array($fieldType => $login, 'password' => $request->input('password')), $remember_me) ) {
            // Jika autentikasi berhasil, pengguna akan dialihkan ke dashboard
            if($user->rawtype == 0){
                Alert::success('Success', 'Anda berhasil login Sebagai Calon Mahasiswa');
                // return redirect()->route('web-admin.dashboard-page');
                return redirect()->route('mahasiswa.home-index');
                // echo "Anda login sebagai admin.";
            }elseif($user->rawtype == 1){
                return redirect()->route('web-admin.home-index');
                Alert::success('Success', 'Anda berhasil login');
                // return back();
            }
        }else{
            Alert::error('Error', 'Mohon Maaf, Username / Email atau password salah');
            return back();
        }
    }

    public function AuthForgotPage()
    {
        $data['title'] = "ESEC PPDB - ESchool Ecosystem";
        $data['menu'] = "Halaman Login Admin";
        $data['submenu'] = "SignIn to continue";
        $data['subdesc'] = "Gunakan id unique anda untuk login...";

        return view('base.auth.auth-mhs-forgot', $data);

    }

    public function AuthForgotVerify(Request $request){
        $request->validate([
            'email' => 'required|email|exists:mahasiswas,mhs_mail', // validasi email dan cek apakah email ada di tabel users
        ]);

        $user = Mahasiswa::where('mhs_mail', $request->email)->first();
        $user->verify_token = Str::random(40);
        $user->token_created_at = now();

        if ($user->save()) {
            Mail::send('base.resource.mail-mhs-forgot-temp', ['user' => $user], function($message) use ($user) {
                $message->to($user->mhs_mail);
                $message->subject('Reset Password for ' . $user->mhs_name);
                $message->from('admin@internal-dev.id', 'SIAKAD PT by Internal-Dev');
                // $message->embedData(file_get_contents(public_path('/storage/images/default/logo.svg')), 'logo.svg', 'image/svg+xml');
            });

            Alert::success('Success', 'Email berhasil dikirim.');
            return back();
            // return redirect()->route('root.root-main-index');
        } else {
            Alert::error('Error', 'Email tidak terdaftar');
            return back();
        }
    }

    public function AuthResetPage($token){
        $data['title'] = 'ARPotRet';
        $data['menu'] = 'Beranda';
        $data['submenu'] = 'Reset Password';
        $data['subdesc'] = 'Halaman untuk mereset Password pengguna';
        // $data['web'] = WebSetting::all()->first();
        $data['user'] = Mahasiswa::where('verify_token', $token)->first();
        $data['token'] = $token;

        return view('base.auth.auth-mhs-reset', $data);

    }

    public function AuthResetPassword(Request $request, $token) {

        $request->validate([
            'password' => 'required|same:password_confirm|min:6',
        ]);

        $user = Mahasiswa::where('verify_token', $token)->first();

        if ($user && \Carbon\Carbon::parse($user->token_created_at)->diffInHours() < 1) {
            $user->verify_token = Str::random(40);
            $user->password = Hash::make($request->password);
            $user->save();

            Alert::success('Success', 'Password berhasil direset');
            return redirect()->route('mahasiswa.auth-signin-page');
            // return back();

        } else {
            Alert::error('Error', 'Token verifikasi tidak valid atau telah kedaluwarsa');
            return back();
        }
    }

    public function AuthSignOutPost(Request $request){
        Auth::guard('mahasiswa')->logout();

        Alert::success('Success', 'Anda berhasil logout');
        return redirect()->route('mahasiswa.auth-signin-page');
    }
}
