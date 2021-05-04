@extends('layouts.main')

@section('title', 'Search')

@section('content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Hours</th>
                <th>Appointments</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            @foreach($businesses as $business)
                <tr>
                    <td>{{$business->name}}</td>
                    <td>{{$business->address}}</td>
                    <td>{{$business->open}} - {{$business->close}}</td>
                    @if (Auth::check())
                        <td>
                            <a href="{{route('appointment.create', ['business' => $business]) }}">
                                Appointment
                            </a>
                        </td>
                        <td>
                            <a href="{{route('comment.create', ['business' => $business]) }}">
                                Comment
                            </a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
