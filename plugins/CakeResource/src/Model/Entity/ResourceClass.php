<?php
namespace CakeResource\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Text;

/**
 * ResourceClass Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $ctrl
 * @property string $package
 * @property string $uid
 * @property string $uname
 * @property string $icon
 * @property string $developer
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class ResourceClass extends Entity
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
        '*' => true,
        'id' => false
    ];

    protected function _setUid()
    {
        return Text::uuid();
    }
}
