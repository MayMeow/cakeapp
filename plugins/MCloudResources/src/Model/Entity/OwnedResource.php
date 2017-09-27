<?php
namespace MCloudResources\Model\Entity;

use Cake\ORM\Entity;

/**
 * OwnedResource Entity
 *
 * @property int $id
 * @property string $name
 * @property int $resource_group_id
 * @property int $resource_class_id
 * @property int $user_id
 * @property int $instance_key
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \MCloudResources\Model\Entity\ResourceGroup $resource_group
 * @property \MCloudResources\Model\Entity\ResourceClass $resource_class
 * @property \MCloudResources\Model\Entity\User $user
 */
class OwnedResource extends Entity
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
