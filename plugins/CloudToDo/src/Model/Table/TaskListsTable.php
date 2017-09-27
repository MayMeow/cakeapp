<?php
namespace CloudToDo\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TaskLists Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Tasks
 *
 * @method \CloudToDo\Model\Entity\TaskList get($primaryKey, $options = [])
 * @method \CloudToDo\Model\Entity\TaskList newEntity($data = null, array $options = [])
 * @method \CloudToDo\Model\Entity\TaskList[] newEntities(array $data, array $options = [])
 * @method \CloudToDo\Model\Entity\TaskList|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CloudToDo\Model\Entity\TaskList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CloudToDo\Model\Entity\TaskList[] patchEntities($entities, array $data, array $options = [])
 * @method \CloudToDo\Model\Entity\TaskList findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TaskListsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('task_lists');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'CloudToDo.Users'
        ]);
        $this->hasMany('Tasks', [
            'foreignKey' => 'task_list_id',
            'className' => 'CloudToDo.Tasks'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
