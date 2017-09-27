<?php
namespace CakeLogs\Model\Entity;

use Cake\ORM\Entity;

/**
 * CloudLog Entity
 *
 * @property int $id
 * @property string $resource_key
 * @property string $event_type
 * @property string $severity
 * @property string $json_data
 * @property \Cake\I18n\Time $created
 */
class CloudLog extends Entity
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

    public function _getServerResponse()
    {
        $payload = json_decode($this->_properties['json_data']);
        $serverResponse = $payload->jsonPayload;

        return json_encode($serverResponse);

    }
}
