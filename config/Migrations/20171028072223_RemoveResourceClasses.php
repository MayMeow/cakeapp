<?php
use Migrations\AbstractMigration;

class RemoveResourceClasses extends AbstractMigration
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
        if ($this->table('resource_classes')->exists()) {
            $this->table('resource_classes')->drop();
        }
    }
}
