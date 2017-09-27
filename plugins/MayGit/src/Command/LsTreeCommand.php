<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/13/2017
 * Time: 2:32 PM
 */

namespace MayMeow\Git\Command;

class LsTreeCommand extends BaseCommand
{
    const LS_TREE_COMMAND = 'ls-tree';

    public function fullTree($ref = 'HEAD')
    {
        $this
            ->setName(self::LS_TREE_COMMAND)
            ->addArgument('-l')
            ->addArgument('-z')
            ->addArgument('--full-tree')
            ->setSubject($ref);

        return $this->_getCli();
    }
}
