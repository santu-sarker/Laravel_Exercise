@extends('layouts.user_layout')

@section('page_title')
Login Page
@endsection

{{-- custom css file --}}
@section('css-scripts')
{{--
<link rel="stylesheet" href="{{ asset('css/user_navbar.css') }}"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
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
        <div class="col-lg-5 col-md-7 col-sm-10">
            @if (session('type'))
            <div class="alert alert-{{ Session::get('type') }} alert-block text-center">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ Session::get('msg') }}</strong>
            </div>
            @endif
            <div class="card main_card">
                <div class="card-header text-center">
                    <h4 class="card_title">Login</h4>
                </div>

                <div class="card-body card_body">

                    <form method="POST" action="#">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <div class="col-auto col-form-label form_icon">
                                <i class="fa-solid fa-user"></i>
                            </div>

                            <div class="col form_input pl-0">
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
                            <div class="col-auto col-form-label form_icon">
                                <i class="fa-solid fa-lock"></i>
                            </div>

                            <div class="col form_input pl-0">
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