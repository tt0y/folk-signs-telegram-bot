<?php

namespace App\Telegram;

use App\helpers;
use App\Models\Superstition;
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
        $superstition = new Superstition;

        $data = $superstition->find(helpers::dateExtra());

        $text = $data['name'] . PHP_EOL . $data['description'];

        $this->replyWithMessage(compact('text'));
    }
}
