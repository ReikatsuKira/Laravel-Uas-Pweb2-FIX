@extends('layouts.app')

@section('title', 'Selamat Datang di Kantin Ceria')

@section('content')
<div class="container-fluid px-0">
   <!-- Hero Section -->
   <div class="hero-section py-5 bg-light">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0 text-center">
               <img src="{{ asset('images/kantin.jpg') }}" alt="Ilustrasi Kantin Ceria" class="img-fluid rounded shadow-lg" style="max-height: 400px;">
               <p class="mt-3 text-muted">Ilustrasi Kantin Ceria 🍱</p>
            </div>

            <div class="col-lg-6">
               <h1 class="display-4 font-weight-bold mb-4">
                  Pesan, Nikmati, Bayar <span class="text-muted">dengan</span> Mudah<br>
                  Makanan & Minuman Segar
               </h1>
               <p class="lead text-muted mb-4">
                  Temukan berbagai pilihan makanan dan minuman lezat di Kantin Ceria. Login dulu ya untuk mulai memesan! 😋
               </p>

               <!-- CTA -->
               <a href="{{ route('login') }}" class="btn btn-pink btn-lg px-5 py-3">
                  <i class="fas fa-sign-in-alt me-2"></i> Login untuk Pesan
               </a>
            </div>
         </div>
      </div>
   </div>

   <!-- Info Sambutan -->
   <div class="container my-4">
      <div class="card border-0 shadow-sm" style="background-color: #c11a62; border-radius: 1rem;">
         <div class="card-body text-center py-4 text-white">
            <h4 class="mb-1">
               <i class="fas fa-user-circle me-2"></i>
               Selamat Datang di <strong>Kantin Ceria 🍱</strong>
            </h4>
            <p class="mb-0">Silakan login untuk menikmati layanan kami!</p>
         </div>
      </div>
   </div>

   <!-- Layanan -->
   <div class="services-section py-5">
      <div class="container text-center">
         <h2 class="section-title">Layanan Kami</h2>
         <p class="text-muted mb-5">Pilih menu favorit Anda dan nikmati pengalaman kuliner yang menyenangkan</p>

         <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
               <div class="card shadow-sm h-100">
                  <div class="card-body">
                     <i class="fas fa-utensils fa-3x text-danger mb-3"></i>
                     <h5 class="card-title">Menu Makanan</h5>
                     <p class="text-muted">Beragam pilihan makanan lezat & bergizi.</p>
                     <a href="{{ route('login') }}" class="btn btn-danger">Login untuk Lihat Menu</a>
                  </div>
               </div>
            </div>
            <div class="col-md-4 mb-4">
               <div class="card shadow-sm h-100">
                  <div class="card-body">
                     <i class="fas fa-history fa-3x text-pink mb-3"></i>
                     <h5 class="card-title">Riwayat Order</h5>
                     <p class="text-muted">Cek kembali semua pesanan Anda setelah login.</p>
                     <a href="{{ route('login') }}" class="btn btn-pink">Login untuk Melihat</a>
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
