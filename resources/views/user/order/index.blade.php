@extends('layouts.app')

@section('title', 'Riwayat Pesanan')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Riwayat Pesanan 🧾</h3>

    @if ($orders->isEmpty())
        <div class="alert alert-warning">
            Belum ada pesanan yang dibuat.
        </div>
    @else
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama Menu</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->menu->nama_menu }}</td>
                    <td>{{ $order->jumlah }}</td>
                    <td>Rp{{ number_format($order->jumlah * $order->menu->harga, 0, ',', '.') }}</td>
                    <td>
                        @if ($order->status == 'diproses')
                            <span class="badge bg-warning text-dark">Diproses</span>
                        @elseif ($order->status == 'dikirim')
                            <span class="badge bg-info text-dark">Dikirim</span>
                        @else
                            <span class="badge bg-success">Sampai</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
