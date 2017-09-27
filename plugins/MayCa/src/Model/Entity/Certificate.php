<?php
namespace MayCa\Model\Entity;

use Cake\ORM\Entity;

/**
 * Certificate Entity
 *
 * @property int $id
 * @property string $internal_name
 * @property string $common_name
 * @property string $email
 * @property string $country
 * @property string $province
 * @property string $locality
 * @property string $organization
 * @property string $organization_unit
 * @property string $uid
 * @property string $type
 * @property string $parent_id
 * @property string $lft
 * @property string $rght
 * @property bool $ca
 * @property bool $signed
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \MayCa\Model\Entity\Certificate $ca_to_sign
 */
class Certificate extends Entity
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

    /**
     * method _getDN
     * Returns formatted DomainName as string
     * @return string
     */
    protected function _getDN()
    {
        $dn = 'CN:' . $this->_properties['common_name'] . '/';
        $dn .= 'E:' . $this->_properties['email'] . '/';
        $dn .= 'C:' . $this->_properties['country'] . '/';
        $dn .= 'P:' . $this->_properties['province'] . '/';
        $dn .= 'L:' . $this->_properties['locality'] . '/';
        $dn .= 'O:' . $this->_properties['organization'] . '/';
        $dn .= 'OU:' . $this->_properties['organization_unit'] . '/';

        return $dn;
    }
}
