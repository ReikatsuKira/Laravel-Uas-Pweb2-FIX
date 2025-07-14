@extends('layouts.layout')

@section('title', 'Daftar Menu')



@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Kelola Menu</h2>
    <div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary me-2">
            <i class="bi bi-house-door-fill"></i> Dashboard
        </a>
        <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Menu
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Gambar</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($menus as $menu)
                <tr>
                    <td>
                        @if ($menu->gambar)
                            <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama_menu }}" class="img-thumbnail" width="80">
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>{{ $menu->nama_menu }}</td>
                    <td>Rp{{ number_format($menu->harga, 0, ',', '.') }}</td>
                    <td>{{ $menu->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ $menu->deskripsi }}</td>
                    <td>
                        <a href="{{ route('admin.menu.show', $menu->id) }}" class="btn btn-info btn-sm mb-1">
                            <i class="bi bi-eye"></i> Detail
                        </a>
                        <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-warning btn-sm mb-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada menu yang ditambahkan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
