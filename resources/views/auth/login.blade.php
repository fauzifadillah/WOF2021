@extends('layouts')

@section('title','SIGN IN')

@push('css')
  <link rel="stylesheet" href="/css/eventpage.css">
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
                    <form id="login" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="email">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="password">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password">
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
                    <a class="method-google">
                        <button class="sign-in"> <img src="/css/assets/google.svg" alt="google"> Google</button>
                    </a>
                    <a class="method-facebook" href="{{ route('login.facebook') }}">
                        <button class="sign-in"> <img src="/css/assets/facebook.svg" alt="facebook">Facebook</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection