<?php
namespace CakeService\Model\Entity;

use Cake\ORM\Entity;

/**
 * Issue Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Cake\I18n\FrozenDate $due_date
 * @property int $estimate
 * @property int $user_id
 * @property bool $finished
 * @property integer $vote_up_count
 * @property integer $vote_down_count
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \CakeService\Model\Entity\User $user
 * @property \CakeService\Model\Entity\IssuesAssignee[] $issues_assignees
 * @property \CakeService\Model\Entity\Comment[] $comments
 */
class Issue extends Entity
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
