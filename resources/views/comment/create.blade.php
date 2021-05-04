@extends('layouts.main')

@section('title', 'Make Comment')

@section('content')
    <h1>
    {{$business->name}}
    </h1>
    <form action="{{route('comment.store', ['business' => $business]) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <input type="textarea"
                   class="form-control"
                   id="comment"
                   name="comment">
            @error('comment')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary"></input>
    </form>
@endsection

