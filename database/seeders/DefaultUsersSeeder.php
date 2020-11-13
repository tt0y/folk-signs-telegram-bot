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
            'name'              => 'admin@thesigns.ru',
            'email'             => 'admin@thesigns.ru',
            'password'          => Hash::make('admin@thesigns.ru'),
            'email_verified_at' => now(),
        ]);
    }
}
