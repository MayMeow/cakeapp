<?php
use Migrations\AbstractMigration;

class RemoveResourceDevices extends AbstractMigration
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
        if ($this->table('devices')->exists()) {
            $this->table('devices') ->drop();
        }
    }
}
