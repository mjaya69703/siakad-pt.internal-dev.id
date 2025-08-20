<?php

namespace App\Http\Controllers\Pendaftar;

use App\Http\Controllers\Controller;
use App\Models\PendaftarUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftarAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:pendaftar')->except('logout');
    }

    public function showLoginForm()
    {
        $data['webs'] = \App\Models\Pengaturan\WebSetting::first();
        $data['menus'] = "Login";
        $data['pages'] = "Authentication";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['user'] = null; // Set user as null for guest pages
        $data['activePendaftarTab'] = true; // Flag to activate pendaftar tab

        return view('central.auth.signin-content', $data);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('pendaftar')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            Alert::success('Berhasil!', 'Selamat datang ' . Auth::guard('pendaftar')->user()->name);
            return redirect()->intended(route('pendaftar.dashboard'));
        }

        Alert::error('Gagal!', 'Email atau password salah.');
        return back()->withInput($request->only('email'));
    }

    public function showRegisterForm()
    {
        $data['webs'] = \App\Models\Pengaturan\WebSetting::first();
        $data['menus'] = "Register";
        $data['pages'] = "Authentication";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['user'] = null; // Set user as null for guest pages

        return view('central.auth.pendaftar-register', $data);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pendaftar_users,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted',
        ], [
            'name.required' => 'Nama lengkap harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'phone.required' => 'Nomor HP harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'terms.required' => 'Anda harus menyetujui syarat dan ketentuan',
        ]);

        try {
            $pendaftarUser = PendaftarUser::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'status' => 'active',
                'email_verified_at' => now(),
            ]);

            Alert::success('Berhasil!', 'Akun berhasil dibuat. Silahkan login untuk melanjutkan.');
            return redirect()->route('auth.render-signin');

        } catch (\Exception $e) {
            Alert::error('Gagal!', 'Terjadi kesalahan saat membuat akun. Silahkan coba lagi.');
            return back()->withInput();
        }
    }

    public function showForgotPasswordForm()
    {
        $data['webs'] = \App\Models\Pengaturan\WebSetting::first();
        $data['menus'] = "Forgot Password";
        $data['pages'] = "Authentication";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['user'] = null; // Set user as null for guest pages

        return view('central.auth.pendaftar-forgot-password', $data);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:pendaftar_users,email',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.exists' => 'Email tidak terdaftar',
        ]);

        $status = Password::broker('pendaftar_users')->sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            Alert::success('Berhasil!', 'Link reset password telah dikirim ke email Anda.');
            return back();
        }

        Alert::error('Gagal!', 'Gagal mengirim link reset password.');
        return back()->withErrors(['email' => __($status)]);
    }

    public function showResetPasswordForm(Request $request, $token = null)
    {
        $data['webs'] = \App\Models\Pengaturan\WebSetting::first();
        $data['menus'] = "Reset Password";
        $data['pages'] = "Authentication";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['token'] = $token;
        $data['email'] = $request->email;
        $data['user'] = null; // Set user as null for guest pages

        return view('central.auth.pendaftar-reset-password', $data);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::broker('pendaftar_users')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            Alert::success('Berhasil!', 'Password berhasil direset. Silahkan login dengan password baru.');
            return redirect()->route('auth.render-signin');
        }

        Alert::error('Gagal!', 'Gagal reset password.');
        return back()->withErrors(['email' => [__($status)]]);
    }

    public function logout(Request $request)
    {
        Auth::guard('pendaftar')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        Alert::success('Berhasil!', 'Logout berhasil.');
        return redirect()->route('auth.render-signin');
    }
}
