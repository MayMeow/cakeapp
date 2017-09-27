<?php
namespace MCloudResources\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResourceGroups Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \MCloudResources\Model\Entity\ResourceGroup get($primaryKey, $options = [])
 * @method \MCloudResources\Model\Entity\ResourceGroup newEntity($data = null, array $options = [])
 * @method \MCloudResources\Model\Entity\ResourceGroup[] newEntities(array $data, array $options = [])
 * @method \MCloudResources\Model\Entity\ResourceGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MCloudResources\Model\Entity\ResourceGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MCloudResources\Model\Entity\ResourceGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \MCloudResources\Model\Entity\ResourceGroup findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ResourceGroupsTable extends Table
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

        $this->table('resource_groups');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Sluggable', [
            'field' => 'name'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'MCloudResources.Users'
        ]);

        $this->belongsToMany('People', [
            'foreignKey' => 'resource_group_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'resource_groups_users',
            'className' => 'CakeAuth.Users',
            'saveStrategy' => 'append'
        ]);

        $this->hasMany('Buckets', [
            'className' => 'CakeStorage.Buckets'
        ])
            ->setForeignKey('resource_group_id');
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

        /*$validator
            ->uuid('uid')
            ->requirePresence('uid', 'create')
            ->notEmpty('uid');*/

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
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }

    public function isOwnedBy($id, $userId)
    {
        return $this->exists(['id' => $id, 'user_id' => $userId]);
    }
}
