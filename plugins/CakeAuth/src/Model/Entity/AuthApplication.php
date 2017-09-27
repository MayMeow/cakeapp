<?php
namespace CakeAuth\Model\Entity;

use Cake\ORM\Entity;

/**
 * AuthApplication Entity
 *
 * @property int $id
 * @property string $name
 * @property string $client_key
 * @property string $client_secret
 * @property string $description
 * @property string $homepage_url
 * @property string $callback_url
 * @property string $user_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \CakeAuth\Model\Entity\User $user
 * @property \CakeAuth\Model\Entity\AccessToken[] $access_tokens
 */
class AuthApplication extends Entity
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
}
