<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use App\Factories\MenuFactory;
use App\Traits\CakeAppMenuTrait;
use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;
use CakeApp\Component\Core\Helper\RoleHelper;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    use CakeAppMenuTrait;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'], // Added this line
            'loginAction' => '/users/login', //Added this to ensure correct redirecting from prefixed routes
            /*'authenticate' => [
                'Form',
                'CakeAuth.Token'
            ],*/
            'loginRedirect' => [
                'plugin' => 'MCloudResources',
                'controller' => 'OwnedResources',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                'home'
            ]
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        /*
         * For enable themes uncomment following ling and change theme name of your chioce
         * for more ingormation see https://book.cakephp.org/3.0/en/views/themes.html
         * TODO theme specification for CA2016 APP
         */
        //$this->viewBuilder()->theme('Modern');

        //Default theme for CakeBootstrap
        $theme = Configure::read('CodeAdvent.adminTheme');
        $this->set('CA_DEFAULT_ADMIN_THEME', $theme);

        /*
         * Admin top menu
         *
         * @Deprecated will be removed in next release
         */
        /*$adminMenu = Configure::read('CakeBootstrap.adminTopMenu');
        $this->set('MCLOUD_ADMIN_TOP_MENU', $adminMenu);*/

        //Nav Menu
        $this->set('MCLOUD_NAV_MENU', Configure::read('CakeBootstrap.elektronApp'));

        /*
         * Crud TOP menu
         *
         * Predefined templates from MenuTrait: _home_cloud_crud_top_menu, _full_crud_top_menu
         */
        $this->set('crud_top_menu', $this->_full_crud_top_menu());

        /**
         * Crud Sidebar navigation
         * Only for admin prefix otherwise don't generate it
         */
        if (in_array($this->request->getParam('prefix'), ['admin'])) {
            $this->set('crud_side_nav', MenuFactory::adminSideMenu());
        } else {
            /**
             * Crud Sidebar navigation
             */
            $this->set('crud_side_nav', MenuFactory::userSideMenu());
        }
    }

    /**
     * Top menu for template
     * 1. Add here menu and menu items for create your menu
     * 2. Change Crud TOP menu to: $this->set('crud_top_menu', $this->_crud_top_menu());
     *
     * @return array
     */
    protected function _crud_top_menu()
    {

    }

    public function beforeFilter(Event $event)
    {
        // If you want allow list and view items in model add 'index' and 'view'
        $this->Auth->allow(['display']);
    }

    public function isAuthorized($user) : bool
    {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === RoleHelper::ADMIN_ROLE) {
            return true;
        }

        /*if (in_array($this->request->getParam('prefix'), ['settings'])) {
            if (isset($user['role']) && $user['role'] === 'user') {
                return true;
            }
        }*/

        // Default deny
        return false;
    }
}
