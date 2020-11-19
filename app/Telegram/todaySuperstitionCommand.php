<?php

namespace App\Telegram;

use App\helpers;
use App\Models\Sign;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class todaySuperstitionCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'today';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['today_command'];

    /**
     * @var string Command Description
     */
    protected $description = 'Примета на сегодня';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $date = helpers::dateExtra();

        $sign = Sign::where([
            ['day', '=', $date['day']],
            ['month', '=', $date['month']],
        ])->get()->toArray();

        if (isset($sign[0]))
            $text = $sign[0]['name'] . PHP_EOL . $sign[0]['description'];
        else
            $text = __('Долгие наблюдения за природой не дали резултатов.'. PHP_EOL . 'Примет на сегодня нет');

        $this->replyWithMessage(compact('text'));
    }
}
