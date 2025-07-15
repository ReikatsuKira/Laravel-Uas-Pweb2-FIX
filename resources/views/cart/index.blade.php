@extends('layouts.app')

@section('title', 'Keranjang')

@section('content')
<style>
    body {
        background: url('{{ asset('menu/kantin-bg.png.jpeg') }}') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    .cart-wrapper {
        background-color: rgba(255, 255, 255, 0.95);
        padding: 40px;
        border-radius: 25px;
        box-shadow: 0 8px 24px rgba(255, 105, 180, 0.3);
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-6px); }
    }

    h2 {
        color: #d63384;
        font-weight: bold;
        margin-bottom: 30px;
        text-align: center;
        animation: bounce 1.5s infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    .table thead {
        background-color: #ffd1dc;
        color: #b63b6c;
    }

    .btn-danger {
        background-color: #ff6b81;
        border: none;
    }

    .btn-danger:hover {
        background-color: #ff4d6d;
    }

    .btn-success {
        background-color: #ff69b4;
        border: none;
        font-weight: bold;
        padding: 10px 24px;
        border-radius: 30px;
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        background-color: #ff4081;
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(255, 105, 180, 0.4);
    }

    .total-row {
        background-color: #ffeef3;
        font-weight: bold;
        color: #b63b6c;
    }

    .emoji-cart {
        font-size: 2rem;
        margin-bottom: 10px;
        display: inline-block;
    }
</style>

<div class="container py-5">
    <div class="cart-wrapper">
        <h2><span class="emoji-cart">🛒</span> Keranjang Pesanan Kamu</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        @if(empty($cart))
            <div class="alert alert-warning text-center">
                Keranjang masih kosong 😢 Yuk pilih menu favoritmu dulu!
            </div>
        @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="text-center">
                    <tr>
                        <th>🍽️ Menu</th>
                        <th>💰 Harga</th>
                        <th>🔢 Jumlah</th>
                        <th>📊 Subtotal</th>
                        <th>❌ Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach($cart as $id => $item)
                        @if(!empty($id))
                            @php
                                $subTotal = $item['price'] * $item['quantity'];
                                $grandTotal += $subTotal;
                            @endphp
                            <tr class="text-center">
                                <td>{{ $item['name'] }}</td>
                                <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>Rp{{ number_format($subTotal, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', ['id' => $id]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus item ini?')">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    <tr class="total-row text-center">
                        <td colspan="3">Total</td>
                        <td colspan="2">Rp{{ number_format($grandTotal, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <button class="btn btn-success">✅ Checkout Sekarang</button>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection
