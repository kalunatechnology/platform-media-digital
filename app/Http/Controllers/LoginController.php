<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $roleName = $user->role->name;
            $userName = $user->name;
            session()->put('roles', $roleName);
            session()->put('username', $userName);
            session()->flash('welcome_message', 'Welcome, ' . $userName . '!'); // flash message
            return redirect()->intended('/backoffice');
        } else {
            return back()->withErrors(['email' => 'Email atau password salah']);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
        return redirect('/');
    }
}
