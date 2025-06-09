<?php
namespace Database\Seeders;

use App\Models\galery;
use Illuminate\Database\Seeder;

class GalerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        galery::create([
            'title'  => '.Floris',
            'gambar' => 'cherry-blossom.png',
        ]);
        galery::create([
            'title'  => '.Floris',
            'gambar' => 'b12.webp',
        ]);
        galery::create([
            'title'  => '.Floris',
            'gambar' => 'cherry-blossom.png',
        ]);
        galery::create([
            'title'  => '.Floris',
            'gambar' => 'b12.webp',
        ]);
        galery::create([
            'title'  => '.Floris',
            'gambar' => 'cherry-blossom.png',
        ]);
    }
}
