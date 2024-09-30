<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    // Tampilkan halaman transaksi
    public function index()
    {
        // Ambil semua transaksi
        $transaksis = Transaksi::all();

        // Hitung total item dan total harga
        $totalItems = $transaksis->sum('jumlah');
        $totalPrice = $transaksis->sum(function($transaksi) {
            return $transaksi->jumlah * $transaksi->harga;
        });

        // Return ke view dengan data transaksi, total barang, dan total harga
        return view('transaksi', [
            'transaksis' => $transaksis,
            'totalItems' => $totalItems,
            'totalPrice' => $totalPrice
        ]);
    }

    // Simpan data transaksi ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
        ]);

        // Hitung total harga
        $total = $request->jumlah * $request->harga;

        // Simpan transaksi ke database
        Transaksi::create([
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total' => $total,
        ]);

        return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan!');
    }

    // Hapus transaksi dari database
    public function destroy($id)
    {
        try {
            // Cari transaksi berdasarkan ID dan hapus
            $transaksi = Transaksi::findOrFail($id);
            $transaksi->delete();

            return redirect()->back()->with('success', 'Transaksi berhasil dihapus!');
        } catch (\Exception $e) {
            // Log error atau tangani error jika diperlukan
            return redirect()->back()->with('error', 'Gagal menghapus transaksi!');
        }
    }
}
