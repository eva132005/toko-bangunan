<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Bangunan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: #e9ecef;
            padding: 20px;
        }
        
        .card {
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            border: none;
        }
        
        .btn-blue {
            background: #1e3c72;
            color: white;
        }
        
        .btn-blue:hover {
            background: #2a5298;
            color: white;
        }
        
        .badge-cat {
            background: #1e3c72;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
        }
        
        .table td, .table th {
            vertical-align: middle;
        }
        
        .bg-low {
            background: #fff3cd;
        }
        
        .bg-out {
            background: #f8d7da;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-hard-hat text-primary me-2"></i>
                    <strong class="fs-4">Toko Bangunan</strong>
                </div>
                <a href="/produk/create" class="btn btn-blue btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
        </div>
        
        <div class="card-body p-0">
            @if(session('success'))
            <div class="alert alert-success m-3">
                {{ session('success') }}
            </div>
            @endif
            
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produk as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $p->nama_produk }}</strong><br>
                                <small class="text-muted">{{ $p->kategori }}</small>
                            </td>
                            <td>Rp {{ number_format($p->harga,0,',','.') }}</td>
                            <td>
                                @if($p->stok <= 0)
                                    <span class="badge bg-danger">Habis</span>
                                @elseif($p->stok <= 5)
                                    <span class="badge bg-warning text-dark">{{ $p->stok }}</span>
                                @else
                                    <span class="badge bg-success">{{ $p->stok }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="/produk/{{ $p->id }}/edit" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="/produk/{{ $p->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <i class="fas fa-box-open fa-2x text-muted mb-2 d-block"></i>
                                Belum ada produk
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>