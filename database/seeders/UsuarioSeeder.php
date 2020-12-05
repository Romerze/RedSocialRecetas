<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'sors',
            'email' => 'sors@sors.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://github.com/Romerze',
        ]);

        $user2 = User::create([
            'name' => 'gasper',
            'email' => 'sors1@sors.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://github.com/Romerze',
        ]);

    }
}
