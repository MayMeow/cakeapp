<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 8/21/2017
 * Time: 10:39 AM
 */

namespace MayMeow\Email;

use CakeApp\Component\IO\Text\EmailAddress;

class EmailAddressFromTitle extends EmailAddress
{
    /**
     * Pattern to create [email] from title
     */
    const EMAIL_PATTERN =  "/(\[)+[\w.-]+@[\w.-]+\.+[A-Za-z]{2,6}(\])/";
}