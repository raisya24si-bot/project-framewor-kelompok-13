<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
      
    public function index()
    {
        if (Auth::check()) {
        return redirect()->route('guest.index');
    }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
       if ($user && Hash::check($request->password, $user->password)) {
    Auth::login($user);

    // Simpan jam terakhir login ke session
    session(['last_login' => now()]);

    return redirect()->route('guest.index')->with('success','Login berhasil!');

} else {
    return back()->withErrors(['email' => 'Email atau password salah'])->withInput();
}

        
    }
     public function logout(Request $request)
    {
        Auth::logout();

        // Hapus semua session
        $request->session()->invalidate();

        // Regenerasi token CSRF
        $request->session()->regenerateToken();

        // Redirect ke halaman login
        return redirect()->route('login');
    }
}

