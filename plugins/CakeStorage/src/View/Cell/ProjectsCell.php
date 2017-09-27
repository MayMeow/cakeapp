<?php
namespace CakeStorage\View\Cell;

use Cake\Filesystem\Folder;
use Cake\View\Cell;
use MayMeow\Git\GitRepository;

/**
 * Projects cell
 */
class ProjectsCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @param null|integer $id
     * @return void
     */
    public function display($id = null)
    {
        $this->loadModel('GitRepositories');
        $projects = $this->GitRepositories->find()
            ->where(['GitRepositories.user_id' => $id])
            ->order(['GitRepositories.created DESC']);

        $this->set('projects', $projects);
    }

    /**
     * @param $project
     * @param $ref
     * @param $gitRepository
     */
    public function tree($project, $ref, $gitRepository)
    {
        $repo = new GitRepository($project);
        if ($repo->isEmpty()) {
            $tree = null;
        } else {
            $tree = $repo->getTree($ref);
        }
        $dir = new Folder($repo->getRepositoryPath());

        $this->set('dirsize', $dir->dirsize());
        $this->set('gitRepository', $gitRepository);
        $this->set('tree', $tree);
    }

    /**
     * @param $project
     * @param $branch
     */
    public function commits($project, $branch)
    {
        $repo = new GitRepository($project);
        if ($repo->isEmpty()) {
            $commits = null;
        } else {
            $commits = $repo->getLog($branch);
        }

        $this->set('commits', $commits);
    }

    /**
     * @param $project
     */
    public function branches($project)
    {
        $repo = new GitRepository($project);
        if($repo->isEmpty()) {
            $branches = null;
        } else {
            $branches = $repo->getBranches();
        }

        $this->set('branches', $branches);
    }

    /**
     * @param $project
     */
    public function tags($project) {
        $repo = new GitRepository($project);
        if($repo->isEmpty()) {
            $tags = null;
        } else {
            $tags = $repo->getTags();
        }

        $this->set('tags', $tags);
    }
}
