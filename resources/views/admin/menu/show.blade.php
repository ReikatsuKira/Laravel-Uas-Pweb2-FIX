@extends('layouts.layout')

@section('title', 'Detail Menu')

@section('content')
<h2>{{ $menu->nama_menu }}</h2>
<p><strong>Harga:</strong> Rp{{ number_format($menu->harga, 0, ',', '.') }}</p>
<p><strong>Deskripsi:</strong> {{ $menu->deskripsi }}</p>
<p><strong>Kategori:</strong> {{ $menu->kategori->nama_kategori ?? '-' }}</p>
<p><strong>Gambar:</strong></p>
@if ($menu->gambar)
    <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama_menu }}" width="150">
@else
    <p>Tidak ada gambar</p>
@endif

<br><br>
<a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
