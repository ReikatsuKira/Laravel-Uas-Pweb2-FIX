@extends('layouts.app')

@section('title', 'Register')

@section('content')
<style>
    body {
        background: url('{{ asset('menu/kantin-bg.png.jpeg') }}') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    .register-wrapper {
        background-color: rgba(255, 255, 255, 0.92);
        border-radius: 20px;
        padding: 50px;
        box-shadow: 0 10px 40px rgba(255, 105, 180, 0.4);
        animation: float 2.5s ease-in-out infinite;
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
        border-radius: 20px 20px 0 0;
        text-align: center;
        padding: 15px 10px;
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
        box-shadow: 0 4px 12px rgba(255, 105, 180, 0.4);
        transform: scale(1.05);
    }

    .background-deco {
        position: absolute;
        bottom: -20px;
        right: -20px;
        width: 120px;
        opacity: 0.2;
        transform: rotate(-15deg);
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="register-wrapper position-relative">
                <div class="card-header">
                    <span class="emoji">🧁🍕🍹</span> Daftar di Kantin Ceria
                </div>

                <div class="card-body mt-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input id="name" type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Aktif</label>
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required>
                            @error('password')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-4">
                            <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                            <input id="password-confirm" type="password"
                                   class="form-control" name="password_confirmation" required>
                        </div>

                        <!-- Tombol Daftar -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-pink">
                                💖 Daftar Sekarang
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Decorative Image (Optional) -->
                <img src="{{ asset('menu/deco-donut.png') }}" class="background-deco" alt="deco">
            </div>
        </div>
    </div>
</div>
@endsection
