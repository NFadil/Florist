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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();

            // Kode unik pesanan
            $table->string('id_pemesanan')->unique();

            // Relasi
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('keranjang_id')->nullable()->constrained()->onDelete('set null');
            // Informasi Transaksi
            $table->integer('qty')->default(1);
            $table->bigInteger('total_harga');
            $table->enum('status', ['pending', 'sukses', 'batal'])->default('pending');
            $table->text('alamat_pengiriman')->nullable();
            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
