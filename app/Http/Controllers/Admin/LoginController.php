<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.auth.login');
    }
    
    public function login(Request $request)
    {
        if (auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')])) {
            return redirect()->route('get.admin.dashboard');
        }
        
        return  redirect()->back()->with('status', 'البريد الالكتروني او كلمة المرور غير صحيحة');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('get.admin.login');
    }
}
