<?php
namespace CakeCommunication\Controller\Api\V1;

use CakeCommunication\Controller\AbstractRoomsController;
use CakeCommunication\Controller\AppController;
use Cake\ORM\TableRegistry;
use MayMeow\Api\ServerResponse;

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
     * @param null $id
     */
    public function addComment($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newComment = $this->loadModel('CakeCommunication.Comments');
            $comment = $newComment->newEntity();
            $newComment->patchEntity($comment, $this->request->getData());

            // update user information
            $comment->user_id = $this->Auth->user('id');

            //TODO pridavanie komentov do stromu
            // pokial predosly komentar ma user_id a room_id rovnake ako ten co pridavam tak:
            // Ak ma nastaveny parent_id tak parent_id noveho nastav rovnake ako parent_id predosleho
            // Ak nema nastavene parent id tak: parent_id noveho = id predosleho.
            // inak parent_id = null a nemeime ho.
            if($newComment->save($comment)) {
                $tt = TableRegistry::get('RoomsComments');
                $link = $tt->newEntity();
                $link->comment_id = $comment->id;
                $link->room_id = $id;

                $tt->save($link);
            };

            $this->set('newComment', $comment);
        }
    }
}
