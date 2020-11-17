<?php

namespace App\Telegram;

use App\Models\Sign;
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
        $telegramChatId = Telegram::getWebhookUpdates()['message']['from']['id'];
        $userName = Telegram::getWebhookUpdates()['message']['from']['username'];

        $text = __("Привет $userName! Хочешь приметку на сегодня? Жми --> /sign");

        $keyboard = [
            [__('Расскажи, что было вчера')],
            [__('А сегодня?')],
            [__('Ну а завтра?')],
        ];

        $replyMarkup = Keyboard::make([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);
//        //Log::error();

        $response = Telegram::sendMessage([
            'chat_id' => $telegramChatId,
            'text' => 'Hello World',
            'reply_markup' => $replyMarkup
        ]);

        $messageId = $response->getMessageId();

        $this->replyWithMessage(compact('text'));
    }
}
