<?php

namespace App\Telegram;

use App\helpers;
use Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class springSuperstitionCommand extends BaseCommand
{
    /**
     * @var string Command Name
     */
    protected $name = 'spring';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['springSuperstitionCommand'];

    /**
     * @var string Command Description
     */
    protected $description = 'Народные приметы на весну';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $data = $this->superstitionService->searchSuperstitions([
            'day' => 0,
            'month' => 3,
        ]);

        $text = helpers::getMessageFormatted($data, PHP_EOL);

        $this->replyWithMessage(compact('text'));
    }
}
