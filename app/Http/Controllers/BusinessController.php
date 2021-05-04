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
        $user = Auth::user();
        $bus = Business::where('user_id', $user->id)->first();
        return view('business.profile', [
            'user' => $user,
            'bus' => $bus,
            'apps' => Appointment::where('bus_id', $bus->id)->get(),
            'coms' => Comment::where('bus_id', $bus->id)->get(),
        ]);
    }

    public function update_capacity(Request $request)
    {
        $bus = Business::where('user_id', Auth::user()->id)->first();
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
        $user = Auth::user();
        $bus = Business::where('user_id', $user->id)->first();
        return view('business.appointments', [
            'user' => Auth::user(),
            'apps' => Appointment::where('bus_id', $bus->id)->get(),
        ]);
    }

    public function comments()
    {
        $user = Auth::user();
        $bus = Business::where('user_id', $user->id)->first();
        return view('business.comments', [
            'user' => Auth::user(),
            'coms' => Comment::where('bus_id', $bus->id)->get(),
        ]);
    }
}
