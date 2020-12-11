<?php

namespace Database\Seeders;

use App\Models\TelegramUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultTelegramUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TelegramUser::create([
            'user_id'   => '75627797',
            'chat_id'   => '75627797',
            'data'   => '{}',
        ]);

        TelegramUser::create([
            'user_id'   => '75627797',
            'chat_id'   => '-1001293628226',
            'data'   => '{}',
        ]);
    }
}
