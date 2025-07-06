@extends('layouts.layout')

@section('title', 'Tambah Menu')

@section('content')
<h2>Tambah Menu Baru</h2>

<form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nama_menu" class="form-label">Nama Menu</label>
        <input type="text" name="nama_menu" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control" max="999999999" required>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" name="gambar" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
