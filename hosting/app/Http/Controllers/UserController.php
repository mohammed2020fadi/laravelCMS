<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Users\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            return view('users.index')->with('users', User::all());
        } else {
            session()->flash('error', 'Soory you are not have permisstion to visit this page');
            return view('home');
        }
    }
    public function makeAdmin(User $user)
    {
        $user->permission = 'admin';
        $user->save();

        session()->flash('success', 'User is Admin Now :)');
        return view('users.index')->with('users', User::all());
    }
    public function makeWriter(User $user)
    {
        $user->permission = 'writer';
        $user->save();

        session()->flash('success', 'User is Writer Now :)');
        return view('users.index')->with('users', User::all());
    }
    public function edit(User $user)
    {
        return view('users.edit')->with('user', auth()->user());
    }
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->about = $request->about;

        $user->save();

        session()->flash('success', 'User Updated :)');
        return redirect()->back();
    }
}
