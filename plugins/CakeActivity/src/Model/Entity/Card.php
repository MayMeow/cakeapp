<?php
namespace CakeActivity\Model\Entity;

use Cake\ORM\Entity;

/**
 * Card Entity
 *
 * @property int $id
 * @property string $name
 * @property string $json_data
 * @property bool $webhook
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Card extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'json_data' => true,
        'webhook' => true,
        'created' => true,
        'modified' => true
    ];

    protected function _getCardData()
    {
        return json_decode($this->_properties['json_data']);
    }
}
