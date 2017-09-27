<?php
namespace CakeCommunication\Controller;

use CakeCommunication\Controller\AppController;

/**
 * Rooms Controller
 *
 * @property \CakeCommunication\Model\Table\RoomsTable $Rooms
 *
 * @method \CakeCommunication\Model\Entity\Room[] paginate($object = null, array $settings = [])
 */
class RoomsController extends AbstractRoomsController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * View method
     *
     * @param string|null $id Room id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('id', $id);
        $this->set('_serialize', ['id']);
    }
}
