<?php

namespace App\Telegram;

use App\helpers;
use App\Services\Superstition\SuperstitionService;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class winterSuperstitionCommand extends BaseCommand
{
    /**
     * @var string Command Name
     */
    protected $name = 'winter';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['winterSuperstitionCommand'];

    /**
     * @var string Command Description
     */
    protected $description = 'Народные приметы на зиму';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $data = $this->superstitionService->searchSuperstitions([
            'day'   => 0,
            'month' => 12,
        ]);

        $text = helpers::getMessageFormatted($data, PHP_EOL);

        $this->replyWithMessage(compact('text'));
    }
}
