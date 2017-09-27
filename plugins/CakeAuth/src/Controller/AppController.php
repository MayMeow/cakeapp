<?php

namespace CakeAuth\Controller;

use App\Controller\AppController as BaseController;
use MayMeow\Crud\View\Menu\MenuItem;

class AppController extends BaseController
{
    protected function _adminMenu()
    {
        return [
            new MenuItem('<i class="fa fa-user"></i> Users', ['action' => 'index', 'controller' => 'Users'], ['escape' => false]),
            new MenuItem('<i class="fa fa-cube"></i> Auth Applications', ['action' => 'index', 'controller' => 'AuthApplications'], ['escape' => false]),
            new MenuItem('<i class="fa fa-key"></i> SSH Keys', ['action' => 'index', 'controller' => 'SshKeys'], ['escape' => false]),
        ];
    }
}
