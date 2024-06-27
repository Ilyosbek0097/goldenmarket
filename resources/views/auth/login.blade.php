@extends('layouts.login_layout')
@section('content')
    <!-- Logo -->
    <div class="app-brand justify-content-center">
        <a href="/" class="app-brand-link gap-2">
            <img src="{{ asset('../assets/img/avatars/logo6.png') }}">
{{--            <span class="app-brand-text demo text-body fw-bolder text-capitalize" >Tillozor</span>--}}
        </a>
    </div>
    <!-- /Logo -->
    <h4 class="mb-4 text-center">Tizimga Xush Kelibsiz! 👋</h4>
    <x-auth-session-status class="mb-4 text-danger" :status="session('status')" />
    <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Login</label>
            <input
                type="text"
                class="form-control"
                id="email"
                name="email"
                placeholder="Enter your email or username"
                autofocus
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
        </div>
        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Parol</label>
{{--                <a href="{{ route('password.request') }}">--}}
{{--                    <small>Parolni Unutdizmi?</small>--}}
{{--                </a>--}}
            </div>
            <div class="input-group input-group-merge">
                <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Ma'lumotlar Saqlansinmi? </label>
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Kirish</button>
        </div>
    </form>

{{--    <p class="text-center">--}}
{{--        <span>Yangi Foydalanuvchimisiz?</span>--}}
{{--        <a href="{{ route('register') }}">--}}
{{--            <span>Hisob Oching</span>--}}
{{--        </a>--}}
{{--    </p>--}}
@endsection
