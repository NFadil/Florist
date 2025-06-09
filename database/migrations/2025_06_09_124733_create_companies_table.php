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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('slogan');
            $table->text('deskripsi');
            $table->text('visi');
            $table->text('misi');
            $table->text('about');
            $table->text('alamat');
            $table->text('email');
            $table->text('insta');
            $table->text('ytb');
            $table->text('fb');
            $table->text('telpon');
            $table->text('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
