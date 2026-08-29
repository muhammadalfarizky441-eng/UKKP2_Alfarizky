<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthController
 * Menangani login, logout, dan dashboard
 */
class AuthController extends Controller
{
    /**
     * Method showLoginForm
     * Menampilkan halaman login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Method login
     * Prosedur: memeriksa kredensial user
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    /**
     * Method logout
     * Menghapus session dan kembali ke halaman login
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    /**
     * Method dashboard
     * Menampilkan halaman utama setelah login
     */
    public function dashboard()
    {
        return view('dashboard');
    }
}