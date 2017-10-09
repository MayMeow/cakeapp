<?php
use Migrations\AbstractMigration;

class RenameForeignKeyInBuckets extends AbstractMigration
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
        $this->table('buckets')
            ->renameColumn('resource_group_id', 'project_id');
    }
}
