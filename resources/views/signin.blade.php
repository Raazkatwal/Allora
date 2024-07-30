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
                <label for="email">Email address</label>
                <input type="text" id="email" class="form-input @error('email') input-error @enderror" name="email" value="{{ old('email') }}" autocomplete="off" >
                <span class="input-error-msg">
                    @error('email') {{$message}} @enderror
                </span>
            </div>
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" class="form-input @error('username') input-error @enderror" name="username" value="{{ old('username') }}"  autocomplete="off">
                <span class="input-error-msg">
                    @error('username') {{$message}} @enderror
                </span>
            </div>
            <div class="password_div">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-input @error('password') input-error @enderror" name="password" autocomplete="off">
                <i class="fa-regular fa-eye-slash eye-icon"></i>
                <span class="input-error-msg">
                    @error('password') {{$message}} @enderror
                </span>
            </div>
            <input type="submit" value="Register" class="form-btn">
        </div>
        <p class="linktext">Already have a account ? <a href= {{ route('login') }}>Login here</a></p>
    </form>
@endsection