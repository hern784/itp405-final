@extends('layouts.main')

@section('title', 'Edit Comment')

@section('content')
    <h1>
        {{$com->business->name}}
    </h1>
    <form action="{{route('comment.update', ['com' => $com]) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <input type="textarea" class="form-control" id="comment" name="comment" value="{{$com->comment}}">
        </div>
        <input type="submit" class="btn btn-primary"></input>
    </form>
@endsection
