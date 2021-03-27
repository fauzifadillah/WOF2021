@extends('layouts')

@section('title','SIGN UP')

@push('css')
    <link rel="stylesheet" href="/css/eventpage.css">
    <link rel="stylesheet" href="/css/sign-container.css">
    <link rel="stylesheet" href="/css/signup.css">
@endpush

@section('content')
    <div class="log__background">
        <div class="log__container">
            <div class="log__container__wrap">
                <div class="log__container__wrap__header">
                    <h1>SIGN UP</h1>
                </div>
                <div class="log__container__wrap__form">
                    <form id="REGISTER" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form__group" style="margin-top: 0px;">
                            <label for="name">Name</label>
                            <input type="text" id="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form__group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form__group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form__group">
                            <label for="confirm">Confirm Password</label>
                            <input type="password" id="confirm" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>
                    </form>
                </div>
                <div class="log__container__wrap__button">
                    <button class="sign-up" form="REGISTER" type="submit">Sign Up</button>
                </div>
                <p>Already Have Account ? <a href="/">Sign in</a></p>
            </div>
        </div>
    </div>
@endsection