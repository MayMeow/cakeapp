<?php
namespace CakeAuth\Controller;

use Cake\Event\Event;

/**
 * AuthApplications Controller
 *
 * @property \CakeAuth\Model\Table\AuthApplicationsTable $AuthApplications
 */
class AuthApplicationsController extends AbstractAuthApplicationsController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event); // TODO: Change the autogenerated stub

        $this->set('crud_admin_menu', $this->_adminMenu());
    }

    public function isAuthorized($user) : bool
    {
        // Allow all users to list, view and add projects
        if (in_array($this->request->getParam('action'), ['view', 'index', 'add'])){
            if (isset($user['role']) && $user['role'] === 'user') {
                return true;
            }
        }

        if (in_array($this->request->getParam('action'), ['edit', 'delete'])){
            $id = $this->request->getParam('pass.0');
            if ($this->AuthApplications->isOwnedBy($id, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user); // TODO: Change the autogenerated stub
    }

}
