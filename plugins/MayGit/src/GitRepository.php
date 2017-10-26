<?php

namespace MayMeow\Git;

use Cake\Core\Configure;
use MayMeow\Git\Command\BranchCommand;
use MayMeow\Git\Command\CatFileCommand;
use MayMeow\Git\Command\InitCommand;
use MayMeow\Git\Command\LogCommand;
use MayMeow\Git\Command\LsTreeCommand;
use MayMeow\Git\Command\RevListCommand;
use MayMeow\Git\Command\TagCommand;
use MayMeow\Git\Objects\Commit;
use MayMeow\Git\Objects\Log;
use MayMeow\Git\Objects\Tag;
use MayMeow\Git\Objects\TreeObject;
use MayMeow\Git\Process\GitRunner;
use MayMeow\Git\Utility\ArrayHelper;

class GitRepository {

    /**
     * Path To repository
     * @var
     */
    protected $repository;

    protected $remote;

    protected $branch;

    protected $basePath;

    public function __construct($repository = null)
    {
        $this->_getBasePath();
        $this->repository = $this->basePath . $repository;
    }

    protected function _getBasePath()
    {
        $this->basePath = Configure::read('CakeApp.Git.paths.git-data');
    }


    public function getRepositoryPath()
    {
        return $this->repository;
    }

    public function setRemote($remote)
    {
        $this->remote = $remote;

        return $this;
    }

    public function setBranch($branch)
    {
        $this->branch = $branch;

        return $this;
    }

    public function cloneRemote($url)
    {
        try {
            GitFactory::cloneRepository($url, $this->repository);
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function status()
    {
        try {
            $response = GitFactory::status($this->repository);

            return $response;
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function add()
    {
        GitFactory::add($this->repository);
    }

    public function commit($message)
    {
        try {
            $response = GitFactory::commit($this->repository, $message);

            return $response;
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function push()
    {
        try {
            $response = GitFactory::push($this->repository, $this->remote, $this->branch);

            return $response;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function pull()
    {
        try {
            $response = GitFactory::push($this->repository, $this->remote, $this->branch);

            return $response;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return array
     */
    public function getBranches()
    {
        $branches = new BranchCommand();
        $runner = new GitRunner();

        $respone = $runner->execute($branches->listBranches(false, true), true, $this->getRepositoryPath())
            ->getRawOutput();

        $branches = explode(' ', $respone);

        foreach ($branches as $key => $value) {
            if ($value == "" || $value == "*") unset($branches[$key]);
        }

        return $branches;
    }

    public function getTags()
    {
        $tags = [];

        $tagCommand = new TagCommand();
        //$response = Runner::run_command($tagCommand->getList(), $this->repository);

        $runner = new GitRunner();

        $response = $runner->execute($tagCommand->getList(), true, $this->repository)->getOutputLines(true);

        //$tagsArray = explode("\n", $response[0]);

        foreach ($response as $tagString) {
                $tags[] = new Tag($this, trim($tagString));
        }

        return $tags;
    }

    /**
     *
     */
    public function initBare()
    {
        $init = new InitCommand();
        $runner = new GitRunner();

        $runner->execute($init->bare($this->repository), true, $this->basePath[0]);
    }

    /**
     * @param string $ref
     * @return array|bool
     */
    public function getTree($ref = 'HEAD')
    {
        $items = [];
        $folders = [];
        $files = [];
        $links = [];
        try {

            $ls = new LsTreeCommand();
            $runner = new GitRunner();

            $response = $runner->execute($ls->fullTree($ref), true, $this->getRepositoryPath())->getRawOutput();

            $tree = explode("\0", $response);
            $i = 0;

            foreach ($tree as $key => $line) {
                if (!empty($line)) {
                    $items[] = preg_split("/[\s]+/", $line, 5);
                }
            }

            foreach ($items as $key => $item)
            {
                if ($item[1] == TreeObject::TYPE_BLOB) {
                    //$this->files[] = new Blob($item[4], $item[2], $item[3]);
                    //$files[] = new TreeObject($item[4], $item[2], TreeObject::TYPE_BLOB, $item[3]);
                    $object = new TreeObject($this, $ref);
                    $object->setName($item[4])->setSha($item[2])->setType(TreeObject::TYPE_BLOB)->setSize($item[3]);
                    $files[] = $object->withLog();
                }

                if ($item[1] == TreeObject::TYPE_TREE) {
                    //$folders[] = new TreeObject($item[4], $item[2], TreeObject::TYPE_TREE);

                    $object = new TreeObject($this, $ref);
                    $object->setName($item[4])->setSha($item[2])->setType(TreeObject::TYPE_TREE)->setSize($item[3]);
                    $folders[] = $object->withLog();
                }

                if ($item[1] == TreeObject::TYPE_LINK) {
                    //$links[] = new TreeObject($item[4], $item[2], TreeObject::TYPE_TREE);

                    $object = new TreeObject($this, $ref);
                    $object->setName($item[4])->setSha($item[2])->setType(TreeObject::TYPE_LINK)->setSize($item[3]);
                    $links[] = $object->withLog();
                }
            }
            $everything = array_merge($folders, $files, $links);

            return $everything;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return false;
    }

    /**
     * @param $ref
     * @return Log
     */
    public function getLog($ref = null)
    {
        $log = new LogCommand();
        $runner = new GitRunner();

        //$response = Runner::run_command($log->showLog($ref), $this->repository);
        $response = $runner->execute($log->showLog($ref), true, $this->repository)->getOutputLines(true);
        $commitOutputLines =  ArrayHelper::pregSplitFlatArray($response, '/^commit (\w+)$/');

        return new Log($this, $commitOutputLines);
    }

    public function getCommitMessage($ref = null)
    {
        $log = new LogCommand();
        $runner = new GitRunner();

        $ref = str_replace(':', ' -- ', $ref);

        $response = $runner->execute($log->lastCommitLog($ref), true, $this->repository)->getOutputLines(true);
        $commitOutputLines =  ArrayHelper::pregSplitFlatArray($response, '/^commit (\w+)$/');

        return new Log($this, $commitOutputLines);
    }

    public function getCommit($start = 'HEAD')
    {
        $commit = Commit::pick($this, $start);

        return $commit;
    }

    public function commitsCount($start = 'HEAD')
    {
        $commit = Commit::pick($this, $start);

        return $commit->count();
    }

    public function allCommitsCount()
    {
        $command = new RevListCommand();
        $runner = new GitRunner();

        $respone = $runner->execute($command->getCommitsCount(), true, $this->getRepositoryPath());

        return $respone->getRawOutput();
    }

    /**
     * Check if repository is empty
     * @return bool
     */
    public function isEmpty()
    {
        $branches = new BranchCommand();
        $runner = new GitRunner();
        $respone = $runner->execute($branches->listBranches(false, true), true, $this->getRepositoryPath())
            ->getRawOutput();

        // If str lengt repositoy is not empty
        if (strlen($respone) != 0)
        {
            return false;
        }

        // Repository is empty
        return true;
    }

    public function outputRawContent($sha)
    {
        $command = new CatFileCommand();
        $runner = new GitRunner();
        return $runner->execute($command->contentBySha($sha), true, $this->getRepositoryPath())->getRawOutput();
    }
}
