<?php

namespace App\Telegram;

use App\helpers;
use Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class autumnSuperstitionCommand extends BaseCommand
{
    /**
     * @var string Command Name
     */
    protected $name = 'autumn';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['autumnSuperstitionCommand'];

    /**
     * @var string Command Description
     */
    protected $description = 'Народные приметы на осень';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $data = $this->superstitionService->searchSuperstitions([
            'day' => 0,
            'month' => 9,
        ]);

        $text = helpers::getMessageFormatted($data, PHP_EOL);

        $this->replyWithMessage(compact('text'));
    }
}
