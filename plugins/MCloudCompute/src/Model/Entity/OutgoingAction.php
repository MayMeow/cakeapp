<?php
namespace MCloudCompute\Model\Entity;

use Cake\ORM\Entity;

/**
 * OutgoingAction Entity
 *
 * @property int $id
 * @property string $app_key
 * @property string $app_secret
 * @property string $payload
 * @property string $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class OutgoingAction extends Entity
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
