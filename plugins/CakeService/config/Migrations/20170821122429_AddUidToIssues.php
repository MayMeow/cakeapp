<?php
use Migrations\AbstractMigration;

class AddUidToIssues extends AbstractMigration
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
        $table = $this->table('issues');
        $table->addColumn('uid', 'uuid', [
            'default' => '00000000-0000-0000-0000-000000000000',
            'null' => false,
        ]);
        $table->update();
    }
}
