<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Menu - FOODVATION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="mb-4">Edit Menu</h3>
                <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Menu</label>
                        <input type="text" name="nama_menu" value="{{ $menu->nama_menu }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="text" name="kategori" value="{{ $menu->kategori }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="harga" value="{{ $menu->harga }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3">{{ $menu->deskripsi }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Perbarui Menu</button>
                    <a href="{{ route('menus.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>