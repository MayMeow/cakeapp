<?php

namespace CakeLogs\Controller;

use App\Controller\AppController as BaseController;
use App\Factories\MenuFactory;

class AppController extends BaseController
{

    /**
     * Method _adminMenu
     *
     * @return array
     */
    protected function _adminMenu()
    {
        return MenuFactory::monitoringMenu();
    }

}
