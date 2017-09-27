<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/20/2017
 * Time: 9:27 PM
 */

namespace CakeActivity\Factory;

use Cake\ORM\TableRegistry;
use CakeActivity\Model\CardTemplate;
use CakeActivity\Model\Entity\Card;
use CakeApp\Component\IO\Serializer\ObjectSerializer;

/**
 * Class ActivityFactory
 * @package CakeActivity\Factory
 */
class ActivityFactory
{
    /**
     * @param CardTemplate $cardTemplate
     */
    public static function createCard(CardTemplate $cardTemplate)
    {
        $activityTable = TableRegistry::get('cards');
        $newCard = new Card();

        $serializer = new ObjectSerializer();

        $newCard->name = 'test';
        $newCard->json_data = $serializer->serialize($cardTemplate);
        $newCard->webhook = false;
        $newCard->created = time();
        $newCard->modified = time();

        $activityTable->save($newCard);
    }
}