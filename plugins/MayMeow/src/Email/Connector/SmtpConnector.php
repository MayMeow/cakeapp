<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 8/21/2017
 * Time: 12:06 PM
 */

namespace MayMeow\Email\Connector;

use CakeApp\Component\IO\Text\EmailAddress;
use MayMeow\Email\EmailMessage;

class SmtpConnector
{
    protected $connection;

    protected $messages = [];

    protected $messagesCount;

    public function __construct($server, $user, $password)
    {
        $this->connection = imap_open($server, $user, $password);
    }

    /**
     * Close email connection
     */
    protected function _closeConnection()
    {
        imap_close($this->connection);
    }

    /**
     * Download messages from email server
     */
    protected function _getMessages()
    {
        $this->messagesCount = imap_num_msg($this->connection);

        for ($id = 1; $id <= $this->messagesCount; $id++) {
            $header = imap_headerinfo($this->connection, $id);

            if (!empty($header->to) && !empty($header->from)) {
                if (key_exists(0, $header->to) && key_exists(0, $header->from)) {
                    $to = ($header->to)[0];
                    $from = ($header->from)[0];
                    $toAddress = $to->mailbox . '@' . $to->host;

                    $messageBody = quoted_printable_decode(imap_fetchbody($this->connection, $id, 1.1));

                    $emailMessage = new EmailMessage(new EmailAddress($toAddress));
                    $emailMessage->setFrom(new EmailAddress($from->mailbox . '@' . $from->host))
                        ->setSubject($header->subject)
                        ->setBody($messageBody);

                    $this->messages[] = $emailMessage;
                }
            }
        }

        $this->_closeConnection();
    }

    protected function _decode($encoding, $text)
    {
        switch ($encoding) {
            # 7BIT
            case 0:
                return $text;
            # 8BIT
            case 1:
                return quoted_printable_decode(imap_8bit($text));
            # BINARY
            case 2:
                return imap_binary($text);
            # BASE64
            case 3:
                return imap_base64($text);
            # QUOTED-PRINTABLE
            case 4:
                return quoted_printable_decode($text);
            # OTHER
            case 5:
                return $text;
            # UNKNOWN
            default:
                return $text;
        }
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        $this->_getMessages();

        return $this->messages;
    }
}