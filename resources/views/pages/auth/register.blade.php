@extends('layouts.user_layout')

@section('page_title')
Registration Page
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
            @if (session('type'))
            <div class="alert alert-{{ Session::get('type') }} alert-block text-center">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ Session::get('msg') }}</strong>
            </div>
            @endif
            <div class="card main_card">
                <div class="card-header text-center">
                    <h4 class="card_title">Registration Form </h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <label for="name" class="col-lg-3 col-sm-10 col-form-label ">{{ __('Name') }}</label>

                            <div class="col-lg-9 col-sm-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name"
                                    placeholder="Enter Your Name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-3">

                            <label for="email" class="col-lg-3 col-sm-10 col-form-label ">{{ __('Email') }}</label>

                            <div class="col-lg-9 col-sm-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Your Email Address">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-center mt-3">
                            <label for="phone" class="col-lg-3 col-sm-10 col-form-label pr-0">Phone</label>

                            <div class="col-lg-9 col-sm-10  d-flex">
                                <div class="col-2 p-0">
                                    <input type="number" class="form-control pr-0" value="880" disabled>
                                </div>
                                <div class="col-lg-10 col-sm-10 px-0">
                                    <input id="phone" type="number"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone"
                                        placeholder="your Phone Number">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-3">
                            <label for="password" class="col-lg-3 col-sm-10 col-form-label">{{ __('Password')
                                }}</label>

                            <div class="col-lg-9 col-sm-10">

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" placeholder="Enter Your Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-3">
                            <label for="password-confirm" class="col-lg-3 col-sm-10 col-form-label">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-lg-9 col-sm-10">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm Your Password">
                            </div>
                        </div>

                        <div class="form-group row mt-4 px-3">
                            <button type="submit" class="btn btn-primary btn-block button-32 submit_btn">
                                {{ __('Register') }}
                            </button>
                            <a class="btn btn-link btn-block mt-3" href="{{ url('/login') }}">
                                Already Have account? login here
                            </a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection