<?php
namespace CakeResource\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResourceGroupsUsers Model
 *
 * @property \CakeResource\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 * @property \CakeAuth\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \CakeResource\Model\Entity\ProjectsUser get($primaryKey, $options = [])
 * @method \CakeResource\Model\Entity\ProjectsUser newEntity($data = null, array $options = [])
 * @method \CakeResource\Model\Entity\ProjectsUser[] newEntities(array $data, array $options = [])
 * @method \CakeResource\Model\Entity\ProjectsUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeResource\Model\Entity\ProjectsUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeResource\Model\Entity\ProjectsUser[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeResource\Model\Entity\ProjectsUser findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjectsUsersTable extends Table
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

        $this->setTable('resource_groups_users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ResourceGroups', [
            'foreignKey' => 'resource_group_id',
            'joinType' => 'INNER',
            'className' => 'CakeResource.ResourceGroups'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'CakeAuth.Users'
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
            ->requirePresence('role', 'create')
            ->notEmpty('role');

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
