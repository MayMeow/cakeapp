<?php
use Migrations\AbstractMigration;

class RenameForeignKeyInProjectsUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $this->table('projects_users')
            ->renameColumn('resource_group_id', 'project_id');
    }
}
