<?php
use Migrations\AbstractMigration;

class RenameMCloudLogging extends AbstractMigration
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
        if ($this->table('m_cloud_logging_phinxlog')->exists()) {
            $this->table('m_cloud_logging_phinxlog')
                ->rename('cake_logs_phinxlog');
        }
    }
}
