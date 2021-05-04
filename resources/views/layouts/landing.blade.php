@extends('layouts.main')

@section('title', 'Login')

@section('content')
    <div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" 
                        id="user-tab" 
                        data-bs-toggle="tab" 
                        data-bs-target="#user" 
                        type="button" 
                        role="tab" 
                        aria-controls="user" 
                        aria-selected="true">
                    Shopper
                </button>
                <button class="nav-link" 
                        id="business-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#business"
                        type="button"
                        role="tab"
                        aria-controls="business"
                        aria-selected="false">
                    Business
                </button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">

                <form method="post" action="{{ route('auth_user.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               class="form-control" 
                               value="{{old('email')}}">
                        @error('email')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="form-control" 
                               value="{{old('password')}}">
                        @error('password')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <input type="submit" value="Login" class="btn btn-primary">
                </form>

            </div>
            <div class="tab-pane fade" id="business" role="tabpanel" aria-labelledby="business-tab">

                <form method="post" action="{{ route('auth_business.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               class="form-control" 
                               value="{{old('email')}}">
                        @error('email')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="form-control" 
                               value="{{old('password')}}">
                        @error('email')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <input type="submit" value="Login" class="btn btn-primary">
                </form>

            </div>
        </div>

    </div>

@endsection
