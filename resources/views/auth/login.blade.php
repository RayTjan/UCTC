@extends('layouts.app')

@section('content')
<div class="container">

    <div class="half light">
        <img src="">
    </div>

    <div class="bg-cut">
        <svg class="half" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="125%" height="125%" viewBox="250 0 1920 1080">
            <defs>
                <linearGradient id="linear-gradient" x1="0.53" y1="1.345" x2="0.5" y2="-0.325" gradientUnits="objectBoundingBox">
                    <stop offset="0" stop-color="#0e2f56"/>
                    <stop offset="1" stop-color="#0092ff"/>
                </linearGradient>
                <linearGradient id="linear-gradient-2" x1="0.475" y1="1.213" x2="0.412" y2="0.944" gradientUnits="objectBoundingBox">
                    <stop offset="0" stop-color="#0092ff"/>
                    <stop offset="1" stop-color="#004980"/>
                </linearGradient>
            </defs>
            <path id="Path_524" data-name="Path 524" d="M1920.5.5v1080H1107.08q-6.345,0-12.55-.5H814.19A155.645,155.645,0,0,0,951.77,934.01q.225-4.275.23-8.59V156.58q0-4.575-.27-9.08A155.6,155.6,0,0,1,1107.08.5Z" transform="translate(14.81 -0.5)" fill="url(#linear-gradient)"/>
            <path id="Path_1150" data-name="Path 1150" d="M814.19,1080.5V.5h813.42q6.345,0,12.55.5H1920.5a155.645,155.645,0,0,0-137.58,145.99q-.225,4.275-.23,8.59V924.42q0,4.575.27,9.08a155.6,155.6,0,0,1-155.35,147Z" transform="translate(-814.19 -0.5)" opacity="0.32" fill="url(#linear-gradient-2)"/>
        </svg>
    </div>

    <img class="half light" src="{{asset('img/computer.jpg')}}">

    <div class="position-relative">
        <div class="position-absolute">
            <h1 class="titlelogin font-weight-bold">UCTC</h1>
            <p class="titlelogin">manage your life better</p>
        </div>
    </div>
    <div class="star yellowstar starcenter"></div>

    <div class="row justify-content-sm-end">
        <div class="col-md-8">
            <div class="card-login">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        input design--}}

                        <span class="login100-form-title">
						    Sign in
					    </span>

                        <div class="wrap-input100 position-relative" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text @error('email') is-invalid @enderror" name="email" placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                        </div>

                        <div class="wrap-input100 validate-input " data-validate = "Password is required">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                                {{ __('Login') }}
                            </button>
                        </div>

{{--                        oyee--}}


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
