<?php
namespace CakeNetworking\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContentDeliveryNetwork Entity
 *
 * @property int $id
 * @property string $name
 * @property int $bucket_id
 * @property int $user_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \CakeNetworking\Model\Entity\Bucket $bucket
 * @property \CakeNetworking\Model\Entity\User $user
 */
class ContentDeliveryNetwork extends Entity
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
