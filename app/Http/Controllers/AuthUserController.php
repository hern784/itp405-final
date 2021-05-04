<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        $loginSuccessful = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        return $loginSuccessful ?
            redirect()->route('user.profile') :
            view('layouts.landing')->with('error', 'Invalid credentials.');
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); //bcrypt
        $user->role = 1;
        $user->save();

        Auth::login($user);
        return redirect()->route('user.profile');
    }

    public function logout()
    {
        Auth::logout();
        return view('layouts.main');
    }
}
