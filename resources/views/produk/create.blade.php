<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: #e9ecef;
            padding: 20px;
        }
        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        .btn-blue {
            background: #1e3c72;
            color: white;
        }
        .btn-blue:hover {
            background: #2a5298;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header bg-white py-3">
            <a href="/produk" class="text-decoration-none me-3">
                <i class="fas fa-arrow-left"></i>
            </a>
            <strong class="fs-4">Tambah Produk</strong>
        </div>
        <div class="card-body">
            <form action="/produk" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="">Pilih</option>
                        <option>Semen</option>
                        <option>Pasir</option>
                        <option>Batu Bata</option>
                        <option>Kayu</option>
                        <option>Cat</option>
                        <option>Paku</option>
                    </select>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-blue w-100">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>