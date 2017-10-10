<?php
use Migrations\AbstractMigration;

class RenameResourceGroupsUsers extends AbstractMigration
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
        $this->table('resource_groups_users')
            ->rename('projects_users');
    }
}
