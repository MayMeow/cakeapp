<?php
namespace App\Shell;

use Cake\Console\Shell;

/**
 * McloudSetup shell command.
 */
class McloudSetupShell extends Shell
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        $this->dispatchShell('migrations migrate -p CakeAuth');
        $this->dispatchShell('migrations migrate -p CakeStorage');
        $this->dispatchShell('migrations migrate -p CakeNetworking');
        $this->dispatchShell('migrations migrate -p MCloudResources');
        $this->dispatchShell('migrations migrate -p MCloudHome');
        $this->dispatchShell('migrations migrate -p MCloudCompute');
        $this->dispatchShell('migrations migrate -p CloudToDo');
        $this->dispatchShell('migrations migrate -p MayCa');
        $this->dispatchShell('migrations migrate -p CakeService');
        $this->dispatchShell('migrations migrate -p CakeCommunication');
        $this->dispatchShell('migrations migrate -p CakeTaxonomy');
        $this->dispatchShell('migrations migrate -p CakeLogs');
        $this->dispatchShell('migrations migrate -p CakeConfigure');
        $this->dispatchShell('migrations migrate -p CakeActivity');
        //$this->out($this->OptionParser->help());
    }
}
