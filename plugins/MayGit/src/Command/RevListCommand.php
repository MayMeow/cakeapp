<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/23/2017
 * Time: 12:11 PM
 */

namespace MayMeow\Git\Command;


use MayMeow\Git\Objects\Commit;
use MayMeow\Git\Objects\Tag;

class RevListCommand extends BaseCommand
{
    const GIT_REVLIST = 'rev-list';

    public function __construct()
    {

    }

    public function getTagCommit(Tag $tag)
    {
        $this->setName(static::GIT_REVLIST)
            ->addArgument('-n1')
            ->setSubject($tag->getFullRef());

        return $this->_getCli();
    }

    public function commitPath(Commit $commit, $max = 1000)
    {
        $this->setName(static::GIT_REVLIST)
            ->addArgument(sprintf('--max-count=%s', $max))
            ->setSubject($commit->getSha());

        return $this->_getCli();
    }

    public function getCommitsCount()
    {
        $this->setName(static::GIT_REVLIST)
            ->addArgument('--count')
            ->addArgument('--all');

        return $this->_getCli();
    }
}