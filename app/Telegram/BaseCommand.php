<?php
declare(strict_types=1);

namespace App\Telegram;

use App\helpers;
use App\Services\Superstition\SuperstitionService;
use Telegram\Bot\Actions;
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
        $text = $this->description;

        $this->replyWithMessage(compact('text'));
    }
}
