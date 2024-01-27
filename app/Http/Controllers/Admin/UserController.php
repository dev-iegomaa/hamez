<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\DeleteUserRequest;
use App\Http\Requests\Admin\User\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select(['id', 'name', 'email'])->get();
        return view('admin.pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.user.form');
    }

    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        toast('User Was Created Successfully', 'success');
        return redirect(route('admin.user.index'));
    }

    public function delete(DeleteUserRequest $request)
    {
        User::select('id')->find($request->id)->delete();
        toast('User Was Deleted Successfully', 'success');
        return back();
    }

    public function edit($id)
    {
        $user = User::select('id', 'name', 'email')->find(base64_decode($id));
        if ($user) {
            return view('admin.pages.user.form', compact('user'));
        }
        toast('Sorry, Can\'t User Found', 'error');
        return back();
    }

    public function update(UserRequest $request)
    {
        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->has('password') ? Hash::make($request->password) : $user->password
        ]);
        toast('User Was Updated Successfully', 'success');
        return redirect(route('admin.user.index'));
    }
}
