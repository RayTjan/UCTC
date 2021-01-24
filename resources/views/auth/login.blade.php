@extends('layouts.app')

@section('content')
<div class="bglogin">

    <div class="position-relative">
        <div class="position-absolute">
            <div class="d-flex">
                <img src="/img/icon.svg" class=" sizeForm align-self-center">
                <div class="align-self-center">
                    <h1 class="titlelogin login font-weight-bold">UCTC</h1>
                    <div class="titlelogin">manage your life better</div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end height100">
            <div class="card-login align-self-center mr-lg-5">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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
@endsection
