@extends('layouts.mainlayout')
@push('links')
    @include('layouts.links')
    <link rel="stylesheet" href={{ asset('/css/login.css') }}>
@endpush
@push('scripts')
    <script src={{ asset('js/script.js') }}></script>
@endpush
@section('title', 'Login')
@section('content')
    <form action="" method="post" class="login-form">
        <h1 class="form-title">
            Welcome Back
        </h1>
        <div class="login-section">
            <div class="">
                <label for="email">Email address*</label>
                <input type="text" name="email" id="email" class="form-input" autocomplete="off">
            </div>
            <div class="password_div">
                <label for="password">Password*</label>
                <input type="password" name="password" id="password" class="form-input" autocomplete="off">
                <i class="fa-regular fa-eye-slash eye-icon"></i>
            </div>
            <div class="password-options">
                <div>
                    <input type="checkbox" id="form-checkbox" name="remember"><label for="form-checkbox"> Remember me</label>
                </div>
                <p class="linktext"><a href="#">Forgot Password?</a></p>
            </div>
            <input type="submit" name="submit" value="Login" class="form-btn">
        </div>
        <p class="linktext">Dont have a account ? <a href= {{ route('signin') }}>Register here</a></p>
    </form>
@endsection