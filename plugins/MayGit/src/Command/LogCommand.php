<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/14/2017
 * Time: 11:25 AM
 */

namespace MayMeow\Git\Command;

class LogCommand extends BaseCommand
{
    const LOG_COMMAND = 'log';

    public function showLog($ref)
    {
        $this
            ->setName(self::LOG_COMMAND)
            ->addArgument('-s')
            ->addArgument('--pretty=raw')
            ->addArgument('--no-color')
            ->addArgument('--max-count=100')
            ->setSubject($ref);

        return $this->_getCli();
    }

    public function lastCommitLog($ref = 'HEAD')
    {
        $this
            ->setName(self::LOG_COMMAND)
            ->addArgument('-1')
            ->addArgument('--pretty=raw')
            ->addArgument('--no-color')
            ->setSubject($ref);

        return $this->_getCli();
    }
}
