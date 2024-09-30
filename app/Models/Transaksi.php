<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model
    protected $table = 'transaksis';

    // Kolom-kolom yang dapat diisi massal
    protected $fillable = [
        'nama_produk',
        'jumlah',
        'harga',
        'total',
    ];

    // Jika ingin mengatur format timestamp atau format lainnya, dapat ditambahkan di sini
    public $timestamps = true;
}
