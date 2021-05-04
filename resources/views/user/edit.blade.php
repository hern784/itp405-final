@extends('layouts.main')

@section('title', 'Make Appointment')

@section('content')
    <h1>
        {{$app->business->name}}
    </h1>
    <form action="{{route('appointment.update', ['app' => $app]) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date"
                   class="form-control"
                   id="date"
                   name="date"
                   value="{{ old('date', $app->date) }}">
            @error('date')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="start" class="form-label">Start</label>
            <input type="time"
                   class="form-control"
                   id="start"
                   name="start"
                   value="{{ old('start', $app->start) }}">
            @error('start')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="end" class="form-label">End</label>
            <input type="time"
                   class="form-control"
                   id="end"
                   name="end"
                   value="{{ old('end', $app->end) }}">
            @error('end')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary"></input>
    </form>
@endsection
