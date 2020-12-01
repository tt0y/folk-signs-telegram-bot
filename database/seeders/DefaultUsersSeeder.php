<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'admin@primetki.ru',
            'email'             => 'admin@primetki.ru',
            'password'          => Hash::make('7bn8vrt'),
            'email_verified_at' => now(),
        ]);
    }
}
