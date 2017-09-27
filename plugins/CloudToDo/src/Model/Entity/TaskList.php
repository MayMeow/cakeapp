<?php
namespace CloudToDo\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * TaskList Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $user_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \CloudToDo\Model\Entity\User $user
 * @property \CloudToDo\Model\Entity\Task[] $tasks
 */
class TaskList extends Entity
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

    protected function _getAllTasksCount()
    {
        $taksTable = TableRegistry::get('CloudToDo.Tasks');

        return $taksTable->find()->where(['Tasks.task_list_id' => $this->_properties['id']])->count();
    }

    protected function _getDoneTasksCount()
    {
        $taksTable = TableRegistry::get('CloudToDo.Tasks');

        return $taksTable->find()->where([
            'Tasks.task_list_id' => $this->_properties['id'],
            'Tasks.done' => true
        ])->count();
    }
}
