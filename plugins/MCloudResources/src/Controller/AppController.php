<?php

namespace MCloudResources\Controller;

use App\Controller\AppController as BaseController;
use App\Factories\MenuFactory;

class AppController extends BaseController
{

    protected function _adminMenu()
    {
        return MenuFactory::resourcesMenu();
    }

}
