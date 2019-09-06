<?php
namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\DB;
class DeplistCommand extends UserCommand
{
    protected $name = 'deplist';                      // Your command's name
    protected $description = 'Список всіх депутатів'; // Your command description
    protected $usage = '/deplist';                    // Usage of your command
    protected $version = '1.0.0';

    public function execute()
    {

        $message = $this->getMessage();            // Get Message object

        $chat_id = $message->getChat()->getId();
        $text="";
        $link = mysqli_connect('localhost', 'adminbot', '7C3h0J3l', 'pdginfo')
        or die("Ошибка " . mysqli_error($link));
        mysqli_set_charset($link,'utf8mb4');
    // выполняем операции с базой данных
        $query ="SELECT * FROM deputy order by name";
        $result = mysqli_query($link, $query) or die($text='ошибка');
        if($result)
        {


                foreach ($result as $val){
                    {


                        $inline_keyboard = new InlineKeyboard([

                            ['text' => 'Info 📑' , 'callback_data' => 'dep'.$val['id']],
                        ]);

                        $data = [
                            'chat_id'      => $chat_id,
                            'reply_markup' => $inline_keyboard,
                            'text'=>$val['name'],
                        ];

                        Request::sendMessage($data)->printError();
                    }

                }

        }

// закрываем подключение
        mysqli_close($link);




          // Get the current Chat I



              // Send message!
    }
}