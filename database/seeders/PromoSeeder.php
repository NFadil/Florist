<?php
namespace Database\Seeders;

use App\Models\promo;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        promo::create([
            'title'     => 'Promo BUY 1 GET 1',
            'deskripsi' => 'Promo berlaku hingga 30 September 2025',
            'banner'    => 'b12.webp',
        ]);
        promo::create([
            'title'     => 'Promo BUY 1 GET 1',
            'deskripsi' => 'Promo berlaku hingga 30 September 2025',
            'banner'    => 's.png',
        ]);
        promo::create([
            'title'     => 'Promo Diskon 12% ',
            'deskripsi' => 'Promo berlaku hingga 30 September 2025',
            'banner'    => 'bunga.webp',
        ]);
    }
}
