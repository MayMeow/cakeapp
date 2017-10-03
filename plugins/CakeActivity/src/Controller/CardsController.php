<?php
namespace CakeActivity\Controller;

use Cake\Event\Event;
use CakeActivity\Controller\AppController;
use CakeApp\Component\Core\Helper\RoleHelper;

/**
 * Cards Controller
 *
 * @property \CakeActivity\Model\Table\CardsTable $Cards
 *
 * @method \CakeActivity\Model\Entity\Card[] paginate($object = null, array $settings = [])
 */
class CardsController extends AbstractCardsController
{
    /**
     * All Actions need existing users with role set to User
     */
     protected $userActions = ['index'];
}
