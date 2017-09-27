<?php
use Migrations\AbstractMigration;

class AddBranchesToGitRepositories extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('git_repositories');
        $table->addColumn('default_branch', 'string', [
            'default' => 'master',
            'limit' => 255,
            'null' => false,
        ]);
        $table->update();
    }
}
