<?php
namespace CakeResource\Controller;

use Cake\Event\Event;
use CakeApp\Component\Core\Helper\RoleHelper;
use MCloudResources\Controller\AppController;

/**
 * Contacts Controller
 *
 * @property \MCloudResources\Model\Table\ContactsTable $Contacts
 *
 * @method \MCloudResources\Model\Entity\Contact[] paginate($object = null, array $settings = [])
 */
class ContactsController extends AbstractContactsController
{
    protected $userActions = ['index', 'view', 'add', 'delete', 'edit'];

    public function isAuthorized($user) : bool
    {
        // Allow all users to list, view and add projects
        if (in_array($this->request->getParam('action'), $this->userActions)){
            if (isset($user['role']) && $user['role'] === RoleHelper::USER_ROLE) {
                return true;
            }
        }

        return parent::isAuthorized($user); // TODO: Change the autogenerated stub
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event); // TODO: Change the autogenerated stub

        $this->set('crud_admin_menu', $this->_adminMenu());
    }
}
