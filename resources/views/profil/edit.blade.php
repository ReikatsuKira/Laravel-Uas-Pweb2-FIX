@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="container mt-4">
    <h2>Edit Profil</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Nama:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="password">Password Baru (kosongkan jika tidak diubah):</label>
            <input type="password" name="password" class="form-control">
            <input type="password" name="password_confirmation" class="form-control mt-2" placeholder="Konfirmasi Password">
        </div>

        <div class="mb-3">
            <label for="profile_picture">Foto Profil:</label><br>
            @if($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" width="100" class="rounded-circle mb-2">
            @endif
            <input type="file" name="profile_picture" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
