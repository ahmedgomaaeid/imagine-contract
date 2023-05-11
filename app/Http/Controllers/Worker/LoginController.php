<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('worker.login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('worker')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            return redirect()->route('index');
        }
        return  redirect()->back()->with('status', 'البريد الالكتروني او كلمة المرور غير صحيحة');
    }
    public function logout()
    {
        Auth::guard('worker')->logout();
        return redirect()->route('login');
    }
}
