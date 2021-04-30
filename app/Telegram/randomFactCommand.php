<?php

namespace App\Telegram;

use Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class randomFactCommand extends BaseCommand
{
    /**
     * @var string Command Name
     */
    protected $name = 'random';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['randomFactCommand'];

    /**
     * @var string Command Description
     */
    protected $description = 'Случайный факт';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $data = $this->randomFactService->getRandomFact();

        $text = $data['description'];

        $this->replyWithMessage(compact('text'));
    }
}
