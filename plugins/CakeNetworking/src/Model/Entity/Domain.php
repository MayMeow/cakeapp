<?php
namespace CakeNetworking\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Security;

/**
 * Domain Entity
 *
 * @property int $id
 * @property string $name
 * @property string $domain_key
 * @property int $user_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \CakeNetworking\Model\Entity\User $user
 */
class Domain extends Entity
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

    protected function _setDomainKey($name)
    {
        $domain_string = $name . time();

        return Security::hash($domain_string, 'md5', '4s5d4a5s6d5s4d5');
    }
}
