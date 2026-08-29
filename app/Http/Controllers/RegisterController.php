<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class RegisterController
 * Menangani pendaftaran user baru
 */
class RegisterController extends Controller
{
    /**
     * Menampilkan halaman register
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Prosedur: menyimpan data user baru
     */
    public function register(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed', // butuh field password_confirmation
        ]);

        // Buat user baru dengan role 'user'
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => 'user', // default user biasa
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}