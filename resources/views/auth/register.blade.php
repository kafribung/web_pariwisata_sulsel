@extends('auth.master_auth')
@section('title', 'Register April')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url( {{asset('log/images/bg-01.jpg')}} );">
                <span class="login100-form-title-1">
                    Register April
                </span>
            </div>

            @if (session('msg'))
                <p class="alert alert-danger">{{session('msg')}}</p>
            @endif

            <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Name</span>
                    <input class="input100" type="text"  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus placeholder="Enter username">
                    <span class="focus-input100"></span>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="email"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off"  placeholder="Enter email">
                    <span class="focus-input100"></span>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">
                    <span class="focus-input100"></span>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                    <span class="label-input100">Confirm Password</span>
                    <input class="input100" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                    <span class="focus-input100"></span>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection