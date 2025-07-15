@extends('layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">📦 Daftar Pesanan Saya</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($orders->isEmpty())
        <div class="alert alert-warning">Belum ada pesanan.</div>
    @else
        @foreach($orders as $order)
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-light">
                    <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($order->tanggal)->format('d M Y') }}<br>
                    <strong>Status:</strong> 
                    <span class="badge bg-{{ $order->status == 'diproses' ? 'warning' : ($order->status == 'dikirim' ? 'info' : 'success') }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->menu->nama_menu ?? '-' }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-end">
                    <strong>Total: Rp{{ number_format($order->total, 0, ',', '.') }}</strong>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
