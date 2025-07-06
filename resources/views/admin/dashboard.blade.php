@extends('layouts.layout')

@section('title', 'Dashboard Admin')

@section('content')
<div class="alert alert-success">
    Selamat datang, {{ Auth::user()->name }}! Anda login sebagai <strong>Admin</strong>.
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card border-info">
            <div class="card-body">
                <h5 class="card-title">Kelola Menu</h5>
                <p class="card-text">Tambah, ubah, atau hapus daftar makanan/minuman.</p>
                <a href="{{ route('admin.menu.index') }}" class="btn btn-info">Lihat Menu</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card border-warning">
            <div class="card-body">
                <h5 class="card-title">Lihat Orderan</h5>
                <p class="card-text">Pantau pesanan pelanggan yang masuk.</p>
                <a href="{{ route('admin.order.index') }}" class="btn btn-warning">Lihat Order</a>
            </div>
        </div>
    </div>
</div>
@endsection
