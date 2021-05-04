@extends('layouts.main')

@section('title', 'Make Appointment')

@section('content')
    <h1>
    {{$business->name}}
    </h1>
    <form action="{{route('appointment.store', ['business' => $business]) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date"
                   class="form-control"
                   id="date"
                   name="date"
                   min="{{ date('Y-m-d') }}">
            @error('date')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <input 
            type="time" 
            name="time" 
            id="time"
            placeholder="12:00">
            Business hours: {{$business->open}}AM - {{$business->close}}PM
            @error('time')
            <br>
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary"></input>
    </form>
@endsection
