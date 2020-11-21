<?php

namespace App\Telegram;

use App\helpers;
use App\Services\Superstition\SuperstitionService;
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
     * @var SuperstitionService
     */
    protected SuperstitionService $superstitionService;

    /**
     * SuperstitionController constructor.
     * @param SuperstitionService $superstitionService
     */
    public function __construct(
        SuperstitionService $superstitionService
    )
    {
        $this->superstitionService = $superstitionService;
    }

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $data = $this->superstitionService->searchSuperstitions(helpers::dateExtra());

        $text = $data['name'] . PHP_EOL . $data['description'];

        $this->replyWithMessage(compact('text'));
    }
}
