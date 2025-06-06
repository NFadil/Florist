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
        Product::create([
            'nama'        => 'Buket Mawar Biru',
            'deskripsi'   => 'Buket bunga mawar merah segar untuk hadiah romantis.',
            'category_id' => 1,
            'slug'        => Str::slug('Buket Mawar Biru'),
            'stok'        => 10,
            'harga'       => 100000,
        ]);
        Product::create([
            'nama'        => 'Buket Mawar Hijau',
            'deskripsi'   => 'Buket bunga mawar merah segar untuk hadiah romantis.',
            'category_id' => 2,
            'slug'        => Str::slug('Buket Mawar Hijau'),
            'stok'        => 10,
            'harga'       => 100000,
        ]);
        Product::create([
            'nama'        => 'Buket Mawar Ungu',
            'deskripsi'   => 'Buket bunga mawar merah segar untuk hadiah romantis.',
            'category_id' => 2,
            'slug'        => Str::slug('Buket Mawar Ungu'),
            'stok'        => 10,
            'harga'       => 100000,
        ]);
    }
}
