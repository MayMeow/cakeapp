<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/23/2017
 * Time: 3:36 PM
 */

namespace MayMeow\Git\Objects;


use MayMeow\Git\Command\BaseCommand;

class ShowCommand extends BaseCommand
{
    const GIT_SHOW = 'show';

    public function showCommit($ref)
    {
        $this->setName(self::GIT_SHOW)
            ->addArgument('-s')
            ->addArgument('--pretty=raw')
            ->addArgument('--no-color')
            ->setSubject($ref);

        return $this->_getCli();
    }
}