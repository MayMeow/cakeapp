<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 8/14/2017
 * Time: 12:45 PM
 */

namespace MayMeow\Email;

/**
 * Class EmailMessage
 * @package MayMeow\Email
 */
class EmailMessage
{
    protected $emailAddress;

    protected $to;

    protected $from;

    protected $subject;

    protected $body;

    /**
     * EmailMessage constructor.
     * @param \CakeApp\Component\IO\Text\EmailAddress $emailAddress Recipient Address TO:
     */
    public function __construct(\CakeApp\Component\IO\Text\EmailAddress $emailAddress)
    {
        $this->emailAddress = $emailAddress;
        if ($this->emailAddress->isEmail()) {
            $this->setTo($this->emailAddress->getEmail());
        }
    }

    /**
     * @return EmailAddress
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     * @return EmailMessage
     */
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     * @return EmailMessage
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     * @return EmailMessage
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     * @return EmailMessage
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }
}
