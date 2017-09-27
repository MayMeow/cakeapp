<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/14/2017
 * Time: 3:36 PM
 */

namespace MayMeow\Git\Objects;

use MayMeow\Git\GitRepository;

class Log
{
    protected $commits = [];

    public function __construct(GitRepository $repository, $outputLines)
    {
        foreach ($outputLines as $commitOutputLine) {
            $this->commits[] = Commit::createFromOutputLines($repository, $commitOutputLine);
        }

        return $this->commits;
    }

    /**
     * @return array
     */
    public function getCommits()
    {
        return $this->commits;
    }

    public function getFirst()
    {
        return $this->commits[0];
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->commits);
    }

}