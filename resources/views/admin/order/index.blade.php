@extends('layouts.layout')

@section('title', 'Daftar Order')

@section('content')
<h2>Daftar Order Masuk</h2>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Pemesan</th>
            <th>Status</th>
            <th>Ubah Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->menu->nama_menu }}</td>
            <td>{{ $order->jumlah }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->status }}</td>
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
        @endforeach
    </tbody>
</table>
@endsection
