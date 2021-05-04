<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('user.profile', [
            'user' => Auth::user(),
            'apps' => Appointment::get(),
            'coms' => Comment::get()
        ]);
    }

    public function appointments()
    {
        return view('user.appointments', [
            'user' => Auth::user(),
            'apps' => Appointment::get()
        ]);
    }

    public function comments()
    {
        return view('user.comments', [
            'user' => Auth::user(),
            'coms' => Comment::get()
        ]);
    }
}
