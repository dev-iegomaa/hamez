<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.pages.auth.index');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            toast('Login Successfully', 'success');
            return redirect(route('admin.index'));
        }
        toast('Login Failure', 'error');
        return back();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('admin.auth.index'));
    }
}
