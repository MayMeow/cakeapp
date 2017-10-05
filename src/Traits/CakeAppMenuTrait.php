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

    /**
     * @return array
     */
    protected function _admin_side_nav_crud_menu()
    {
        return [
            new MenuDropdown('<i class="far fa-database"></i> Overview', ['prefix' => 'admin', 'plugin' => 'CakeAuth', 'controller' => 'Users', 'action' => 'index'], [], [
                new MenuItem('<i class="fa fa-user"></i> Users', ['action' => 'index', 'plugin' => 'CakeAuth', 'controller' => 'Users'], ['escape' => false]),
                new MenuItem('<i class="fa fa-cube"></i> Auth Applications', ['action' => 'index', 'plugin' => 'CakeAuth', 'controller' => 'AuthApplications'], ['escape' => false]),
                new MenuItem('<i class="fa fa-key"></i> SSH Keys', ['action' => 'index', 'plugin' => 'CakeAuth', 'controller' => 'SshKeys'], ['escape' => false]),
                new MenuItem('<i class="fab fa-git"></i> Repositories', ['action' => 'index', 'plugin' => 'CakeStorage', 'controller' => 'GitRepositories'], ['escape' => false, 'class' => 'nav-link']),
                new MenuItem('<i class="fab fa-bitbucket"></i> Buckets', ['action' => 'index', 'plugin' => 'CakeStorage', 'controller' => 'Buckets'], ['escape' => false, 'class' => 'nav-link']),
                new MenuItem('<i class="fa fa-users"></i> Groups', ['action' => 'index', 'plugin' => 'MCloudResources', 'controller' => 'ResourceGroups'], ['escape' => false, 'class' => 'nav-link']),
                new MenuItem('<i class="fa fa-suitcase"></i> Companies', ['action' => 'index', 'plugin' => 'MCloudResources', 'controller' => 'Companies'], ['escape' => false, 'class' => 'nav-link']),
                new MenuItem('<i class="fa fa-phone"></i> Contacts', ['action' => 'index', 'plugin' => 'MCloudResources', 'controller' => 'Contacts'], ['escape' => false, 'class' => 'nav-link']),
                new MenuItem('<i class="fa fa-exclamation"></i> Issues', ['controller' => 'Issues', 'plugin' => 'CakeService', 'action' => 'index'], ['escape' => false]),
                new MenuItem('<i class="fa fa-map-signs"></i> Milestones', ['controller' => 'Milestones', 'plugin' => 'CakeService', 'action' => 'index'], ['escape' => false]),
                new MenuItem('<i class="fa fa-dashboard"></i> Logs', ['action' => 'index', 'plugin' => 'CakeLogs', 'controller' => 'CloudLogs'], ['escape' => false]),
                new MenuItem('<i class="fa fa-clone"></i> Cards', ['plugin' => 'CakeActivity', 'controller' => 'Cards', 'action' => 'index'], ['escape' => false])
            ]),
        ];
    }
}