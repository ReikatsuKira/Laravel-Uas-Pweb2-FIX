@extends('layouts.app')

@section('title', 'Menu Makanan')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .card {
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(255, 105, 180, 0.2);
        transition: 0.3s ease;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(255, 105, 180, 0.35);
    }

    .card-title {
        color: #d63384;
        font-weight: bold;
    }

    .card-text {
        color: #444;
    }

    .btn-pink {
        background-color: #ff69b4;
        color: white;
        font-weight: bold;
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .btn-pink:hover {
        background-color: #ff4081;
        box-shadow: 0 4px 12px rgba(255, 105, 180, 0.3);
        transform: scale(1.05);
    }

    .btn-back {
        background-color: #ffd1dc;
        color: #b63b6c;
        font-weight: 500;
        border: none;
        border-radius: 25px;
        padding: 6px 20px;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.2s ease;
        display: inline-block;
    }

    .btn-back:hover {
        background-color: #ffb6c1;
        color: #8a2c4a;
        transform: translateX(-2px);
    }

    h3 {
        font-weight: bold;
        color: #c2185b;
        margin-bottom: 30px;
    }

    .form-control[type="number"] {
        border-radius: 15px;
        border: 1px solid #ffc1d6;
        text-align: center;
    }
</style>

<div class="container mt-4">
    <a href="{{ url('home') }}" class="btn btn-back mb-3">← Kembali</a>
    <h3 class="text-center">Menu Hari Ini 🍜✨</h3>

    <div class="row">
        @forelse ($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="{{ asset('storage/' . $menu->gambar) }}" class="card-img-top rounded-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title">{{ $menu->nama_menu }}</h5>
                        <small class="text-muted mb-2">🍽️ Kategori: {{ $menu->kategori->nama_kategori ?? '-' }}</small>
                        <p class="card-text fw-bold">💰 Rp{{ number_format($menu->harga, 0, ',', '.') }}</p>

                        <form action="{{ route('order.store') }}" method="POST" class="mt-auto">
                            @csrf
                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                            <input type="number" name="jumlah" value="1" min="1"
                                   class="form-control mb-2 mx-auto" style="max-width: 80px;">
                            <button type="submit" class="btn btn-pink w-100">Pesan Sekarang 🍱</button>
                        </form>

                        {{-- Tambah ke Keranjang --}}
<form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
    
    <div class="input-group mb-2" style="max-width: 150px; margin: 0 auto;">
        <input type="number" name="jumlah" value="1" min="1" class="form-control">
    </div>

    <button type="submit" class="btn btn-outline-secondary w-100">+ Keranjang</button>
</form>

                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Belum ada menu tersedia. 😢</p>
        @endforelse
    </div>
</div>
@endsection
