<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('api')->attempt($credentials)) {
            $user = Auth::guard('api')->user();
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('user')) {
                return redirect()->route('user.homepage');
            }
        }
    
        if (Auth::guard('dokter')->attempt($credentials)) {
            $dokter = Auth::guard('dokter')->user();
            if ($dokter->hasRole('dokter')) {
                return redirect()->route('dokter.dashboard');
            }
        }
    
        return redirect()->route('login');
    }
    
    
    
    


}
