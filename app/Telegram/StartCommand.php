<?php

namespace App\Telegram;

use App\Models\Sign;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

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
        $text = 'Привет! Хочешь приметку на сегодня? Жми --> /sign';

//        $keyboard = [
//            ['7', '8', '9'],
//            ['4', '5', '6'],
//            ['1', '2', '3'],
//            ['0']
//        ];
//
//        $reply_markup = \Telegram::replyKeyboardMarkup([
//            'keyboard' => $keyboard,
//            'resize_keyboard' => true,
//            'one_time_keyboard' => true
//        ]);
//
//        $response = \Telegram::sendMessage([
//            'chat_id' => 'CHAT_ID',
//            'text' => 'Hello World',
//            'reply_markup' => $reply_markup
//        ]);
//
//        $messageId = $response->getMessageId();

        $this->replyWithMessage(compact('text'));
    }
}
