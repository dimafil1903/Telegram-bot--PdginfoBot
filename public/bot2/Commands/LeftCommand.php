<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\Command;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;

/**
 * User "/help" command
 *
 * Command that lists all available commands and displays them in User and Admin sections.
 */
class LeftCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'left';

    /**
     * @var string
     */
    protected $description = 'осталось';

    /**
     * @var string
     */
    protected $usage = '/left';

    /**
     * @var string
     */
    protected $version = '1.3.0';

    /**
     * @inheritdoc
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();

        $class_calls = [
            1 => ['08:00', '09:20'],
            2 => ['09:30', '10:50'],
            3 => ['11:10', '12:30'],
            4 => ['12:40', '14:00'],
            5 => ['14:10', '15:30'],

        ];


        $today = date("H:i");

        foreach ($class_calls as $key => $value) {
        if (strtotime($value[0]) <= strtotime($today) and strtotime($value[1]) >= strtotime($today)) {
            $date = strtotime($value[1]) - (strtotime($today) - strtotime("00:00:00"));
            $t = date('H:i', $date);
            $t .= " Залишилось до кінця " . $key . " пари";
            break;
        } else {
            $t = "Отдихай, ще нема занять";

        }
    }
        for ($i = 1; $i <= 5; $i++){
            if (strtotime($class_calls[$i][1]) < strtotime($today) and strtotime($class_calls[$i+1][0]) > strtotime($today)) {
                $date = strtotime($class_calls[$i+1][0]) - (strtotime($today) - strtotime("00:00:00"));
                $break = date('i', $date);
                if ($break=="0:20" ){
                    $t = " До конця ПЕРЕРВИ - 20 хв.";
                }else if($break=="0:10"){
                    $t = " До кінця ПЕРЕРВИ - 10 хв.";
                }else{
                    $t = " До кінця ПЕРЕРВИ -  ".ltrim($break, '0')." хв.";
                }

            }
        }

        $data = [
            'chat_id'    => $chat_id,
            'parse_mode' => 'markdown',
            'text'=>$t
        ];


        return Request::sendMessage($data);
    }



}
