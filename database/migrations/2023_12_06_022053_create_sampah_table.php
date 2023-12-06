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
        Schema::create('sampah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('jenis_sampah_id')->constrained(
                table: 'jenis_sampah', indexName: 'sampah_jenis_id'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->string('satuan');
            $table->double('harga', 8, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampahs');
    }
};
