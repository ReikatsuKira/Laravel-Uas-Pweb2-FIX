@extends('layouts.layout')

@section('title', 'Edit Menu')

@section('content')
<div class="container">
    <h2>Edit Menu</h2>
    <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_menu" class="form-label">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control" value="{{ old('nama_menu', $menu->nama_menu) }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga', $menu->harga) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Baru (Opsional)</label><br>
            @if($menu->gambar)
                <img src="{{ asset('storage/' . $menu->gambar) }}" alt="gambar" width="100"><br><br>
            @endif
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Menu</button>
    </form>
</div>
@endsection
