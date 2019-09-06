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

use Longman\TelegramBot\ChatAction;
use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Conversation;
use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;

/**
 * Generic message command
 *
 * Gets executed when any type of message is sent.
 */
class GenericmessageCommand extends SystemCommand
{
    /**
     * @var string
     */
    protected $name = 'genericmessage';

    /**
     * @var string
     */
    protected $description = 'Handle generic message';

    /**
     * @var string
     */
    protected $version = '1.1.0';

    /**
     * @var bool
     */
    protected $need_mysql = true;

    /**
     * Command execute method if MySQL is required but not available
     *
     * @return ServerResponse
     * @throws TelegramException
     */
    public function executeNoDb()
    {
        // Do nothing
        return Request::emptyResponse();
    }

    /**
     * Command execute method
     *
     * @return ServerResponse
     * @throws TelegramException
     */
    public function execute()
    {
        //If a conversation is busy, execute the conversation command after handling the message
        $conversation = new Conversation(
            $this->getMessage()->getFrom()->getId(),
            $this->getMessage()->getChat()->getId()
        );

        //Fetch conversation command if it exists and execute it
        if ($conversation->exists() && ($command = $conversation->getCommand())) {
            return $this->telegram->executeCommand($command);
        }
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();
        $text = $message->getText();
        $msg_id = $message->getMessageId();
        $first_name = $message->getFrom()->getFirstName();
        $last_name = $message->getFrom()->getLastName();

        if ($text == '⬆️ Назад') {
            $data = [
                'chat_id' => $chat_id,
                'text' => 'Ви повернулися назад',
                'reply_markup' => Keyboard::remove(),
            ];
            $keyboard = new Keyboard(
                ['text' => 'Довідник', 'callback_data' => 'Депутати 👤'],
                ['Транспорт 🚍', '*']
            );
            $keyboard->setResizeKeyboard(true)
                ->setSelective(false);
            $data1 = [
                'chat_id' => $chat_id,
                'text' => 'Оберіть кнопку нижче 👇 ',
                'reply_markup' => $keyboard,
            ];
            Request::sendMessage($data);
            Request::sendMessage($data1);

        } else if ($text == 'Транспорт 🚍') {
            $keyboard2 = new Keyboard(
                ['📄 Схема маршруту', '📜 Графік маршруту'],
                ['⬆️ Назад']

            );
            $keyboard2->setResizeKeyboard(true)
                ->setSelective(false);
            $data_menu = [
                'chat_id' => $chat_id,
                'text' => 'Ви зайшли в меню Транспорт',
                'reply_markup' => $keyboard2,
            ];

            Request::sendMessage($data_menu);
        } else if ($text == 'Депутати 👤') {
            $keyboard = new Keyboard(
                ['📄 Список депутатів', '🔎 Пошук депутата за вулицею'],
                ['📖 Інформація про депутата', '⬆️ Назад']

            );
            $keyboard->setResizeKeyboard(true)
                ->setSelective(false);
            $data = [
                'chat_id' => $chat_id,
                'text' => 'Ви зайшли в меню Депутати',
                'reply_markup' => $keyboard,
            ];

            Request::sendMessage($data);
        } else if ($text == '📄 Список депутатів') {
            $link = mysqli_connect('localhost', 'adminbot', '7C3h0J3l', 'pdginfo')

            or die("Ошибка " . mysqli_error($link));
            mysqli_set_charset($link, 'utf8mb4');
            // выполняем операции с базой данных
            $query = "SELECT * FROM deputy order by name";
            $result = mysqli_query($link, $query) or die($text = 'ошибка');
            if ($result) {
                $send = '';
                foreach ($result as $val) {

                    $send .= "<b>" . $val['name'] . "</b> - /deputy".$val['id']  . "\n";
                }
                $data = [
                    'chat_id' => $chat_id,
                    'parse_mode' => 'HTML',
                    'text' => $send
                ];
                $data1 = [
                    'chat_id' => $chat_id,
                    'text' => "Будь ласка, ось список всіх депутатів міської ради: 😌"
                ];
                Request::sendMessage($data1);
                sleep(1);
                Request::sendMessage($data);


            }
// закрываем подключение
            mysqli_close($link);


        }  if ($text == '📄 Схема маршруту') {
            $conn = mysqli_connect('localhost', 'adminbot', '7C3h0J3l', 'pdginfo');
// Check connection
            mysqli_set_charset($conn, 'utf8mb4');
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "Insert into messages (chat_id,message_id,fromWho,message)VALUES ('$chat_id','$msg_id','$first_name  $last_name ' ,'$text')";

            mysqli_query($conn, $sql);

            $selec = "select  * from messages order by id desc ";
            $res = mysqli_query($conn, $selec);
            foreach ($res as $val) {
                if ($val['message_id'] == $msg_id) {
                    $data = [
                        'chat_id' => $chat_id,
                        'text' => 'Будь ласка, введіть номер маршруту',
                    ];
                    Request::sendMessage($data);
                }
            }
            mysqli_close($conn);


        } if ($text == '📜 Графік маршруту') {
            $conn = mysqli_connect('localhost', 'adminbot', '7C3h0J3l', 'pdginfo');
// Check connection
            mysqli_set_charset($conn, 'utf8mb4');
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "Insert into messages (chat_id,message_id,fromWho,message)VALUES ('$chat_id','$msg_id','$first_name  $last_name ' ,'$text')";

            mysqli_query($conn, $sql);

            $selec = "select  * from messages order by id desc ";
            $res = mysqli_query($conn, $selec);
            foreach ($res as $val) {
                if ($val['message_id'] == $msg_id) {
                    $data = [
                        'chat_id' => $chat_id,
                        'text' => 'Будь ласка, введіть номер маршруту',
                    ];
                    Request::sendMessage($data);
                }
            }
            mysqli_close($conn);


        }



        if ($text == '🔎 Пошук депутата за вулицею') {
            $conn = mysqli_connect('localhost', 'adminbot', '7C3h0J3l', 'pdginfo');
// Check connection
            mysqli_set_charset($conn, 'utf8mb4');
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "Insert into messages (chat_id,message_id,fromWho,message)VALUES ('$chat_id','$msg_id','$first_name  $last_name ' ,'$text')";

            mysqli_query($conn, $sql);

            $selec = "select  * from messages order by id desc ";
            $res = mysqli_query($conn, $selec);
            foreach ($res as $val) {
                if ($val['message_id'] == $msg_id) {
                    $data = [
                        'chat_id' => $chat_id,
                        'text' => 'Будь ласка, введіть назву своєї вулиці або провулка',
                    ];
                    Request::sendMessage($data);
                }
            }
            mysqli_close($conn);


        }  if ($text == '📖 Інформація про депутата') {
            $conn = mysqli_connect('localhost', 'adminbot', '7C3h0J3l', 'pdginfo');
// Check connection
            mysqli_set_charset($conn, 'utf8mb4');
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "Insert into messages (chat_id,message_id,fromWho,message)VALUES ('$chat_id','$msg_id','$first_name  $last_name ' ,'$text')";

            mysqli_query($conn, $sql);

            $selec = "select  * from messages order by id desc ";
            $res = mysqli_query($conn, $selec);
            foreach ($res as $val) {
                if ($val['message_id'] == $msg_id) {
                    $data = [
                        'chat_id' => $chat_id,
                        'text' => 'Введіть прізвище депутата',
                    ];
                    Request::sendMessage($data);
                }
            }
            mysqli_close($conn);

        }


        $conn = mysqli_connect('localhost', 'adminbot', '7C3h0J3l', 'pdginfo');
// Check connection
        mysqli_set_charset($conn, 'utf8mb4');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $dep_info_in_list="SELECT * FROM dep_street LEFT Join street on dep_street.street_id = street.id LEFT JOIN deputy on dep_street.dep_id=deputy.id";
        $res_dep_info=mysqli_query($conn, $dep_info_in_list);


        $dep_info_in_deputy="SELECT * FROM deputy";
        $res_deps_info=mysqli_query($conn, $dep_info_in_deputy);
        $streets="";
        foreach ($res_deps_info as $depu){
            foreach ($res_dep_info as $dep){
                if($depu['id']==$dep['dep_id'] and $text=='/deputy'.$dep['dep_id']){
                    $streets.=$dep['name_s']."\n";
                }
            }
            if($text=="/deputy".$depu['id']){
                $data = [
                    'chat_id' => $chat_id,
                    'text' => $depu['name']." 👤\n📅 Дата прийому: ".$depu['date_of_meet']."\n🏠 Місце прийому: ".$depu['place_of_meet']."\nПерелік вулиць в окрузі: \n".$streets,
                ];
                Request::sendMessage($data);
            }
        }



        $selec = "select  * from messages order by id desc ";
        $resy = mysqli_query($conn, $selec);

        $res = '';
        foreach ($resy as $val) {
            $select_dep = "SELECT * FROM dep_street LEFT Join street on dep_street.street_id = street.id LEFT JOIN deputy on dep_street.dep_id=deputy.id where street.name_s LIKE '%" . $text . "%' ";
            $select_dep_info = "SELECT * FROM dep_street LEFT Join street on dep_street.street_id = street.id LEFT JOIN deputy on dep_street.dep_id=deputy.id  where deputy.name LIKE '" . $text . "%'";
            $select_dep_info2 = "select * from deputy where name LIKE '" . $text . "%'";
            $result = mysqli_query($conn, $select_dep);
            $result2 = mysqli_query($conn, $select_dep_info);
            $result3 = mysqli_query($conn, $select_dep_info2);
            if ($val['chat_id']==$chat_id  and $val['message_id'] == $msg_id - 2 and $text!=='' and $val['message'] == '🔎 Пошук депутата за вулицею') {

                if ($result->num_rows == 0) {
                    $data = [
                        'chat_id' => $chat_id,
                        'text' => "❌ Помилка: \nцієї вулиці або провулка немає в базі данних\n✅ Приклад:\nПоштова, 1-й Сагайдачний \n❗️Примітка:\nдеякі вулиці перейменовані на сучасні назви, враховуйте це при пошуку",
                    ];
                    Request::sendMessage($data);
                } else {
                    foreach ($result as $v) {
                        $res .= "🔖 " . $v['name_s'] . ' -  👤 ' . $v['name'] . "\n";

                    }
                    $data = [
                        'chat_id' => $chat_id,
                        'text' => $res,
                    ];
                    $dataaction = [
                        'chat_id' => $chat_id,
                        'action' => ChatAction::TYPING,
                    ];
                    Request::sendChatAction($dataaction);
                    sleep(2);
                    Request::sendMessage($data);
                    $data1 = [
                        'chat_id' => $chat_id,
                        'text' => "Пошук завершено, для нового пошуку натисніть ще раз кнопку 'Пошук депутата за вулицею' ",
                    ];
                    sleep(2);
                    Request::sendMessage($data1);
                }
            }
            if ($val['chat_id']==$chat_id and $val['message_id'] == $msg_id - 2 and $text !=='' and $val['message'] == '📖 Інформація про депутата') {
                $s = '';
                if ($result3->num_rows == 0) {
                    $data = [
                        'chat_id' => $chat_id,
                        'text' => "❌ Помилка: \nЦього прізвища немає в базі данних\n✅ Приклад:\nЗелений, Ганжа С.А. \n❗️Примітка:\nПрізвище треба писати тільки з великої літери.Можна використовувати ініціали(також з великої літери)\nВраховуйте це при пошуку",
                    ];
                    Request::sendMessage($data);
                } else {
                    foreach ($result3 as $i) {
                        $s .= "✅ <b>" . $i['name'] . "</b> \n📩 email: Відсутній\n📞 телефон: Відсутній\n"."📅 Дата прийому: ".$i['date_of_meet']."\n🏠 Місце прийому: ".$i['place_of_meet'];
                    }


                    $data2 = [
                        'chat_id' => $chat_id,
                        'parse_mode' => 'HTML',
                        'text' => $s,
                    ];
                    $dataaction = [
                        'chat_id' => $chat_id,
                        'action' => ChatAction::TYPING,
                    ];
                    Request::sendChatAction($dataaction);
                    sleep(2);
                    Request::sendMessage($data2);

                    foreach ($result2 as $v) {
                        $res .= $v['name_s'] . ' - ' . $v['name'] . "\n";

                    }
                    $data = [
                        'chat_id' => $chat_id,
                        'text' => $res,


                    ];
                    sleep(1);
                    Request::sendMessage($data);


                    $data1 = [
                        'chat_id' => $chat_id,
                        'text' => "Пошук завершено, для нового пошуку натисніть ще раз кнопку 'Інформація про депутата' ",
                    ];
                    sleep(1);
                    Request::sendMessage($data1);
                }

            }
            if ($val['chat_id']==$chat_id and $val['message_id'] == $msg_id - 2 and $text!=='' and $val['message'] == '📄 Схема маршруту') {


                if ($text=='236' or $text=='235' or $text=='245' or $text=='260' or $text=='244' or $text=='243' or $text=='242' ) {
                    Request::sendPhoto([
                        'chat_id' => $chat_id,
                        'photo' => "/var/www/adminbot/data/www/bot.pidgorodne.info/public/bot/Upload/$text.jpg",
                    ]);

                    $data6 = [
                        'chat_id' => $chat_id,
                        'text' => "Будь ласка,це схема $text маршруту",
                    ];

                    Request::sendMessage($data6);
                } else {
                    $data1 = [
                        'chat_id' => $chat_id,
                        'text' => "Можна вводити маршрути лише цифрами\nНаприклад: 236, 244",
                    ];

                    Request::sendMessage($data1);
                }

            }
            if ($val['chat_id']==$chat_id and $val['message_id'] == $msg_id - 2 and $text!=='' and $val['message'] == '📜 Графік маршруту') {


                if ($text=='236' or $text=='235' or $text=='245' or $text=='260' or $text=='244' or $text=='243' or $text=='242' ) {

                    Request::sendPhoto([
                        'chat_id' => $chat_id,
                        'photo' => Request::encodeFile("/var/www/adminbot/data/www/bot.pidgorodne.info/public/bot/Upload/workday_$text.jpg"),
                        'caption'=>'Будній день',
                    ]);
                    Request::sendPhoto([
                        'chat_id' => $chat_id,
                        'photo' => Request::encodeFile("/var/www/adminbot/data/www/bot.pidgorodne.info/public/bot/Upload/dayoff_$text.jpg"),
                        'caption'=>'Вихідний день'
                    ]);



                    $data6 = [
                        'chat_id' => $chat_id,
                        'text' => "Будь ласка, це графік $text  маршруту",
                    ];

                    Request::sendMessage($data6);
                } else {
                    $data1 = [
                        'chat_id' => $chat_id,
                        'text' => "Можна вводити маршрути лише цифрами\nНаприклад: 236, 244",
                    ];

                    Request::sendMessage($data1);
                }

            }
        }


        $delet_id_msg = $msg_id - 2;
        $del = "DELETE FROM messages WHERE message_id='$delet_id_msg' AND chat_id='$chat_id'";
        mysqli_query($conn, $del);
        mysqli_close($conn);


    }
}
