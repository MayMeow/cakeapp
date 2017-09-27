<?php
namespace MCloudResources\Model\Entity;

use Cake\ORM\Entity;

/**
 * ResourceGroupsUser Entity
 *
 * @property int $id
 * @property int $resource_group_id
 * @property int $user_id
 * @property string $role
 *
 * @property \MCloudResources\Model\Entity\ResourceGroup $resource_group
 * @property \MCloudResources\Model\Entity\User $user
 */
class ResourceGroupsUser extends Entity
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
