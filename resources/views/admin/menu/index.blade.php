@extends('layouts.layout')

@section('title', 'Daftar Menu')

@section('content')
<h2>Kelola Menu</h2>
<a href="{{ route('admin.menu.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($menus as $menu)
        <tr>
            <td>{{ $menu->nama_menu }}</td>
            <td>Rp{{ number_format($menu->harga, 0, ',', '.') }}</td>
            <td>{{ $menu->deskripsi }}</td>
            <td>
                @if ($menu->gambar)
                    <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama_menu }}" width="80">
                @else
                    Tidak ada gambar
                @endif
            </td>
            <td>
                <a href="{{ route('admin.menu.show', $menu->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus menu?')">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
