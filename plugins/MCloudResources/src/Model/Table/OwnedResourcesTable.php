<?php
namespace MCloudResources\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OwnedResources Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ResourceGroups
 * @property \Cake\ORM\Association\BelongsTo $ResourceClasses
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \MCloudResources\Model\Entity\OwnedResource get($primaryKey, $options = [])
 * @method \MCloudResources\Model\Entity\OwnedResource newEntity($data = null, array $options = [])
 * @method \MCloudResources\Model\Entity\OwnedResource[] newEntities(array $data, array $options = [])
 * @method \MCloudResources\Model\Entity\OwnedResource|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MCloudResources\Model\Entity\OwnedResource patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MCloudResources\Model\Entity\OwnedResource[] patchEntities($entities, array $data, array $options = [])
 * @method \MCloudResources\Model\Entity\OwnedResource findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OwnedResourcesTable extends Table
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

        $this->table('owned_resources');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ResourceGroups', [
            'foreignKey' => 'resource_group_id',
            'joinType' => 'INNER',
            'className' => 'MCloudResources.ResourceGroups'
        ]);
        $this->belongsTo('ResourceClasses', [
            'foreignKey' => 'resource_class_id',
            'joinType' => 'INNER',
            'className' => 'MCloudResources.ResourceClasses'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('instance_key')
            ->requirePresence('instance_key', 'create')
            ->notEmpty('instance_key');

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
        $rules->add($rules->existsIn(['resource_class_id'], 'ResourceClasses'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function isOwnedBy($id, $userId)
    {
        return $this->exists(['id' => $id, 'user_id' => $userId]);
    }
}
