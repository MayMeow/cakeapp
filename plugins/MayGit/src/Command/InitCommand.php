<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/13/2017
 * Time: 3:37 PM
 */

namespace MayMeow\Git\Command;

use MayMeow\Git\Utility\Runner;

class InitCommand extends BaseCommand
{
    const INTI_COMMAND = 'init';

    public function bare($repositoryName = null)
    {
        $this
            ->setName(self::INTI_COMMAND)
            ->addArgument('--bare')
            ->addArgument('--shared=0777')
            ->setSubject($repositoryName);

        return $this->_getCli();
    }
}
