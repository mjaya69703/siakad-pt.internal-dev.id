<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Models
use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Pengaturan\WebSetting;
// Auth
use Illuminate\Support\Facades\Auth;
// Plugins
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function renderSignin()
    {
        $user = Auth::user() ?: Auth::guard('dosen')->user() ?: Auth::guard('mahasiswa')->user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Login";
        $data['pages'] = "Authentication";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;

        return view('central.auth.signin-content', $data, compact('user'));
    }

    public function handleSignin(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $login = $request->input('login');

        // ==== RATE LIMIT ====
        $maxAttempts = WebSetting::first()->max_login_attempts ?? 5;     // Maksimal percobaan
        $decaySeconds = WebSetting::first()->login_decay_seconds ?? 60;   // Waktu reset dalam detik
        $key = 'login:'.Str::lower($request->input('login')).'|'.$request->ip();

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);
            Alert::error('Terlalu banyak percobaan', "Coba lagi dalam {$seconds} detik.");
            return back()
                ->withErrors(['login' => "Terlalu banyak percobaan. Coba lagi dalam {$seconds} detik."])
                ->onlyInput('login');
        }

        // Check login input
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $checkUser = User::where($fieldType, $request->login)->first();
        $checkLecture= Dosen::where($fieldType, $request->login)->first();
        $checkStudent = Mahasiswa::where($fieldType, $request->login)->first();

        // Coba Login Sebagai User / Staff
        if($checkUser){
            // Coba untuk melakukan autentikasi menggunakan metode 'attempt' dari facade 'Auth'
            if (Auth::attempt(array($fieldType => $login, 'password' => $request->input('password'))) ) {
                // Jika autentikasi berhasil, pengguna akan dialihkan ke dashboard sesuai role
                if(Auth::user()->prefix == Auth::user()->prefix){

                    Alert::toast('Kamu telah berhasil login sebagai ' . Auth::user()->name, 'success');
                    return redirect()->route(Auth::user()->prefix . 'profile-render');
                }

            }else{
                RateLimiter::hit($key, $decaySeconds);
                Alert::error('Error', 'Mohon Maaf, Username / Email atau password salah');
                return back();
            }

        // Coba Login Sebagai Dosen
        }elseif($checkLecture) {
            if (Auth::guard('dosen')->attempt(array($fieldType => $login, 'password' => $request->input('password'))) ) {
                // Jika autentikasi berhasil, pengguna akan dialihkan ke dashboard
                if(Auth::guard('dosen')->user()->prefix == "dosen."){

                    Alert::toast('Kamu telah berhasil login sebagai ' . Auth::guard('dosen')->user()->name, 'success');
                    return redirect()->route(Auth::guard('dosen')->user()->prefix . 'profile-render');
                }
            }else{
                RateLimiter::hit($key, $decaySeconds);
                Alert::error('Error', 'Mohon Maaf, Username / Email atau password salah');
                return back();
            }

        // Coba Login Sebagai Mahasiswa
        }elseif($checkStudent) {
            if (Auth::guard('mahasiswa')->attempt(array($fieldType => $login, 'password' => $request->input('password'))) ) {
                // Jika autentikasi berhasil, pengguna akan dialihkan ke dashboard
                if(Auth::guard('mahasiswa')->user()->type == "Calon Mahasiswa"){
                    // echo "Kamu berhasil login sebagai " . Auth::guard('mahasiswa')->user()->name;

                    Alert::toast('Kamu telah berhasil login sebagai ' . Auth::guard('mahasiswa')->user()->name, 'success');
                    return redirect()->route(Auth::guard('mahasiswa')->user()->prefix . 'profile-render');
                } else if(Auth::guard('mahasiswa')->user()->type == "Mahasiswa Aktif"){
                    // echo "Kamu berhasil login sebagai " . Auth::guard('mahasiswa')->user()->name;

                    Alert::toast('Kamu telah berhasil login sebagai ' . Auth::guard('mahasiswa')->user()->name, 'success');
                    return redirect()->route(Auth::guard('mahasiswa')->user()->prefix . 'profile-render');
                }

            }else{
                RateLimiter::hit($key, $decaySeconds);
                Alert::error('Error', 'Mohon Maaf, Username / Email atau password salah');
                return back();
            }

        // Jika Akun Tidak Terdaftar
        }else {
            Alert::error('Error', 'Mohon Maaf, Akun anda tidak terdaftar pada system kami.');
            return back();
        }
    }

    public function handleLogout(Request $request) {
        if (Auth::check()) {

            Auth::logout();
            Alert::success('Berhasil!', 'Logout telah sukses!');
            return redirect()->route('auth.render-signin');
        } elseif (Auth::guard('dosen')->check()) {

            Auth::guard('dosen')->logout();
            Alert::success('Berhasil!', 'Logout telah sukses!');
            return redirect()->route('auth.render-signin');

        } elseif (Auth::guard('mahasiswa')->check()) {

            Auth::guard('mahasiswa')->logout();
            Alert::success('Berhasil!', 'Logout telah sukses!');
            return redirect()->route('auth.render-signin');

        } else {

            Alert::error('Gagal!', 'Logout gagal, Silahkan coba lagi!');
            return back();
        }
    }
}
