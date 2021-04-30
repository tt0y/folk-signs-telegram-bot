<?php

namespace App\Telegram;

use App\helpers;
use Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class todaySuperstitionCommand extends BaseCommand
{
    /**
     * @var string Command Name
     */
    protected $name = 'today';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['todaySuperstitionCommand'];

    /**
     * @var string Command Description
     */
    protected $description = 'Примета на сегодня';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $data = $this->superstitionService->searchSuperstitions(helpers::dateExtra());

        $text = helpers::getMessageFormatted($data, PHP_EOL);

        $this->replyWithMessage(compact('text'));
    }
}
