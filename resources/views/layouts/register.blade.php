@extends('layouts.main')

@section('title', 'Register')

@section('content')
    <div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link" 
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

                <form method="post" action="{{ route('auth_user.register') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input type="text"
                               id="name"
                               name="name"
                               class="form-control" 
                               value="{{ old('name') }}"
                               >
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" 
                               id="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email') }}"
                               >
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
                               >
                        @error('password')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <input type="submit" value="Register" class="btn btn-primary">
                </form>
            </div>
            <div class="tab-pane fade" id="business" role="tabpanel" aria-labelledby="business-tab">
                <form method="post" action=" {{ route('auth_business.register') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input type="text"
                               id="name"
                               name="name"
                               class="form-control"
                               value="{{ old('name') }}"
                               >
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" 
                               id="email" 
                               name="email"
                               class="form-control"
                               value="{{ old('email') }}"
                               >
                        @error('email')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="capacity">Capacity</label>
                        <input type="text"
                               id="capacity"
                               name="capacity"
                               class="form-control"
                               value="{{ old('capacity') }}"
                               >
                        @error('capacity')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="address">Address</label>
                        <input type="text"
                               id="address"
                               name="address" 
                               class="form-control"
                               value="{{ old('address') }}"
                               >
                        @error('address')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="open">Open</label>
                        <input type="time"
                               id="open"
                               name="open" 
                               class="form-control"
                               value="{{ old('open') }}"
                               >
                        @error('open')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="close">Close</label>
                        <input type="time"
                               id="close"
                               name="close" 
                               class="form-control"
                               value="{{ old('close') }}"
                               >
                        @error('close')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password"
                               id="password"
                               name="password" 
                               class="form-control"
                               >
                        @error('password')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <input type="submit" value="Register" class="btn btn-primary">
                </form>

            </div>
        </div>

    </div>


@endsection
