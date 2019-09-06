<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\ChatAction;
/**
 * Start command
 *
 * Gets executed when a user first starts using the bot.
 */
class StartCommand extends SystemCommand
{
    /**
     * @var string
     */
    protected $name = 'start';

    /**
     * @var string
     */
    protected $description = 'Start command';

    /**
     * @var string
     */
    protected $usage = '/start';

    /**
     * @var string
     */
    protected $version = '1.1.0';

    /**
     * @var bool
     */
    protected $private_only = true;

    /**
     * Command execute method
     *
     * @return \Longman\TelegramBot\Entities\ServerResponse
     * @throws \Longman\TelegramBot\Exception\TelegramException
     */

    public function execute()
    {
        $message = $this->getMessage();
        $from=$this->getMessage()->getText();
        $keyboard = new Keyboard(
            ['text' => 'Довідник', 'callback_data' => 'Депутати 👤'],
            ['Транспорт 🚍', '*']
        );

        $keyboard->setResizeKeyboard(true)
            ->setSelective(false);
        $chat_id = $message->getChat()->getId();

        $data = [
            'chat_id' => $chat_id,
            'text'    => 'Вас вітає  бот Pidgorodne.info' . PHP_EOL . '/help щоб дізнатися про всі команди',

        ];
        $data2 = [
            'chat_id' => $chat_id,
            'text'    =>  'Оберіть кнопку нижче 👇',
            'reply_markup' => $keyboard,
        ];
        $data1 = [
            'chat_id' => $chat_id,

            'action'  => ChatAction::TYPING,

        ];





        Request::sendChatAction($data1);
        sleep(1);
        Request::sendMessage($data);
        sleep(1);
        Request::sendChatAction($data1);
        sleep(1);
        Request::sendMessage($data2);


    }
}
