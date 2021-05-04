@extends('layouts.main')

@section('title', "$user->name's Comments")

@section('content')
    @if ($coms->count() === 0)
        No comointments, search for business to make comointment
    @else
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
    @endif
@endsection
