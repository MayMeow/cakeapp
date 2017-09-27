<?php

namespace MCloudHome\Controller;

use App\Controller\AppController as BaseController;
use MayMeow\Crud\View\Menu\MenuItem;

class AppController extends BaseController
{

    protected function _adminMenu()
    {
        return [
            new MenuItem('<i class="fa fa-codepen"></i> Devices', ['action' => 'index', 'controller' => 'Devices'], ['escape' => false]),
        ];
    }

}
