@extends('layouts.app')

@section('title', 'Menu Makanan')

@section('content')
<div class="container mt-4">
    <a href="{{ url('home') }}" class="btn btn-back mb-3">← Kembali</a>
    <h3 class="mb-4 text-center">Menu Hari Ini 🍜</h3>


    <div class="row">
        @forelse ($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="{{ asset('storage/' . $menu->gambar) }}" class="card-img-top rounded-top" style="height: 200px; object-fit: scale-down;">
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title mb-1">{{ $menu->nama_menu }}</h5>
                        <small class="text-muted mb-2">Kategori: {{ $menu->kategori->nama_kategori ?? '-' }}</small>
                        <p class="card-text fw-bold mb-3">Rp{{ number_format($menu->harga, 0, ',', '.') }}</p>

                        <form action="{{ route('order.store') }}" method="POST" class="mt-auto">
                            @csrf
                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                            <input type="number" name="jumlah" value="1" min="1" class="form-control mb-2" style="max-width: 100px; margin: 0 auto;">
                            <button type="submit" class="btn btn-pink w-100">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Belum ada menu tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
