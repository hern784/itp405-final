@extends('layouts.main')

@section('title', "$user->name's Appointments")

@section('content')
    @if ($apps->count() === 0)
        No appointments, search for business to make appointment
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>time</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($apps as $app)
                    <tr>
                        <td>
                            {{$app->user->name}}
                        </td>
                        <td>
                            {{ date('m/d/y', strtotime($app->date))}}
                        </td>
                        <td>
                            {{ date('h:i:sa', strtotime($app->start))}}
                        </td>
                        <td>
                            <a href="{{route('appointment.edit', ['app' => $app])}}">
                                Update
                            </a>
                        </td>
                        <td>
                            <a href="{{route('appointment.delete', ['app' => $app])}}">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
