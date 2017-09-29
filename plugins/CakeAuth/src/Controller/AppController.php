<?php

namespace CakeAuth\Controller;

use App\Controller\AppController as BaseController;
use App\Factories\MenuFactory;
use MayMeow\Crud\View\Menu\MenuItem;

class AppController extends BaseController
{
    protected function _adminMenu()
    {
        return MenuFactory::iAmAdminMenu();
    }
}
