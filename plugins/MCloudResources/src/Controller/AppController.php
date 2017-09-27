<?php

namespace MCloudResources\Controller;

use App\Controller\AppController as BaseController;
use MayMeow\Crud\View\Menu\MenuItem;

class AppController extends BaseController
{

    protected function _adminMenu()
    {
        return [
            new MenuItem('<i class="fa fa-users"></i> Groups', ['action' => 'index', 'controller' => 'ResourceGroups'], ['escape' => false, 'class' => 'nav-link']),
            new MenuItem('<i class="fa fa-suitcase"></i> Companies', ['action' => 'index', 'controller' => 'Companies'], ['escape' => false, 'class' => 'nav-link']),
            new MenuItem('<i class="fa fa-phone"></i> Contacts', ['action' => 'index', 'controller' => 'Contacts'], ['escape' => false, 'class' => 'nav-link']),
        ];
    }

}
