<?php
namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'nama'        => 'Buket Mawar Merah',
            'deskripsi'   => 'Buket bunga mawar merah segar untuk hadiah romantis.',
            'category_id' => 1,
            'slug'        => Str::slug('Buket Mawar Merah'),
            'stok'        => 10,
            'harga'       => 100000,
        ]);
    }
}
