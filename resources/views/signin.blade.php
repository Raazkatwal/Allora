@extends('layouts.mainlayout')
@push('links')
    @include('layouts.links')
    <link rel="stylesheet" href={{ asset('/css/login.css') }}>
@endpush
@push('scripts')
    <script src={{ asset('js/script.js') }}></script>
@endpush
@section('title', 'Create Account')
@section('content')
    <form action={{ route('addUser') }} method="post" class="login-form">
        @csrf
        <h1 class="form-title">
            Create an account
        </h1>
        <div class="login-section">
            <div>
                <label for="email">Email address*</label>
                <input type="text" id="email" class="form-input" name="email" autocomplete="off">
            </div>
            <div>
                <label for="username">Username*</label>
                <input type="text" id="username" class="form-input" name="username" autocomplete="off">
            </div>
            <div class="password_div">
                <label for="password">Password*</label>
                <input type="password" id="password" class="form-input" name="password" autocomplete="off">
                <i class="fa-regular fa-eye-slash eye-icon"></i>
            </div>
            <div>
                <input type="checkbox" id="terms-and-policy"><label for="terms-and-policy"> I agree with all the Terms and conditions</label>
            </div>
            <input type="submit" value="Register" class="form-btn">
        </div>
        <p class="linktext">Already have a account ? <a href= {{ route('login') }}>Login here</a></p>
    </form>
@endsection