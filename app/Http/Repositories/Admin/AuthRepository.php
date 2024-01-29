<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AuthInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthRepository implements AuthInterface
{

    public function index()
    {
        return view('admin.pages.auth.index');
    }

    public function login($request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            toast(__('Login Successfully'), 'success');
            return redirect(route('admin.index'));
        }
        toast(__('Login Failure'), 'error');
        return back();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        toast(__('Log out Successfully'), 'success');
        return redirect(route('admin.auth.index'));
    }
}
