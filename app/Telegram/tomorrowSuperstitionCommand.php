<?php

namespace App\Telegram;

use App\helpers;
use App\Services\Superstition\SuperstitionService;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class tomorrowSuperstitionCommand extends BaseCommand
{
    /**
     * @var string Command Name
     */
    protected $name = 'tomorrow';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['tomorrowSuperstitionCommand'];

    /**
     * @var string Command Description
     */
    protected $description = 'Примета на завтра';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $data = $this->superstitionService->searchSuperstitions(helpers::dateExtra(1, '+'));

        $text = helpers::getMessageFormatted($data, PHP_EOL, true);

        $this->replyWithMessage(compact('text'));
    }
}
