<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/14/2017
 * Time: 1:44 PM
 */

namespace MayMeow\Git\Objects;

use MayMeow\Git\Command\RevListCommand;
use MayMeow\Git\GitRepository;
use MayMeow\Git\Objects\Commit\Message;
use MayMeow\Git\Process\GitRunner;
use MayMeow\Git\Utility\Runner;

class Commit implements TreeishInterface
{
    protected $commit;

    protected $tree;

    protected $parents = [];

    protected $author;

    protected $committer;

    protected $message;

    protected $dateAuthor;

    protected $dateCommitter;

    protected $sha;

    public function __construct(GitRepository $repository, $outputLines)
    {
        //$this->parseOutputLines($outputLines);
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function getCommit()
    {
        return $this->commit;
    }

    /**
     * @return mixed
     */
    public function getTree()
    {
        return $this->tree;
    }

    /**
     * @return array
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getCommitter()
    {
        return $this->committer;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getDateAuthor()
    {
        return $this->dateAuthor;
    }

    /**
     * @return mixed
     */
    public function getDateCommitter()
    {
        return $this->dateCommitter;
    }

    /**
     * @return mixed
     */
    public function getSha()
    {
        return $this->sha;
    }

    public static function createFromOutputLines(GitRepository $repository, $outputLines)
    {
        $commit = new self($repository, $outputLines);
        $commit->parseOutputLines($outputLines);

        return $commit;
    }

    /**
     * @param $outputLines
     */
    public function parseOutputLines($outputLines)
    {
        $message = [];

        foreach ($outputLines as $line) {

            if (preg_match('/^commit (\w+)$/', $line, $matches) > 0) {
                $this->sha = $matches[1];
            }
            if (preg_match('/^tree (\w+)$/', $line, $matches) > 0) {
                $this->tree = $matches[1];
            }
            if (preg_match('/^parent (\w+)$/', $line, $matches) > 0) {
                $this->parents[] = $matches[1];
            }

            if (preg_match('/^author (.*) <(.*)> (\d+) (.*)$/', $line, $matches) > 0) {
                $author = new Author();
                $author->setName($matches[1])
                    ->setEmail($matches[2]);
                $this->author = $author;

                $date = \DateTime::createFromFormat('U O', $matches[3] . ' ' . $matches[4]);
                $date->modify($date->getOffset() . ' seconds');
                $this->dateAuthor = $date;
            }
            if (preg_match('/^committer (.*) <(.*)> (\d+) (.*)$/', $line, $matches) > 0) {
                $committer = new Author();
                $committer->setName($matches[1])
                    ->setEmail($matches[2]);
                $this->committer = $committer;

                $date = \DateTime::createFromFormat('U O', $matches[3] . ' ' . $matches[4]);
                $date->modify($date->getOffset() . ' seconds');
                $this->dateCommitter = $date;
            }
            if (preg_match('/^    (.*)$/', $line, $matches)) {
                $message[] = $matches[1];
            }

            $this->message = new Message($message);

        }
    }

    public static function pick (GitRepository $repository, $sha)
    {
        $commit = new self($repository, $sha);
        $commit->createFromCommand($repository, $sha);

        return $commit;
    }

    public function createFromCommand(GitRepository $repository, $sha)
    {
        $command = new ShowCommand();
        $runner = new GitRunner();

        $outputlines = $runner->execute($command->showCommit($sha), true, $this->repository->getRepositoryPath())->getOutputLines();

        $this->parseOutputLines($outputlines);
    }

    public function count()
    {
        $command = new RevListCommand();
        $runner = new GitRunner();

        return count($runner->execute($command->commitPath($this, 1000), true, $this->repository->getRepositoryPath())->getOutputLines(true));
    }

}