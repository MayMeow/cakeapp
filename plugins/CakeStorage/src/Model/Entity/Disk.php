<?php
namespace CakeStorage\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Text;

/**
 * Disk Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $uid
 * @property int $size
 * @property string $state
 * @property int $user_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \CakeStorage\Model\Entity\User $user
 */
class Disk extends Entity
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
