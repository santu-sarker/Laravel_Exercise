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
            @if (session('type'))
            <div class="alert alert-{{ Session::get('type') }} alert-block text-center mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ Session::get('msg') }}</strong>
            </div>

            {{ Session::forget(['type','msg']) }}
            @endif
            <div class="card main_card">
                <div class="card-header text-center">
                    <h4 class="card_title">Verify Your Phone Number</h4>

                </div>

                <div class="card-body ">

                    <form method="POST" action="{{ url('confirm_verification') }}">
                        @csrf

                        <div class="form-group row justify-content-center mb-0">


                            <div class="col-lg-9 col-sm-10 pr-2 mr-0">
                                <input id="verify_code" type="number"
                                    class="form-control @error('verify_code') is-invalid @enderror" name="verify_code"
                                    value="{{ old('verify_code') }}" required autocomplete="email"
                                    placeholder="Enter Verification Code" autofocus>

                                @error('verify_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="col-2 pl-0">
                                <button type="submit" class="btn btn-outline-primary ">
                                    Verify
                                </button>
                            </div>
                        </div>
                    </form>
                    @if (session('from'))
                    <div class="form-group row px-3">
                        <a class="btn btn-link btn-block mt-3" href="{{ route('register') }}">
                            Try to Create New Account
                        </a>
                    </div>
                    @else
                    <div class="form-group row px-3">
                        <a class="btn btn-link btn-block mt-3" href="{{ url('/resend_email') }}">
                            Didn't receive an SMS? Resend
                        </a>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection