<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/23/2017
 * Time: 8:41 PM
 */

namespace MayMeow\Git\Objects;


use MayMeow\Git\Command\LogCommand;
use MayMeow\Git\GitRepository;
use MayMeow\Git\Process\GitRunner;
use MayMeow\Git\Utility\ArrayHelper;

class TreeObject
{

    const TYPE_BLOB = 'blob';
    const TYPE_TREE = 'tree';
    const TYPE_LINK = 'commit';

    protected $name;

    protected $sha;

    protected $type;

    protected $size;

    protected $log;

    protected $repository;

    protected $ref;

    /**
     * TreeObject constructor.
     * @param GitRepository $repository
     * @param $ref
     */
    public function __construct(GitRepository $repository, $ref /*$name, $sha, $type, $size = null*/)
    {
        //$this->name = $name;
        //$this->sha = $sha;
        //$this->type = $type;
        /*if (null != $size) {
            $this->size = $size;
        }*/

        $this->repository = $repository;
        $this->ref = $ref;
    }

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
    public function getSha()
    {
        return $this->sha;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $name
     * @return TreeObject
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $sha
     * @return TreeObject
     */
    public function setSha($sha)
    {
        $this->sha = $sha;
        return $this;
    }

    /**
     * @param mixed $type
     * @return TreeObject
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param null $size
     * @return TreeObject
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function withLog()
    {
        $this->_initializeLog();

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLog()
    {
        return $this->log;
    }


    /**
     *
     */
    protected function _initializeLog()
    {
        $command = new LogCommand();
        $runner = new GitRunner();



        if (preg_match('/:/', $this->ref)) {
            $ref = str_replace(':', ' -- ', $this->ref) . '/' . $this->name;
        } else {
            $ref = $this->ref . ' -- ' . $this->name;
        }

        $response = $runner->execute($command->lastCommitLog($ref), true, $this->repository->getRepositoryPath())->getOutputLines(true);
        $commitOutputLines =  ArrayHelper::pregSplitFlatArray($response, '/^commit (\w+)$/');

        $commit = new Log($this->repository, $commitOutputLines);
        $this->log = $commit->getFirst();
    }

}