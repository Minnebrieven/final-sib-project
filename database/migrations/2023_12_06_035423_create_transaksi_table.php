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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'user_transaksi_id'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->enum('tipe_transaksi', ['jual', 'beli']);
            $table->foreignId('metode_pembayaran_id')->constrained(
                table: 'metode_pembayaran', indexName: 'transaksi_metode_pembayaran_id'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status_bayar', ['belum', 'sudah']);
            $table->double('total_harga', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
