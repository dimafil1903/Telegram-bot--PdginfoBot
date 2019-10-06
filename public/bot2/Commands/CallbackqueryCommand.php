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
use Longman\TelegramBot\Request;

/**
 * Callback query command
 *
 * This command handles all callback queries sent via inline keyboard buttons.
 *
 * @see InlinekeyboardCommand.php
 */
class CallbackqueryCommand extends SystemCommand
{
    /**
     * @var string
     */
    protected $name = 'callbackquery';

    /**
     * @var string
     */
    protected $description = 'Reply to callback query';

    /**
     * @var string
     */
    protected $version = '1.1.1';

    /**
     * Command execute method
     *
     * @return \Longman\TelegramBot\Entities\ServerResponse
     * @throws \Longman\TelegramBot\Exception\TelegramException
     */
    public function execute()
    {

        $callback_query    = $this->getCallbackQuery();
        $callback_query_id = $callback_query->getId();
        $callback_data     = $callback_query->getData();
        $message=            $callback_query->getMessage();
        $message_id        =$callback_query->getMessage()->getMessageId();
        $chat_id= $message->getChat()->getId();

        $link = mysqli_connect('localhost', 'adminbot', '7C3h0J3l', 'pdginfo')
        or die("Ошибка " . mysqli_error($link));

        // выполняем операции с базой данных
        $query ="SELECT * FROM deputy";
        $result = mysqli_query($link, $query) or die($text='ошибка');
        foreach ($result as $dep) {


        if($callback_data=='dep'.$dep['id']) {

            $data2 = [
                'chat_id' => $chat_id,
                'message_id'=>$message_id,
                'text'    => $dep['name']."\nemail:dasdsada@gmail.com\nтелефон:+2324324234",

            ];

            Request::editMessageText($data2);
        }
        }

        if ($message->getText(true)=="Назад"){
            $data3 = [
                'chat_id' => $chat_id,
                'text'    => "lol",];
            Request::sendMessage($data3);
        }
            mysqli_close($link);
        $data = [
            'callback_query_id' => $callback_query_id,
            'text'              => 'Інформація відображена',
            'show_alert'        => $callback_data === 'thumb up',
            'cache_time'        => 5,
        ];

        Request::answerCallbackQuery($data);
    }
}
