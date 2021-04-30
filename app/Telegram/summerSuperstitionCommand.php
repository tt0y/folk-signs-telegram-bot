<?php

namespace App\Telegram;

use App\helpers;
use Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class summerSuperstitionCommand extends BaseCommand
{
    /**
     * @var string Command Name
     */
    protected $name = 'summer';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['summerSuperstitionCommand'];

    /**
     * @var string Command Description
     */
    protected $description = 'Народные приметы на лето';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $data = $this->superstitionService->searchSuperstitions([
            'day' => 0,
            'month' => 6,
        ]);

        $text = helpers::getMessageFormatted($data, PHP_EOL);

        $this->replyWithMessage(compact('text'));
    }
}
