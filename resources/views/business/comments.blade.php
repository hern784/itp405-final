@extends('layouts.main')

@section('title', "$user->name's comments")

@section('content')
    @if ($coms->count() === 0)
        No comments, search for business to make comointment
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User</th>
                    <th>comment</th>
                    <th>date</th>
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
@endsection
