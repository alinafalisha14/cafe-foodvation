@extends('rooms.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('rooms.index') }}" class="btn btn-outline-primary btn-sm">Kelola Ruangan</a>

    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
    </form>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Menu Restoran</h5>
        <a href="{{ route('menus.create') }}" class="btn btn-primary btn-sm">+ Tambah Menu</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($menus as $menu)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $menu->nama_menu }}</strong></td>
                        <td>{{ $menu->kategori }}</td>
                        <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                        <td>{{ $menu->deskripsi ?? '-' }}</td>
                        <td>
                            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data menu.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection