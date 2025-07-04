<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'role'     => 'admin',
            'password' => Hash::make('password123'),
        ]);
        User::create([
            'name'     => 'Aku',
            'email'    => 'aku@example.com',
            'role'     => 'customer',
            'password' => Hash::make('password123'),
        ]);
        User::create([
            'name'     => 'me',
            'email'    => 'me@example.com',
            'role'     => 'customer',
            'password' => Hash::make('password123'),
        ]);
    }
}
