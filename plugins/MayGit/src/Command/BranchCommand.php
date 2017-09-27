<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/13/2017
 * Time: 6:38 PM
 */

namespace MayMeow\Git\Command;


class BranchCommand extends BaseCommand
{
    const BRANCH_COMMAND = 'branch';

    /**
     * @param bool $all
     * @param bool $simple
     * @return string
     */
    public function listBranches($all = false, $simple = false)
    {
        $this
            ->setName(self::BRANCH_COMMAND)
            ->addArgument('--no-color')
            ->addArgument('--no-abbrev');

        if (!$simple) {
            $this->addArgument('-v');
        }

        if ($all) {
            $this->addArgument('-a');
        }

        return $this->_getCli();
    }
}
