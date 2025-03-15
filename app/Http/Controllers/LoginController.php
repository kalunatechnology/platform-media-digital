<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;
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
    
            if ($user->is_approved == 0) {
                Auth::logout();
                return back()->withErrors(['email' => 'Akun Anda belum dikonfirmasi oleh Admin.']);
            }
            
            if ($user->is_approved == 2) {
                Auth::logout();
                return back()->withErrors(['email' => 'Akun Anda telah dinonaktifkan. Silakan hubungi Admin.']);
            }
    
            $roleName = $user->role->name;
            $userName = $user->name;
            session()->put('roles', $roleName);
            session()->put('username', $userName);
            session()->flash('welcome_message', 'Welcome, ' . $userName . '!');
    
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

    public function getkota(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        
        $data = Kota::where('province_id', $value)->get();
    
        $output = '<option value="">~ Pilih Asal Kota/Kabupaten ~ </option>';
        
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        
        return response()->json($output);
    }
    public function getkecamatan(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        
        $data = Kecamatan::where('regency_id', $value)->get();
    
        $output = '<option value="">~ Pilih Asal Kecamatan ~</option>';
        
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        
        return response()->json($output);
    }
    public function getkelurahan(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        
        $data = Kelurahan::where('district_id', $value)->get();
    
        $output = '<option value="">~ Pilih Asal Kelurahan ~ </option>';
        
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        
        return response()->json($output);
    }
}
