@extends('layouts.user_layout')

@section('page_title')
Login Page
@endsection

{{-- custom css file --}}
@section('css-scripts')
{{--
<link rel="stylesheet" href="{{ asset('css/user_navbar.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('css/login_registration.css') }}">
@endsection

{{-- custom js scripts --}}
@section('js-scripts')

@endsection
{{-- @section('navbar')
@include('sub_views.user_navbar')

@endsection --}}
@section('main_content')
<div class="container login_container">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-5 col-sm-10">
            <div class="card main_card">
                <div class="card-header text-center">
                    <h4 class="card_title">Login</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <label for="email" class="col-lg-3 col-sm-10 col-form-label ">Email
                            </label>

                            <div class="col-lg-9 col-sm-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Enter your Name" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-3">
                            <label for="password" class="col-lg-3 col-sm-10 col-form-label">{{ __('Password')
                                }}</label>

                            <div class="col-lg-9 col-sm-10">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Enter password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row mt-4 px-3">

                            <button type="submit" class="btn btn-primary btn-block button-32 submit_btn">
                                {{ __('Login') }}
                            </button>

                            <a class="btn btn-link btn-block mt-3" href="{{ url('/register') }}">
                                Don't have an account? create here
                            </a>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
