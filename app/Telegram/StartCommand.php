<?php

namespace App\Telegram;

use App\Models\Sign;
use App\Models\TelegramUser;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

/**
 * Class HelpCommand.
 */
class StartCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'start';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['startcommands'];

    /**
     * @var string Command Description
     */
    protected $description = 'Начало';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $telegramChatId = Telegram::getWebhookUpdates()['message']['chat']['id'];
        $userName = Telegram::getWebhookUpdates()['message']['from']['username'] ?? $userName = '';

        $text = __("Привет $userName! Хочешь приметку на сегодня?");

        $keyboard = [
            [__('/yesterday')],
            [__('/today')],
            [__('/tomorrow')],
            [__('/help')],
            //[__('Узнать примету на конкретный день')],
        ];

        $replyMarkup = Keyboard::make([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);

        $response = Telegram::sendMessage([
            'chat_id' => $telegramChatId,
            'text' => $text,
            'reply_markup' => $replyMarkup
        ]);

        $messageId = $response->getMessageId();
    }
}
