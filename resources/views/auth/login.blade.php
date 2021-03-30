@extends('layouts')

@section('title','SIGN IN')

@push('css')
    <link rel="stylesheet" href="/css/event.css">
    <link rel="stylesheet" href="/css/sign-container.css">
    <link rel="stylesheet" href="/css/login.css">
@endpush

@section('content')
    <div class="log__background">
        <div class="log__container">
            <div class="log__container__wrap">
                <div class="log__container__wrap__header">
                    <h1>SIGN IN</h1>
                </div>
                <div class="log__container__wrap__form">
                    <form id="login" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-control @error('email') error @enderror">
                            <label for="email">Email</label>
                            <input id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            <img class="check" src="/css/assets/check-mark.svg" alt="v">
                            <img class="wrong" src="/css/assets/remove.svg" alt="x">
                            <small>@error('email'){{ $message }}@enderror</small>
                        </div>
                        <div class="form-control @error('password') error @enderror">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password">
                            <img class="check" src="/css/assets/check-mark.svg" alt="v">
                            <img class="wrong" src="/css/assets/remove.svg" alt="x">
                            <small>@error('password'){{ $message }}@enderror</small>
                        </div>
                    </form>
                </div>
                <div class="log__container__wrap__button">
                    <button class="sign-in" type="submit" form="login">Sign In</button>
                </div>
                <div class="log__container__wrap__choose">
                    <div class="rememberme">
                        <input type="checkbox" form="login" name="remember_me">
                        <p>Remember Me</p>
                    </div>
                    <div class="forget">
                        <p>Forget Password</p>
                    </div>
                </div>
                <div class="log__container__wrap__method">
                    <div class="method-google">
                        <button class="sign-in" onclick="window.location='{{ route('login.google') }}'"> <img src="/css/assets/google.svg" alt="google">Google</button>
                    </div>
                    <div class="method-facebook">
                        <button class="sign-in" onclick="window.location='{{ route('login.facebook') }}'"> <img src="/css/assets/facebook.svg" alt="facebook">Facebook</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/login.js') }}"></script>
@endpush