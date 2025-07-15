@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-pink-100 flex flex-col items-center p-6">
    <div class="w-full max-w-4xl">
        <div class="bg-blue-100 text-blue-900 p-4 rounded mb-6 shadow">
            Hai <strong>User Kantin</strong>! Selamat datang di <strong>Kantin Ceria</strong> 🍱
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Menu Makanan -->
            <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-xl transition">
                <h2 class="text-pink-600 font-bold text-xl mb-2">Menu Makanan</h2>
                <p class="text-gray-700 mb-4">Lihat daftar makanan dan minuman yang tersedia hari ini.</p>
                <a href="{{ route('menu.index') }}" class="bg-pink-400 hover:bg-pink-500 text-white font-semibold py-2 px-4 rounded">
                    Pesan Sekarang
                </a>
            </div>

            <!-- Riwayat Order -->
            <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-xl transition">
                <h2 class="text-pink-600 font-bold text-xl mb-2">Riwayat Order</h2>
                <p class="text-gray-700 mb-4">Lihat semua pesanan yang telah kamu buat.</p>
                <a href="{{ route('orders.history') }}" class="bg-pink-400 hover:bg-pink-500 text-white font-semibold py-2 px-4 rounded">
                    Lihat Riwayat
                </a>
            </div>
        </div>
    </div>
</div>
@endsection