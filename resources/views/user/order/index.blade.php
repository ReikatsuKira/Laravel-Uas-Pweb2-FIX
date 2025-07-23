@extends('layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .riwayat-wrapper {
        background-color: rgba(255, 255, 255, 0.95);
        padding: 30px;
        border-radius: 25px;
        box-shadow: 0 10px 30px rgba(255, 105, 180, 0.3);
        animation: float 2.5s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    h3 {
        color: #d63384;
        font-weight: bold;
        margin-bottom: 25px;
        text-align: center;
    }

    .table thead {
        background-color: #ffd1dc;
        color: #b63b6c;
    }

    .table td, .table th {
        vertical-align: middle;
    }

    .badge {
        font-size: 0.9rem;
        padding: 6px 12px;
        border-radius: 12px;
    }

    .btn-back {
        background-color: #ff69b4;
        color: white;
        font-weight: bold;
        padding: 8px 20px;
        border-radius: 30px;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s ease;
    }

    .btn-back:hover {
        background-color: #ff4081;
        box-shadow: 0 4px 12px rgba(255, 105, 180, 0.3);
        transform: scale(1.05);
    }

    .emoji-title {
        font-size: 1.8rem;
        animation: bounce 1.5s infinite;
        display: inline-block;
        margin-right: 8px;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
</style>

<div class="container py-4">
    <div class="riwayat-wrapper">
        <h3><span class="emoji-title">🧾</span> Riwayat Pesanan Kamu</h3>

        @if ($orders->isEmpty())
            <div class="alert alert-warning text-center">
                Belum ada pesanan yang dibuat. Yuk pesan makanan dulu! 🍱✨
            </div>
        @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="text-center">
                    <tr>
                        <th>📅 Tanggal</th>
                        <th>🍽️ Nama Menu</th>
                        <th>🔢 Jumlah</th>
                        <th>💰 Total Harga</th>
                        <th>📦 Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        @foreach ($order->orderItems as $item)
                            <tr class="text-center">
                                <td>{{ \Carbon\Carbon::parse($order->tanggal)->format('d M Y') }}</td>
                                <td>{{ optional($item->menu)->nama_menu ?? 'Menu tidak tersedia' }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td><strong>Rp{{ number_format($item->jumlah * ($item->menu->harga ?? 0), 0, ',', '.') }}</strong></td>
                                <td>
                                    @if ($order->status == 'diproses')
                                        <span class="badge bg-warning text-dark">⏳ Diproses</span>
                                    @elseif ($order->status == 'dikirim')
                                        <span class="badge bg-info text-dark">🚚 Dikirim</span>
                                    @else
                                        <span class="badge bg-success">✅ Sampai</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="btn-back">← Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection
