<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PendaftarUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class PendaftarAuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('auth.pendaftar.login');
    }

    // Show register form
    public function showRegister()
    {
        return view('auth.pendaftar.register');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('pendaftar')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/pendaftar/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Handle register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pendaftar_users',
            'phone' => 'required|string|max:20',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = PendaftarUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => 'Active',
        ]);

        Auth::guard('pendaftar')->login($user);

        return redirect('/pendaftar/dashboard')->with('success', 'Registrasi berhasil! Selamat datang.');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::guard('pendaftar')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/pendaftar/login');
    }

    // Show forgot password form
    public function showForgotPassword()
    {
        return view('auth.pendaftar.forgot-password');
    }

    // Handle forgot password
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:pendaftar_users,email',
        ]);

        $user = PendaftarUser::where('email', $request->email)->first();
        $token = Str::random(60);
        
        $user->update([
            'verification_token' => $token,
            'token_expires_at' => now()->addHours(1),
        ]);

        // Send reset password email
        try {
            Mail::send('emails.pendaftar.reset-password', [
                'user' => $user,
                'token' => $token,
                'url' => url('/pendaftar/reset-password/' . $token)
            ], function ($message) use ($user) {
                $message->to($user->email, $user->name)
                       ->subject('Reset Password - Pendaftaran PMB');
            });

            return back()->with('success', 'Link reset password telah dikirim ke email Anda.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim email. Silakan coba lagi.');
        }
    }

    // Show reset password form
    public function showResetPassword($token)
    {
        $user = PendaftarUser::where('verification_token', $token)
                           ->where('token_expires_at', '>', now())
                           ->first();

        if (!$user) {
            return redirect('/pendaftar/forgot-password')->with('error', 'Token tidak valid atau sudah expired.');
        }

        return view('auth.pendaftar.reset-password', compact('token'));
    }

    // Handle reset password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = PendaftarUser::where('verification_token', $request->token)
                           ->where('token_expires_at', '>', now())
                           ->first();

        if (!$user) {
            return back()->with('error', 'Token tidak valid atau sudah expired.');
        }

        $user->update([
            'password' => Hash::make($request->password),
            'verification_token' => null,
            'token_expires_at' => null,
        ]);

        return redirect('/pendaftar/login')->with('success', 'Password berhasil direset. Silakan login.');
    }
}
