@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <div class="alert alert-info">
        Hai {{ Auth::user()->name }}! Selamat datang di <strong>Kantin Ceria 🍱</strong>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Menu Makanan</h5>
                    <p class="card-text">Lihat daftar makanan dan minuman yang tersedia hari ini.</p>
                    <a href="{{ route('menu.index') }}" class="btn btn-pink">Pesan Sekarang</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Riwayat Order</h5>
                    <p class="card-text">Lihat semua pesanan yang telah kamu buat.</p>
                    <a href="{{ route('order.index') }}" class="btn btn-pink">Lihat Riwayat</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
