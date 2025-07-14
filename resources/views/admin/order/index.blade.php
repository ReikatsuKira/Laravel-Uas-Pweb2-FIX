@extends('layouts.layout')

@section('title', 'Daftar Order')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Daftar Order Masuk</h2>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
        <i class="bi bi-house-door-fill"></i> Dashboard
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Pemesan</th>
                <th>Status</th>
                <th>Ubah Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $order->menu->nama_menu }}</td>
                    <td>{{ $order->jumlah }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>
                        @php
                            $badgeClass = match($order->status) {
                                'diproses' => 'badge bg-warning',
                                'dikirim' => 'badge bg-info text-dark',
                                'sampai' => 'badge bg-success',
                                default => 'badge bg-secondary'
                            };
                        @endphp
                        <span class="{{ $badgeClass }}">
                            <i class="bi bi-circle-fill me-1"></i>{{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.order.updateStatus', $order) }}">
                            @csrf
                            <select name="status" onchange="this.form.submit()" class="form-select">
                                <option value="diproses" {{ $order->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="dikirim" {{ $order->status === 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                <option value="sampai" {{ $order->status === 'sampai' ? 'selected' : '' }}>Sampai</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada order masuk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
