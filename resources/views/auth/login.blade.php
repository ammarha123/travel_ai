@extends('layout.app')

@section('title', 'Login')

@section('content')

    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-md-7 bg-light">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <h3 class="pb-3">Sign in</h3>
                                <p>Please login to continue to your account.</p>
                                <form method="POST" action="{{ route('login.submit') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="email">{{ __('Email Address') }}</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-warning btn-block">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                                <div class="sideline">OR</div>
                                <div>
                                    <a href="{{ route('login.google') }}"class="btn btn-warning w-100 font-weight-bold mt-2"><i
                                            class="fa fa-google" aria-hidden="true"></i> Login With Google</a>
                                </div>
                                <div class="pt-4 text-center">
                                    Need an account?  <a href="{{ route('register') }}">Create One</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 d-none d-md-flex bg-image-login"></div>

        </div>
    </div>

    <script src="https://use.fontawesome.com/f59bcd8580.js"></script>
@endsection

@php
    $hideFooter = true;
@endphp
