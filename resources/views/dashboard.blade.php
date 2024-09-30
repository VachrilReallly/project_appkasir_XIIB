<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir</title>
    <!-- Tambahkan font dan icon -->
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
                <a href="{{ route('dashboard') }}" class="active"><i class="fas fa-home me-2"></i> Dashboard</a>
                <a href="{{ route('transaksi') }}"><i class="fas fa-shopping-cart me-2"></i> Transaksi</a>
                <a href="{{ route('laporan-penjualan') }}"><i class="fas fa-file-alt me-2"></i> Laporan Penjualan</a>
                <a href="{{ route('manajemen-produk') }}"><i class="fas fa-boxes me-2"></i> Manajemen Produk</a>
                <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
            </nav>
           
            <!-- Main Content -->
            <div class="col-md-10 content">
                <div class="header">
                    <h2>Halo, Selamat datang di Dashboard Kasir</h2>
                </div>
                
    <div class="card mt-3">
      <ul class="list-group list-group-flush">
        @if (Auth::user()->role == 'operator')
        <li class="list-group-item">Menu Operator</li>
        @endif
        @if (Auth::user()->role == 'keuangan')
        <li class="list-group-item">Menu Keuangan</li>
        @endif
        @if (Auth::user()->role == 'marketing')
        <li class="list-group-item">Menu Marketing</li>
        @endif
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="fas fa-money-bill-wave fa-3x text-success mb-3"></i>
                                <h5 class="card-title">Total Penjualan Hari Ini</h5>
                                <p class="card-text">Rp 1.000.000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="fas fa-receipt fa-3x text-info mb-3"></i>
                                <h5 class="card-title">Jumlah Transaksi</h5>
                                <p class="card-text">50 Transaksi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="fas fa-box fa-3x text-warning mb-3"></i>
                                <h5 class="card-title">Stok Produk Habis</h5>
                                <p class="card-text">5 Produk</p>
                            </div>
                        </div>
                    </div>
                </div>

               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
