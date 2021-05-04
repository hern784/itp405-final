<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Business;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Appointment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BusinessController extends Controller
{
    public function index()
    {
        return view('business.profile', [
            'user' => Auth::user(),
            'bus' => Business::find(Auth::user()->id),
            'apps' => Appointment::get(),
            'coms' => Comment::get(),
        ]);
    }

    public function update_capacity(Request $request)
    {
        $bus = Business::find(Auth::user()->id);
        $bus->current = $request->input('current');
        $bus->save();

        return redirect()->route('business.profile');
    }

    public function search(Request $request)
    {
        $q = $request->query('search');

        $businesses = !$q ?
            Business::all() :
            Business::query()->where('name', 'LIKE', "%{$q}%")->get();

        return view('layouts.search', [
            'businesses' => $businesses
        ]);
    }

    public function appointments()
    {
        return view('business.appointments', [
            'user' => Auth::user(),
            'apps' => Appointment::get()
        ]);
    }

    public function comments()
    {
        return view('business.comments', [
            'user' => Auth::user(),
            'coms' => Comment::get()
        ]);
    }
}
