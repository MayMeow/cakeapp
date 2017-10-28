<?php
use Migrations\AbstractMigration;

class RemoveOwnedResources extends AbstractMigration
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
        if ($this->table('owned_resources')->exists()) {
            $this->table('owned_resources')->drop();
        }
    }
}
