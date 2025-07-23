@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid px-0">
   <!-- Hero Section -->
<div class="hero-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <!-- Gambar di Kiri -->
            <div class="col-lg-6 mb-4 mb-lg-0 text-center">
                <img src="{{ asset('images/kantin.jpg') }}" alt="Ilustrasi Kantin Ceria" class="img-fluid rounded shadow-lg" style="max-height: 400px;">
                <p class="mt-3 text-muted">Ilustrasi Kantin Ceria 🍱</p>
            </div>

            <!-- Konten Hero di Kanan -->
            <div class="col-lg-6">
                <h1 class="display-4 font-weight-bold mb-4">
                    Pesan, Nikmati, Bayar <span class="text-muted">dengan</span> Mudah<br>
                    Makanan & Minuman Segar
                </h1>
                <p class="lead text-muted mb-4">
                    Temukan berbagai pilihan makanan dan minuman lezat di Kantin Ceria. Pesan sekarang dan nikmati layanan cepat, harga terjangkau, serta cita rasa yang tak terlupakan.
                </p>

                <!-- Tombol Kategori -->
                <!-- <div class="action-buttons mb-4">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <button class="btn btn-outline-danger btn-lg btn-block py-3 w-100">
                                <i class="fas fa-utensils me-2"></i> Makanan
                            </button>
                        </div>
                        <div class="col-md-4 mb-2">
                            <button class="btn btn-outline-info btn-lg btn-block py-3 w-100">
                                <i class="fas fa-coffee me-2"></i> Minuman
                            </button>
                        </div>
                        <div class="col-md-4 mb-2">
                            <button class="btn btn-outline-warning btn-lg btn-block py-3 w-100">
                                <i class="fas fa-birthday-cake me-2"></i> Snack
                            </button>
                        </div>
                    </div>
                </div> -->

                <!-- CTA -->
                <a href="{{ route('menu.index') }}" class="btn btn-pink btn-lg px-5 py-3">
                    <i class="fas fa-shopping-cart me-2"></i> Pesan Sekarang
                </a>
            </div>
        </div>
    </div>
</div>
   <!-- Sambutan Cantik dengan Warna Pink Tua yang Sama -->
<div class="container my-4">
    <div class="card border-0 shadow-sm" style="background-color: #c11a62; border-radius: 1rem;">
        <div class="card-body text-center py-4 text-white">
            <h4 class="mb-1">
                <i class="fa-solid fa-user"></i>
                Hai, <strong>{{ Auth::user()->name }}</strong>! 👋
            </h4>
            <p class="mb-0">Selamat datang di <strong>Kantin Ceria 🍱</strong></p>
        </div>
    </div>
</div>


    <!-- Layanan -->
    <div class="services-section py-5">
        <div class="container text-center">
            <h2 class="section-title">Layanan Kami</h2>
            <p class="text-muted mb-5">Pilih menu favorit Anda dan nikmati pengalaman kuliner yang menyenangkan</p>

            <div class="row justify-content-center">
                <!-- Makanan -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <i class="fas fa-utensils fa-3x text-danger mb-3"></i>
                            <h5 class="card-title">Menu Makanan</h5>
                            <p class="text-muted">Beragam pilihan makanan lezat & bergizi.</p>
                            <a href="{{ route('menu.index') }}" class="btn btn-danger">Lihat Menu</a>
                        </div>
                    </div>
                </div>

                <!-- Riwayat -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <i class="fas fa-history fa-3x text-pink mb-3"></i>
                            <h5 class="card-title">Riwayat Order</h5>
                            <p class="text-muted">Cek kembali semua pesanan Anda.</p>
                            <a href="{{ route('order.index') }}" class="btn btn-pink">Lihat Riwayat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fitur Unggulan -->
    <div class="features-section py-5 bg-light text-center">
        <div class="container">
            <h2 class="section-title mb-5">Mengapa Memilih Kantin Ceria?</h2>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <i class="fas fa-clock fa-2x text-success mb-2"></i>
                    <h5>Layanan Cepat</h5>
                    <p class="text-muted">Pesanan diproses cepat & tepat waktu</p>
                </div>
                <div class="col-md-3 mb-4">
                    <i class="fas fa-dollar-sign fa-2x text-warning mb-2"></i>
                    <h5>Harga Terjangkau</h5>
                    <p class="text-muted">Cocok untuk kantong pelajar</p>
                </div>
                <div class="col-md-3 mb-4">
                    <i class="fas fa-heart fa-2x text-danger mb-2"></i>
                    <h5>Rasa Terbaik</h5>
                    <p class="text-muted">Cita rasa lezat & selalu fresh</p>
                </div>
                <div class="col-md-3 mb-4">
                    <i class="fas fa-star fa-2x text-pink mb-2"></i>
                    <h5>Desain Imut</h5>
                    <p class="text-muted">Tampilan yang bikin betah & lucu 💖</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
