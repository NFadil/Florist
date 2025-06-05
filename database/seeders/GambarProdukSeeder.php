<?php
namespace Database\Seeders;

use App\Models\Gambar_Produk;
use Illuminate\Database\Seeder;

class GambarProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gambar_Produk::create([
            'produk_id' => 1,
            'gambar'    => 'bunga.webp',
        ]);

        Gambar_Produk::create([
            'produk_id' => 1,
            'gambar'    => 'bunga2.png',
        ]);
    }
}
