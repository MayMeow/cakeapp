<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/23/2017
 * Time: 11:19 PM
 */

namespace App\Factories;

use MayMeow\Crud\View\Menu\MenuItem;

/**
 * Class MenuFactory
 * @package App\Factories
 */
class MenuFactory
{

    /**
     * Menu for CakeAuth Plugin
     * @return array
     */
    public static function iAmAdminMenu ()
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
     */
    public static function activityMenu()
    {
        return [
            new MenuItem('<i class="fa fa-clone"></i> Cards', ['controller' => 'Cards', 'action' => 'index'], ['escape' => false])
        ];
    }

}