<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');   // Menyimpan nama produk
            $table->integer('jumlah');       // Menyimpan jumlah produk yang terjual
            $table->decimal('harga', 15, 2); // Menyimpan harga satuan produk
            $table->decimal('total', 15, 2); // Menyimpan total (jumlah * harga)
            $table->date('tanggal');         // Menyimpan tanggal transaksi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
