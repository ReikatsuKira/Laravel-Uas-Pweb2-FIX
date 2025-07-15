@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
    body {
        background: url('{{ asset('menu/kantin-bg.png.jpeg') }}') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    .login-wrapper {
        background-color: rgba(255, 255, 255, 0.93);
        border-radius: 25px;
        padding: 50px;
        box-shadow: 0 12px 40px rgba(255, 105, 180, 0.45);
        animation: float 2s ease-in-out infinite;
        position: relative;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-5px); }
    }

    .card-header {
        background: linear-gradient(to right, #ff69b4, #ffb6c1);
        color: white;
        font-weight: bold;
        font-size: 1.8rem;
        border-radius: 25px 25px 0 0;
        text-align: center;
        padding: 15px;
        box-shadow: 0 4px 10px rgba(255, 105, 180, 0.3);
    }

    .emoji {
        font-size: 2.2rem;
        animation: bounce 1.5s infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-6px); }
    }

    .form-label {
        font-weight: 600;
        color: #d63384;
    }

    input.form-control {
        border-radius: 10px;
        border: 1.5px solid #ffc5da;
        box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
    }

    .form-check-label {
        color: #555;
        font-weight: 500;
    }

    .btn-pink {
        background: linear-gradient(to right, #ff69b4, #ff85c1);
        color: white;
        border: none;
        padding: 10px 30px;
        font-weight: bold;
        font-size: 1rem;
        border-radius: 30px;
        transition: 0.3s ease;
    }

    .btn-pink:hover {
        background: #ff4d9a;
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(255, 105, 180, 0.4);
    }

    a.btn-link {
        color: #ff69b4;
        text-decoration: none;
        font-weight: 500;
        transition: 0.2s ease;
    }

    a.btn-link:hover {
        color: #ff4081;
        text-decoration: underline;
    }

    .background-deco {
        position: absolute;
        bottom: -20px;
        right: -20px;
        width: 110px;
        opacity: 0.2;
        transform: rotate(-10deg);
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-wrapper position-relative">
                <div class="card-header">
                    <span class="emoji">🍔🥤🍩</span> Login Kantin Ceria
                </div>
                <div class="card-body mt-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required>
                            @error('password')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Remember -->
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>

                        <!-- Tombol Login & Lupa Password -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <button type="submit" class="btn btn-pink">
                                💖 {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Gambar Hiasan -->
                <img src="{{ asset('menu/deco-burger.png') }}" class="background-deco" alt="deco">
            </div>
        </div>
    </div>
</div>
@endsection
