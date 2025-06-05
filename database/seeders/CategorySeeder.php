<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'   => 'Buket Bunga',
            'gambar' => 'teddy-bear.png',
            'slug'   => Str::slug('Buket Bunga'),
        ]);

        Category::create([
            'name'   => 'Tanaman Hias',
            'gambar' => 'bouquet.png',
            'slug'   => Str::slug('Tanaman Hias'),
        ]);
    }
}
