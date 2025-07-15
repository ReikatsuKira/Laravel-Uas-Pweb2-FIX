@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<style>
    body {
        background: url('{{ asset('menu/kantin-bg.png.jpeg') }}') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    .profile-wrapper {
        background-color: rgba(255, 255, 255, 0.95);
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 10px 40px rgba(255, 105, 180, 0.3);
        animation: float 2.5s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    h2 {
        font-weight: bold;
        color: #ff69b4;
        text-align: center;
        margin-bottom: 30px;
    }

    label {
        font-weight: 600;
        color: #d63384;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #ffc1d6;
    }

    .btn-pink {
        background-color: #ff69b4;
        color: white;
        border: none;
        font-weight: bold;
        padding: 10px 25px;
        border-radius: 30px;
        transition: 0.3s ease;
    }

    .btn-pink:hover {
        background-color: #ff4081;
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(255, 105, 180, 0.4);
    }

    .profile-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #ffb6c1;
        box-shadow: 0 4px 12px rgba(255, 105, 180, 0.3);
        margin-bottom: 15px;
    }

    .emoji-title {
        font-size: 1.8rem;
        animation: bounce 1.5s infinite;
        display: inline-block;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-6px); }
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-wrapper">
                <h2><span class="emoji-title">👩‍🍳💖</span> Edit Profil</h2>

                @if(session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif

                <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ old('name', $user->name) }}" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email', $user->email) }}" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password">Password Baru (kosongkan jika tidak diubah)</label>
                        <input type="password" name="password" class="form-control" placeholder="Password baru">
                        <input type="password" name="password_confirmation" class="form-control mt-2"
                               placeholder="Konfirmasi Password">
                    </div>

                    <!-- Foto Profil -->
                    <div class="mb-3 text-center">
                        <label for="profile_picture">Foto Profil</label><br>
                        @if($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                 alt="Foto Profil" class="profile-img">
                        @endif
                        <input type="file" name="profile_picture" class="form-control mt-3">
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-pink">💾 Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
