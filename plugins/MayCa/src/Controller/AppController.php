<?php

namespace MayCa\Controller;

use App\Controller\AppController as BaseController;
use MayMeow\Crud\View\Menu\MenuItem;

class AppController extends BaseController
{
    protected function _adminMenu()
    {
        return [
            new MenuItem('<i class="fa fa-key"></i> Certificates', ['controller' => 'Certificates', 'action' => 'index'], ['escape' => false])
        ];
    }
}
