@extends('layouts.main')

@section('title', "$user->name's profile")

@section('content')
    <div class="row">
        <div class="d-flex flex-row">
            <div class="align-center">
                Current occupancy: {{ $bus->current }} out of of {{$bus->capacity}}  
            </div>
            <div class="inline-block d-flex ">
                <form method="get" action="{{ route('business.update_capacity') }}">
                    @csrf
                    <button type"submit" class="btn-sm" name="current" value="{{ $bus->current + 1 }}">+</button>
                </form>
                <form method="get" action="{{ route('business.update_capacity') }}">
                    @csrf
                    <button type"submit" class="btn-sm"  name="current" value="{{ $bus->current - 1 }}">-</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">

            <h2>Appointments</h2>
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
        </div>
        <div class="col-6">

            <h2>Comments</h2>
            @if ($coms->count() === 0)
                No comointments, search for business to make comointment
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>comment</th>
                            <th>Date</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coms as $com)
                            <tr>
                                <td>
                                    {{$com->user->name}}
                                </td>
                                <td>
                                    {{$com->comment}}
                                </td>
                                <td>
                                    {{$com->created_at->format('m/d/y')}}
                                </td>
                                <td>
                                    <a href="{{route('comment.delete', ['com' => $com])}}">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
