<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 8/21/2017
 * Time: 7:02 PM
 */

namespace MayMeow\Email\Traits;

use Cake\Core\Configure;

trait ReplyByMailTrait
{
    protected function getReplyAddress($uid, $userID)
    {
        $domain = Configure::read('CakeApp.email.domain');
        $prefix = Configure::read('CakeApp.email.incoming.prefix');

        return $prefix . $uid . '.a' . $userID . '@' . $domain;
    }

    protected function getSenderEmail($mailbox)
    {
        $domain = Configure::read('CakeApp.email.domain');
        return $mailbox . '@' . $domain;
    }
}