<?php

namespace App\Telegram;

use App\helpers;
use App\Services\Superstition\SuperstitionService;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class yesterdaySuperstitionCommand extends BaseCommand
{
    /**
     * @var string Command Name
     */
    protected $name = 'yesterday';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['yesterdaySuperstitionCommand'];

    /**
     * @var string Command Description
     */
    protected $description = 'Вчерашняя примета';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $data = $this->superstitionService->searchSuperstitions(helpers::dateExtra(1, '-'));

        $text = helpers::getMessageFormatted($data, PHP_EOL);

        $this->replyWithMessage(compact('text'));
    }
}
