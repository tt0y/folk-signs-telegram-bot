<?php

namespace App\Http\Controllers\Backend;

use App\helpers;
use App\Http\Controllers\Controller;
use App\Models\TelegramUser;
use App\Services\Superstition\SuperstitionService;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramMailingController extends Controller
{
    private SuperstitionService $superstitionService;

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

    public function startMailing()
    {
        $chats = TelegramUser::select('chat_id')->groupBy('chat_id')->get();

        $data = $this->superstitionService->searchSuperstitions(helpers::dateExtra());

        $text = helpers::getMessageFormatted($data, PHP_EOL);

        foreach ($chats  as $chat)
        {
            try {
                Telegram::sendMessage([
                    'chat_id' => $chat['chat_id'],
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]);
            }catch (\Exception $exception){
                echo $exception->getMessage() . $chat['chat_id'] . '<br>';

                $unsubscribe = new TelegramUser();
                $unsubscribe->where('chat_id', $chat['chat_id'])->delete();
            }
        }
    }
}
