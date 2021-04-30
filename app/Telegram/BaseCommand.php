<?php

declare(strict_types=1);

namespace App\Telegram;

use App\Services\RandomFact\RandomFactService;
use App\Services\Superstition\SuperstitionService;
use Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class BaseCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'base';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['base_command'];

    /**
     * @var string Command Description
     */
    protected $description = 'base command';

    /**
     * @var SuperstitionService
     */
    protected SuperstitionService $superstitionService;
    protected RandomFactService $randomFactService;

    /**
     * SuperstitionController constructor.
     * @param SuperstitionService $superstitionService
     * @param RandomFactService $randomFactService
     */
    public function __construct(
        SuperstitionService $superstitionService,
        RandomFactService $randomFactService
    ) {
        $this->superstitionService = $superstitionService;
        $this->randomFactService = $randomFactService;
    }

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $text = $this->description;

        $this->replyWithMessage(compact('text'));
    }
}
