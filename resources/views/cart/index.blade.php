@extends('layouts.app')

@section('title', 'Keranjang')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">🛒 Keranjang Saya</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(empty($cart))
        <div class="alert alert-warning">
            Keranjang kosong. Silakan tambahkan menu terlebih dahulu.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
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
                        <tr>
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
                <tr class="table-light">
                    <td colspan="3" class="text-end"><strong>Total</strong></td>
                    <td colspan="2"><strong>Rp{{ number_format($grandTotal, 0, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>

        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button class="btn btn-success">Checkout Sekarang</button>
        </form>
    @endif
</div>
@endsection
