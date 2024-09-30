<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Transaksi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
        }
        .sidebar {
            height: 100vh;
            background-color: #1d1f21;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 15px;
            display: block;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background-color: #343a40;
        }
        .sidebar .active {
            background-color: #17a2b8;
        }
        .content {
            padding: 20px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table th {
            background-color: #343a40;
            color: white;
        }
        .table td {
            vertical-align: middle;
        }
        .header {
            background-color: #17a2b8;
            padding: 15px;
            color: white;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar">
                <h4 class="text-center text-light mb-4">Kasir App</h4>
                <a href="{{ route('dashboard') }}"><i class="fas fa-home me-2"></i> Dashboard</a>
                <a href="{{ route('transaksi') }}" class="active"><i class="fas fa-shopping-cart me-2"></i> Transaksi</a>
                <a href="{{ route('laporan-penjualan') }}"><i class="fas fa-file-alt me-2"></i> Laporan Penjualan</a>
                <a href="{{ route('manajemen-produk') }}"><i class="fas fa-boxes me-2"></i> Manajemen Produk</a>
                <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
            </nav>

            <!-- Main Content -->
            <div class="col-md-10 content">
                <div class="header">
                    <h2>Halaman Transaksi</h2>
                </div>

                <!-- Input Data Transaksi -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('transaksi') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="namaProduk" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" id="namaProduk" name="nama_produk" placeholder="Masukkan nama produk" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlahProduk" class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" id="jumlahProduk" name="jumlah" placeholder="Masukkan jumlah produk" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="hargaProduk" class="form-label">Harga Satuan</label>
                                        <input type="text" class="form-control" id="hargaProduk" name="harga" placeholder="Masukkan harga produk" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Tambah ke Keranjang</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Keranjang Belanja -->
                    <div class="col-md-6">
                        <h4 class="mb-3">Keranjang Belanja</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksis as $key => $transaksi)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $transaksi->nama_produk }}</td>
                                    <td>{{ $transaksi->jumlah }}</td>
                                    <td>{{ $transaksi->harga }}</td>
                                    <td>{{ $transaksi->total }}</td>
                                    <td>
                                        <form action="{{ route('transaksi', $transaksi->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Ringkasan dan Tombol Checkout -->
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5>Ringkasan Transaksi</h5>
                                <ul class="list-group">
                                    <li class="list-group-item">Total Barang: {{ $totalItems }}</li>
                                    <li class="list-group-item">Total Harga: Rp {{ number_format($totalPrice, 0, ',', '.') }}</li>
                                </ul>
                                <button class="btn btn-primary mt-3">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
