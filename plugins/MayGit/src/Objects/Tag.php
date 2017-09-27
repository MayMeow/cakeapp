<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/23/2017
 * Time: 12:00 PM
 */

namespace MayMeow\Git\Objects;

use MayMeow\Git\Command\RevListCommand;
use MayMeow\Git\GitRepository;
use MayMeow\Git\Process\GitRunner;
use MayMeow\Git\Utility\Runner;

class Tag
{

    protected $repository;

    protected $name;

    protected $fullRef;

    protected $sha;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getFullRef()
    {
        return $this->fullRef;
    }

    /**
     * @return mixed
     */
    public function getSha()
    {
        return $this->sha;
    }

    public function __construct(GitRepository $repository, $name)
    {
        $this->name = $name;
        $this->repository = $repository;
        $this->fullRef = 'refs/tags/' . $this->name;

        $this->setSha();
    }

    public function setSha() {
        $rlCommand = new RevListCommand();
        $command = $rlCommand->getTagCommit($this);
        $runner = new GitRunner();

        $outputLines = $runner->execute($command, true, $this->repository->getRepositoryPath())->getOutputLines(true);
        $this->sha = $outputLines[0];
    }
}