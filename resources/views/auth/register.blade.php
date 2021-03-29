@extends('layouts')

@section('title','SIGN UP')

@push('css')
    <link rel="stylesheet" href="/css/event.css">
    <link rel="stylesheet" href="/css/sign-container.css">
    <link rel="stylesheet" href="/css/register.css">
@endpush

@section('content')
    <div class="log__background">
        <div class="log__container">
            <div class="log__container__wrap">
                <div class="log__container__wrap__header">
                    <h1>SIGN UP</h1>
                </div>
                <div class="log__container__wrap__form">
                    <form id="register" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-control @error('name') error @enderror" style="margin-top: 0px;">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                            <img class="check" src="/css/assets/check-mark.svg" alt="v">
                            <img class="wrong" src="/css/assets/remove.svg" alt="x">
                            <small>@error('name'){{ $message }}@enderror</small>
                        </div>
                        <div class="form-control @error('email') error @enderror">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
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
                        <div class="form-control @error('password_confirmation') error @enderror">
                            <label for="confirm">Confirm Password</label>
                            <input type="password" id="confirm" name="password_confirmation" placeholder="Confirm Password">
                            <img class="check" src="/css/assets/check-mark.svg" alt="v">
                            <img class="wrong" src="/css/assets/remove.svg" alt="x">
                            <small>@error('password_confirmation'){{ $message }}@enderror</small>
                        </div>
                    </form>
                </div>
                <div class="log__container__wrap__button">
                    <button class="sign-up" type="submit" form="register">Sign Up</button>
                </div>
                <p>Already Have Account ? <a href="/">Sign in</a></p>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/register.js') }}"></script>
@endpush