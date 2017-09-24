<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/23/2017
 * Time: 10:54 PM
 */

namespace App\Traits;

use MayMeow\Crud\View\Menu\MenuDropdown;
use MayMeow\Crud\View\Menu\MenuItem;

trait CakeAppMenuTrait
{

    /**
     * Predefined menu for Full application
     *
     * @return array
     */
    protected function _full_crud_top_menu()
    {
        return [
           /* new MenuDropdown('<i class="fa fa-th"></i>', [
                new MenuItem('Authentication', ['prefix' => false, 'plugin' => 'CakeAuth', 'controller' => 'Users', 'action' => 'index']),
                new MenuItem('Resources', ['prefix' => false, 'plugin' => 'MCloudResources', 'controller' => 'ResourceGroups', 'action' => 'index']),
                new MenuItem('Storage', ['prefix' => false, 'plugin' => 'CakeStorage', 'controller' => 'GitRepositories', 'action' => 'index']),
                new MenuItem('Issues', ['prefix' => false, 'plugin' => 'CakeService', 'controller' => 'Issues', 'action' => 'index']),
            ]),*/

            new MenuDropdown('<i class="fa fa-plus"></i>', [
                new MenuItem('Repository', ['prefix' => false, 'plugin' => 'CakeStorage', 'controller' => 'GitRepositories', 'action' => 'add']),
                new MenuItem('Resource group', ['prefix' => false, 'plugin' => 'MCloudResources', 'controller' => 'ResourceGroups', 'action' => 'add']),
                new MenuItem('Channel', ['prefix' => false, 'plugin' => 'CakeCommunication', 'controller' => 'Rooms', 'action' => 'add']),
                new MenuItem('Issue', ['prefix' => false, 'plugin' => 'CakeService', 'controller' => 'Issues', 'action' => 'add'])
            ]),
        ];
    }

    /**
     * Sidebar Navigation
     *
     * @return array
     */
    protected function _side_nav_crud_menu()
    {
        return [
            new MenuItem('<i class="far fa-database"></i> Activity', ['prefix' => false, 'plugin' => 'CakeActivity', 'controller' => 'Cards', 'action' => 'index']),
            new MenuItem('<i class="far fa-shield-alt"></i> IAM & Admin', ['prefix' => false, 'plugin' => 'CakeAuth', 'controller' => 'Users', 'action' => 'index']),
            new MenuItem('<i class="far fa-cube"></i> Resources', ['prefix' => false, 'plugin' => 'MCloudResources', 'controller' => 'ResourceGroups', 'action' => 'index']),
            new MenuItem('<i class="far fa-server"></i> Storage', ['prefix' => false, 'plugin' => 'CakeStorage', 'controller' => 'GitRepositories', 'action' => 'index']),
            //new MenuItem('Networking', ['prefix' => false, 'plugin' => 'CakeNetworking', 'controller' => 'Domains', 'action' => 'index']),
            //new MenuItem('Compute engine', ['prefix' => false, 'plugin' => 'MCloudCompute', 'controller' => 'Containers', 'action' => 'index']),
            //new MenuItem('Home Cloud', ['prefix' => false, 'plugin' => 'MCloudHome', 'controller' => 'Devices', 'action' => 'index']),
            //new MenuItem('ToDos', ['prefix' => false, 'plugin' => 'CloudToDo', 'controller' => 'Tasks', 'action' => 'index']),
            new MenuItem('<i class="far fa-certificate"></i> CA', ['prefix' => false, 'plugin' => 'MayCa', 'controller' => 'Certificates', 'action' => 'index']),
            new MenuItem('<i class="far fa-clipboard"></i> Service desk', ['prefix' => false, 'plugin' => 'CakeService', 'controller' => 'Issues', 'action' => 'index']),
            new MenuItem('<i class="far fa-chart-bar"></i> Monitoring', ['prefix' => false, 'plugin' => 'CakeLogs', 'controller' => 'CloudLogs', 'action' => 'index']),
            //new MenuItem('Communication', ['prefix' => false, 'plugin' => 'CakeCommunication', 'controller' => 'Rooms', 'action' => 'index'])
        ];
    }
}