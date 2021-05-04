<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Business;
use App\Models\Appointment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    function index()
    {
        return Auth::user()->role == 1 ? redirect()->route('user.appointments') :
            redirect()->route('business.appointments');
    }

    function create(Business $business)
    {
        return view('appointment.create', ['business' => $business]);
    }

    function store(Request $request, Business $business)
    {

        $request->validate([
            'date' => 'required',
            'time' => 'required',
        ]);

        $app = new Appointment([

            'user_id' => Auth::user()->id,
            'bus_id' => $business->id,
            'date' => $request->input('date'),
            'start' => $request->input('time'),
            'end' => $request->input('time'),
        ]);

        $user = User::find(Auth::user()->id);
        $user->appointments()->save($app);

        return redirect()
            ->route('user.profile')
            ->with('success', "Appointment created for {$business->name} at {$app->start}");
    }

    function edit(Request $request, Appointment $app)
    {
        return view('user.edit', ['app' => $app]);
    }

    function update(Request $request, Appointment $app)
    {
        $app->date = $request->input('date');
        $app->start = $request->input('start');
        $app->end = $request->input('end');
        $app->save();

        return redirect()->route('user.appointments');
    }

    function delete(Request $request, Appointment $app)
    {
        $app->delete();
        return redirect()
            ->route('user.appointments')
            ->with('success', "Cancelled appointment for {$app->business->name} on {$app->date} at {$app->start}");
    }
}
