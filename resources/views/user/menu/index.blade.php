@extends('layouts.app')

@section('title', 'Menu Makanan')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Menu Hari Ini 🍜</h3>
    <div class="row">
        @forelse ($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $menu->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $menu->nama_menu }}</h5>
                        <p class="card-text">Rp{{ number_format($menu->harga, 0, ',', '.') }}</p>
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                            <input type="number" name="jumlah" value="1" min="1" class="form-control mb-2">
                            <button type="submit" class="btn btn-pink">Pesan</button>
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
