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

/**
 * Left chat member command
 *
 * Gets executed when a member leaves the chat.
 */
class LeftchatmemberCommand extends SystemCommand
{
    /**
     * @var string
     */
    protected $name = 'leftchatmember';

    /**
     * @var string
     */
    protected $description = 'Left Chat Member';

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
        $new=$this->getUpdate()->getMessage()->getNewChatMembers();

        $message = $this->getMessage();
     $bot=   $this->getUpdate()->getMessage()->botAddedInChat();
        $member = $message->getLeftChatMember()->getFirstName();
        $chat_id = $message->getChat()->getId();
        trigger_error(__CLASS__ . ' is deprecated and will be removed and handled by ' . GenericmessageCommand::class . ' by default in a future release.', E_USER_DEPRECATED);
        $data = [
            'chat_id'    => $chat_id,
            'parse_mode' => 'markdown',
            'text'=>$bot
        ];

        Request::sendMessage($data);

        return parent::execute();
    }
}
