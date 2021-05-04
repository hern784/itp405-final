<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthBusinessController extends Controller
{
    public function index()
    {
        return redirect('business.profile');
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
            redirect()->route('business.profile') :
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
        $user->password = Hash::make($request->input('password'));
        $user->role = 2;
        $user->save();

        $business = new Business();
        $business->name = $request->input('name');
        $business->address = $request->input('address');
        $business->capacity = $request->input('capacity');
        $business->current = 0;
        $business->open = $request->input('open');
        $business->close = $request->input('close');
        $business->user_id = $user->id;
        $business->save();


        Auth::login($user);
        return redirect()->route('business.profile');
    }

    public function logout()
    {
        Auth::logout();
        return view('layouts.main');
    }
}
