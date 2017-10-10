<?php
use Migrations\AbstractMigration;

class RenameResourceGroupsPhinx extends AbstractMigration
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
        /**
         * Rename table for m_cloud_resources to cake_resource
         */
        if ($this->table('m_cloud_resources_phinxlog')->exists()) {
            $this->table('m_cloud_resources_phinxlog')
                ->rename('cake_resource_phinxlog');
        }
    }
}
