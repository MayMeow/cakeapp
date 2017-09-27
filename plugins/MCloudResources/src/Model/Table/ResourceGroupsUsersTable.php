<?php
namespace MCloudResources\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResourceGroupsUsers Model
 *
 * @property \MCloudResources\Model\Table\ResourceGroupsTable|\Cake\ORM\Association\BelongsTo $ResourceGroups
 * @property \MCloudResources\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \MCloudResources\Model\Entity\ResourceGroupsUser get($primaryKey, $options = [])
 * @method \MCloudResources\Model\Entity\ResourceGroupsUser newEntity($data = null, array $options = [])
 * @method \MCloudResources\Model\Entity\ResourceGroupsUser[] newEntities(array $data, array $options = [])
 * @method \MCloudResources\Model\Entity\ResourceGroupsUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MCloudResources\Model\Entity\ResourceGroupsUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MCloudResources\Model\Entity\ResourceGroupsUser[] patchEntities($entities, array $data, array $options = [])
 * @method \MCloudResources\Model\Entity\ResourceGroupsUser findOrCreate($search, callable $callback = null, $options = [])
 */
class ResourceGroupsUsersTable extends Table
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
            'className' => 'MCloudResources.ResourceGroups'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'MCloudResources.Users'
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
        $rules->add($rules->existsIn(['resource_group_id'], 'ResourceGroups'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
