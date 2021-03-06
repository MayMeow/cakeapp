<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/20/2017
 * Time: 9:46 PM
 */

namespace CakeApp\Component\IO\Text;

/**
 * Class EmailAddress
 * @package CakeApp\Component\IO\Text
 *
 * @method serialize
 */
class EmailAddress
{
    const EMAIL_PATTERN =  "/[\w.-]+@[\w.-]+\.+[A-Za-z]{2,6}/";

    protected $email;

    protected $title;

    protected $matches;

    protected $mailbox;

    protected $host;

    /**
     * EmailAddress constructor.
     * @param $text
     */
    public function __construct($text)
    {
        $this->title = $text;
        $this->email = $this->_getEmail($this->title);


    }

    /**
     * @param $text
     * @return bool|string
     */
    protected function _getEmail($text)
    {
        preg_match(static::EMAIL_PATTERN, $text, $this->matches);

        if (!empty($this->matches)) {
            $address = trim(trim($this->matches[0], ']'), '[');

            $emailString = explode('@', $address);

            $this->host = $emailString[1];
            $this->mailbox = $emailString[0];

            return $address;
        }

        return false;
    }

    /**
     * @return bool|string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function isEmail()
    {
        if (!empty($this->matches)) return true;

        return false;
    }
}
