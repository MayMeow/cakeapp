<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/23/2017
 * Time: 11:19 PM
 */

namespace App\Factories;

use MayMeow\Crud\View\Menu\MenuDropdown;
use MayMeow\Crud\View\Menu\MenuItem;

/**
 * Class MenuFactory
 * @package App\Factories
 */
class MenuFactory
{
    public static function userSideMenu()
    {
        return [
            /**
             * Activity
             */
            new MenuDropdown('<i class="far fa-database"></i> Activity', ['prefix' => false, 'plugin' => 'CakeActivity', 'controller' => 'Cards', 'action' => 'index'], ['escape' => false], [
                new MenuItem('<i class="fa fa-clone"></i> Cards', ['plugin' => 'CakeActivity', 'controller' => 'Cards', 'action' => 'index'], ['escape' => false])
            ]),
            /**
             * CakeAuth
             */
            new MenuDropdown('<i class="far fa-shield-alt"></i> IAM & Admin', ['prefix' => false, 'plugin' => 'CakeAuth', 'controller' => 'Users', 'action' => 'index'], ['escape' => false], [
                new MenuItem('<i class="fa fa-user"></i> Users', ['plugin' => 'CakeAuth', 'action' => 'index', 'controller' => 'Users'], ['escape' => false]),
                new MenuItem('<i class="fa fa-cube"></i> Auth Applications', ['plugin' => 'CakeAuth', 'action' => 'index', 'controller' => 'AuthApplications'], ['escape' => false]),
                new MenuItem('<i class="fa fa-key"></i> SSH Keys', ['plugin' => 'CakeAuth', 'action' => 'index', 'controller' => 'SshKeys'], ['escape' => false]),
            ]),
            /**
             * MCLoudResources
             */
            new MenuDropdown('<i class="far fa-cube"></i> Resources', ['prefix' => false, 'plugin' => 'MCloudResources', 'controller' => 'ResourceGroups', 'action' => 'index'], ['escape' => false], [
                new MenuItem('<i class="fa fa-users"></i> Groups', ['plugin' => 'MCloudResources', 'action' => 'index', 'controller' => 'ResourceGroups'], ['escape' => false, 'class' => 'nav-link']),
                new MenuItem('<i class="fa fa-suitcase"></i> Companies', ['plugin' => 'MCloudResources', 'action' => 'index', 'controller' => 'Companies'], ['escape' => false, 'class' => 'nav-link']),
                new MenuItem('<i class="fa fa-phone"></i> Contacts', ['plugin' => 'MCloudResources', 'action' => 'index', 'controller' => 'Contacts'], ['escape' => false, 'class' => 'nav-link']),
            ]),
            /**
             * CakeStorage
             */
            new MenuDropdown('<i class="far fa-server"></i> Storage', ['prefix' => false, 'plugin' => 'CakeStorage', 'controller' => 'GitRepositories', 'action' => 'index'], ['escape' => false], [
                new MenuItem('<i class="fab fa-git"></i> Repositories', ['plugin' => 'CakeStorage', 'action' => 'index', 'controller' => 'GitRepositories'], ['escape' => false, 'class' => 'nav-link']),
                new MenuItem('<i class="fab fa-bitbucket"></i> Buckets', ['plugin' => 'CakeStorage', 'action' => 'index', 'controller' => 'Buckets'], ['escape' => false, 'class' => 'nav-link']),
            ]),
            /**
             * MayCA
             */
            new MenuDropdown('<i class="far fa-certificate"></i> CA', ['prefix' => false, 'plugin' => 'MayCa', 'controller' => 'Certificates', 'action' => 'index'], ['escape' => false], [
                new MenuItem('<i class="fa fa-key"></i> Certificates', ['plugin' => 'MayCa', 'controller' => 'Certificates', 'action' => 'index'], ['escape' => false])
            ]),
            /**
             * CakeService
             */
            new MenuDropdown('<i class="far fa-clipboard"></i> Service desk', ['prefix' => false, 'plugin' => 'CakeService', 'controller' => 'Issues', 'action' => 'index'], ['escape' => false], [
                new MenuItem('<i class="fa fa-exclamation"></i> Issues', ['plugin' => 'CakeService', 'controller' => 'Issues', 'action' => 'index'], ['escape' => false]),
                new MenuItem('<i class="fa fa-map-signs"></i> Milestones', ['plugin' => 'CakeService', 'controller' => 'Milestones', 'action' => 'index'], ['escape' => false])
            ]),
            /**
             * CakeMonitoring
             */
            new MenuDropdown('<i class="far fa-chart-bar"></i> Monitoring', ['prefix' => false, 'plugin' => 'CakeLogs', 'controller' => 'CloudLogs', 'action' => 'index'], ['escape' => false], [
                new MenuItem('<i class="fa fa-dashboard"></i> Logs', ['plugin' => 'CakeLogs', 'action' => 'index', 'controller' => 'CloudLogs'], ['escape' => false]),
            ]),
        ];
    }

    public static function adminSideMenu()
    {
        return [
            new MenuDropdown('<i class="far fa-database"></i> Overview', ['prefix' => 'admin', 'plugin' => 'CakeAuth', 'controller' => 'Users', 'action' => 'index'], [], [
                new MenuItem('<i class="fa fa-user"></i> Users', ['action' => 'index', 'plugin' => 'CakeAuth', 'controller' => 'Users'], ['escape' => false]),
                new MenuItem('<i class="fa fa-cube"></i> Auth Applications', ['action' => 'index', 'plugin' => 'CakeAuth', 'controller' => 'AuthApplications'], ['escape' => false]),
                new MenuItem('<i class="fa fa-key"></i> SSH Keys', ['action' => 'index', 'plugin' => 'CakeAuth', 'controller' => 'SshKeys'], ['escape' => false]),
                //new MenuItem('<i class="fab fa-git"></i> Repositories', ['action' => 'index', 'plugin' => 'CakeStorage', 'controller' => 'GitRepositories'], ['escape' => false, 'class' => 'nav-link']),
                //new MenuItem('<i class="fab fa-bitbucket"></i> Buckets', ['action' => 'index', 'plugin' => 'CakeStorage', 'controller' => 'Buckets'], ['escape' => false, 'class' => 'nav-link']),
                //new MenuItem('<i class="fa fa-users"></i> Groups', ['action' => 'index', 'plugin' => 'MCloudResources', 'controller' => 'ResourceGroups'], ['escape' => false, 'class' => 'nav-link']),
                //new MenuItem('<i class="fa fa-suitcase"></i> Companies', ['action' => 'index', 'plugin' => 'MCloudResources', 'controller' => 'Companies'], ['escape' => false, 'class' => 'nav-link']),
                //new MenuItem('<i class="fa fa-phone"></i> Contacts', ['action' => 'index', 'plugin' => 'MCloudResources', 'controller' => 'Contacts'], ['escape' => false, 'class' => 'nav-link']),
                //new MenuItem('<i class="fa fa-exclamation"></i> Issues', ['controller' => 'Issues', 'plugin' => 'CakeService', 'action' => 'index'], ['escape' => false]),
                //new MenuItem('<i class="fa fa-map-signs"></i> Milestones', ['controller' => 'Milestones', 'plugin' => 'CakeService', 'action' => 'index'], ['escape' => false]),
                //new MenuItem('<i class="fa fa-dashboard"></i> Logs', ['action' => 'index', 'plugin' => 'CakeLogs', 'controller' => 'CloudLogs'], ['escape' => false]),
                //new MenuItem('<i class="fa fa-clone"></i> Cards', ['plugin' => 'CakeActivity', 'controller' => 'Cards', 'action' => 'index'], ['escape' => false])
            ]),
        ];
    }

    /**
     * Menu for CakeAuth Plugin
     * @return array
     * @deprecated
     */
    public static function iAmAdminMenu()
    {
        return [
            new MenuItem('<i class="fa fa-user"></i> Users', ['action' => 'index', 'controller' => 'Users'], ['escape' => false]),
            new MenuItem('<i class="fa fa-cube"></i> Auth Applications', ['action' => 'index', 'controller' => 'AuthApplications'], ['escape' => false]),
            new MenuItem('<i class="fa fa-key"></i> SSH Keys', ['action' => 'index', 'controller' => 'SshKeys'], ['escape' => false]),
        ];
    }

    /**
     * Menu for CakeStorage Plugin
     * @return array
     * @deprecated
     */
    public static function storageMenu()
    {
        return [
            new MenuItem('<i class="fab fa-git"></i> Repositories', ['action' => 'index', 'controller' => 'GitRepositories'], ['escape' => false, 'class' => 'nav-link']),
            new MenuItem('<i class="fab fa-bitbucket"></i> Buckets', ['action' => 'index', 'controller' => 'Buckets'], ['escape' => false, 'class' => 'nav-link']),
        ];
    }

    /**
     * Menu for Resource Plugins
     * @return array
     * @deprecated
     */
    public static function resourcesMenu()
    {
        return [
            new MenuItem('<i class="fa fa-users"></i> Groups', ['action' => 'index', 'controller' => 'ResourceGroups'], ['escape' => false, 'class' => 'nav-link']),
            new MenuItem('<i class="fa fa-suitcase"></i> Companies', ['action' => 'index', 'controller' => 'Companies'], ['escape' => false, 'class' => 'nav-link']),
            new MenuItem('<i class="fa fa-phone"></i> Contacts', ['action' => 'index', 'controller' => 'Contacts'], ['escape' => false, 'class' => 'nav-link']),
        ];
    }

    /**
     * Menu for Certification Authority Plugin
     * CakeApp EE
     * @return array
     * @deprecated
     */
    public static function caMenu()
    {
        return [
            new MenuItem('<i class="fa fa-key"></i> Certificates', ['controller' => 'Certificates', 'action' => 'index'], ['escape' => false])
        ];
    }

    /**
     * Menu for Service Desk
     * @return array
     * @deprecated
     */
    public static function serviceDeskMenu()
    {
        return [
            new MenuItem('<i class="fa fa-exclamation"></i> Issues', ['controller' => 'Issues', 'action' => 'index'], ['escape' => false]),
            new MenuItem('<i class="fa fa-map-signs"></i> Milestones', ['controller' => 'Milestones', 'action' => 'index'], ['escape' => false])
        ];
    }

    /**
     * Menu for monitoring
     * @return array
     * @deprecated
     */
    public static function monitoringMenu()
    {
        return [
            new MenuItem('<i class="fa fa-dashboard"></i> Logs', ['action' => 'index', 'controller' => 'CloudLogs'], ['escape' => false]),
        ];
    }

    /**
     * Menu For Activity plugin
     * @return array
     * @deprecated
     */
    public static function activityMenu()
    {
        return [
            new MenuItem('<i class="fa fa-clone"></i> Cards', ['controller' => 'Cards', 'action' => 'index'], ['escape' => false])
        ];
    }

    /**
     * Admin menu
     * @return array
     * @deprecated
     */
    public static function adminOverviewMenu()
    {
        return [
            new MenuItem('<i class="fa fa-user"></i> Users', ['action' => 'index', 'controller' => 'Users'], ['escape' => false]),
            new MenuItem('<i class="fa fa-cube"></i> Auth Applications', ['action' => 'index', 'controller' => 'AuthApplications'], ['escape' => false]),
            new MenuItem('<i class="fa fa-key"></i> SSH Keys', ['action' => 'index', 'controller' => 'SshKeys'], ['escape' => false]),
            new MenuItem('<i class="fab fa-git"></i> Repositories', ['action' => 'index', 'controller' => 'GitRepositories'], ['escape' => false, 'class' => 'nav-link']),
            new MenuItem('<i class="fab fa-bitbucket"></i> Buckets', ['action' => 'index', 'controller' => 'Buckets'], ['escape' => false, 'class' => 'nav-link']),
            new MenuItem('<i class="fa fa-users"></i> Groups', ['action' => 'index', 'controller' => 'ResourceGroups'], ['escape' => false, 'class' => 'nav-link']),
            new MenuItem('<i class="fa fa-suitcase"></i> Companies', ['action' => 'index', 'controller' => 'Companies'], ['escape' => false, 'class' => 'nav-link']),
            new MenuItem('<i class="fa fa-phone"></i> Contacts', ['action' => 'index', 'controller' => 'Contacts'], ['escape' => false, 'class' => 'nav-link']),
            new MenuItem('<i class="fa fa-exclamation"></i> Issues', ['controller' => 'Issues', 'action' => 'index'], ['escape' => false]),
            new MenuItem('<i class="fa fa-map-signs"></i> Milestones', ['controller' => 'Milestones', 'action' => 'index'], ['escape' => false]),
            new MenuItem('<i class="fa fa-dashboard"></i> Logs', ['action' => 'index', 'controller' => 'CloudLogs'], ['escape' => false]),
            new MenuItem('<i class="fa fa-clone"></i> Cards', ['controller' => 'Cards', 'action' => 'index'], ['escape' => false])
        ];
    }

}