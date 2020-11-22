<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TelegramUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function webhook()
    {
        $telegramEvent = Telegram::getWebhookUpdates()['message'];

        $telegramUserId = $telegramEvent['from']['id'];
        $telegramChatId = $telegramEvent['chat']['id'];

        $chat_id = TelegramUser::where('chat_id', '=', $telegramChatId)->get()->toArray();

        if (!isset($chat_id) || empty($chat_id))

            TelegramUser::create([
                'user_id' => $telegramUserId,
                'chat_id' => $telegramChatId,
                'data' => Telegram::getWebhookUpdates(),
            ]);

        Telegram::commandsHandler(true);
    }
}
