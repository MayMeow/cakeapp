<?php
namespace App\Shell;

use Cake\Console\Shell;

/**
 * CakeAppMigrations shell command.
 */
class CakeAppMigrationsShell extends Shell
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
        $this->out($this->OptionParser->help());
    }

    public function migrate()
    {
        // Run migrations if need change project name here
        $this->dispatchShell('migrations migrate');

        // Runs other plugins migrations
        $this->dispatchShell('migrations migrate -p CakeAuth');
        $this->dispatchShell('migrations migrate -p CakeStorage');
        $this->dispatchShell('migrations migrate -p CakeNetworking');
        $this->dispatchShell('migrations migrate -p CakeResource');
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

    public function status()
    {
        // Run migrations if need change project name here
        $this->dispatchShell('migrations status');

        // Runs other plugins migrations
        $this->dispatchShell('migrations status -p CakeAuth');
        $this->dispatchShell('migrations status -p CakeStorage');
        $this->dispatchShell('migrations status -p CakeNetworking');
        $this->dispatchShell('migrations status -p CakeResource');
        $this->dispatchShell('migrations status -p MCloudHome');
        $this->dispatchShell('migrations status -p MCloudCompute');
        $this->dispatchShell('migrations status -p CloudToDo');
        $this->dispatchShell('migrations status -p MayCa');
        $this->dispatchShell('migrations status -p CakeService');
        $this->dispatchShell('migrations status -p CakeCommunication');
        $this->dispatchShell('migrations status -p CakeTaxonomy');
        $this->dispatchShell('migrations status -p CakeLogs');
        $this->dispatchShell('migrations status -p CakeConfigure');
        $this->dispatchShell('migrations status -p CakeActivity');
        //$this->out($this->OptionParser->help());
    }
}
