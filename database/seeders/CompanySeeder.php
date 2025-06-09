<?php
namespace Database\Seeders;

use App\Models\company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        company::create([
            'nama'      => '.Floris',
            'slogan'    => 'Butuh hadiah yang bikin senyum mekar?',
            'deskripsi' => 'Bunga bukan hanya hadiah, tapi cara manis menyampaikan rasa. Buket kami hadir dengan tampilan elegan, wangi segar, dan sentuhan personal di setiap rangkaiannya.',
            'visi'      => 'Menjadi toko bunga terpercaya dan inspiratif yang menghadirkan kebahagiaan melalui rangkaian buket penuh makna.',
            'misi'      => '<li>Menyediakan buket bunga berkualitas tinggi & kreatif.</li>
                            <li>Melayani pelanggan dengan sepenuh hati.</li>
                            <li>Mendukung momen istimewa pelanggan dengan produk bermakna.</li>',
            'about'     => 'Kami adalah tim kreatif yang berdedikasi menghadirkan buket bunga yang tak hanya indah secara visual, tetapi juga mengandung cerita. Dengan semangat dan cinta pada seni merangkai, kami hadir untuk membuat setiap pemberian bunga jadi lebih bermakna.',
            'alamat'    => 'Jl. Mawar No. 123
                            Bandung, Jawa Barat 40123
                            Indonesia',
            'email'     => 'info@floris.id',
            'insta'     => 'https://www.instagram.com/_fadil.wr/',
            'ytb'       => 'https://www.instagram.com/_fadil.wr/',
            'fb'        => 'https://www.instagram.com/_fadil.wr/',
            'telpon'    => '081910214575',
            'logo'      => 'cherry-blossom.png',
        ]);
    }
}
