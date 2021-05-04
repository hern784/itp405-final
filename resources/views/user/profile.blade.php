@extends('layouts.main')

@section('title', "$user->name's profile")

@section('content')
    <div class="row">
        <div class="col-6">
            <h3>Appointments</h3>
            @if ($apps->count() === 0)
                No appointments, enter a name to search
                <form method="get" action="{{ route('business.search') }}">
                    <input class="form-control me-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            @else
                <div class="d-flex justify-content-center">
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
                                    {{$app->business->name}}
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
                    </div>
            @endif
        </div>
        <div class="col-6">

            <h2>Comments</h2>
            @if ($coms->count() === 0)
                No comments, search for business to make comointment
            @else
                <div class="d-flex justify-content-center">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>comment</th>
                            <th>update</th>
                            <th>delete</th>
                            <th>created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coms as $com)
                            <tr>
                                <td>
                                    {{$com->business->name}}
                                </td>
                                <td>
                                    {{$com->comment}}
                                </td>
                                <td>
                                    <a href="{{route('comment.edit', ['com' => $com])}}">
                                        Update
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('comment.delete', ['com' => $com])}}">
                                        Delete
                                    </a>
                                </td>
                                <td>
                                    {{$com->created_at->format('m/d/y')}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            @endif
        @endsection
        </div>
    </div>
