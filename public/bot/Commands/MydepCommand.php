<?php
namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;

use Longman\TelegramBot\Request;

class MydepCommand extends UserCommand
{
    protected $name = 'mydep <Вулиця> ';

    /**
     * @var string
     */
    protected $description = 'Дізнайся свого депутата';

    /**
     * @var string
     */
    protected $usage = '/mydep <вулиця>';

    /**
     * @var string
     */
    protected $version = '1.1.0';

    /**
     * Command execute method
     *
     * @return \Longman\TelegramBot\Entities\ServerResponse
     * @throws \Longman\TelegramBot\Exception\TelegramException
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();

        $text=trim($message->getText(true));

        if ($text === '') {
            $text = 'Правильна команда: ' . $this->getUsage();
            $data = [
                'chat_id' => $chat_id,
                'text'    => $text,

            ];
            return Request::sendMessage($data);

        }else{ $link = mysqli_connect('localhost', 'adminbot', '7C3h0J3l', 'pdginfo')
        or die("Ошибка " . mysqli_error($link));
            mysqli_set_charset($link,'utf8mb4');
// выполняем операции с базой данных
            $query ="SELECT * FROM dep_street LEFT Join street on dep_street.street_id = street.id LEFT JOIN deputy on dep_street.dep_id=deputy.id where street.name_s LIKE '%".$text."%' ";
            $result = mysqli_query($link, $query) or die($text='ошибка');
            $res="";
            if($result)
            {


                    foreach ($result as $val) {
                        $res.=$val['name_s'].' - '.$val['name']."\n";

                    }




                    $data = [
                        'chat_id' => $chat_id,
                        'text'    => $res,

                    ];
                     Request::sendMessage($data);

            }



            mysqli_close($link);}

// закрываем подключение








    }
}