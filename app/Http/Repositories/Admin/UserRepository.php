<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{

    public function index()
    {
        $users = User::select(['id', 'name', 'email'])->where('id', '!=', auth()->user()->id)->get();
        confirmDelete(__('Delete User !'), __('Are you sure you want to delete?'));
        return view('admin.pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.user.form');
    }

    public function store($request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        toast(__('User Was Created Successfully'), 'success');
        return redirect(route('admin.user.index'));
    }

    public function delete($id)
    {
        User::select('id')->find(base64_decode($id))->delete();
        toast(__('User Was Deleted Successfully'), 'success');
        return back();
    }

    public function edit($id)
    {
        $user = User::select('id', 'name', 'email')->find(base64_decode($id));
        if ($user) {
            return view('admin.pages.user.form', compact('user'));
        }
        toast(__("Sorry, Can't User Found"), 'error');
        return back();
    }

    public function update($request)
    {
        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => !is_null($request->password) ? Hash::make($request->password) : $user->password
        ]);
        toast(__('User Was Updated Successfully'), 'success');
        return redirect(route('admin.user.index'));
    }
}
