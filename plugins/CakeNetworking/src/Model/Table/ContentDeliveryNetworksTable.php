<?php
namespace CakeNetworking\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContentDeliveryNetworks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Buckets
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \CakeNetworking\Model\Entity\ContentDeliveryNetwork get($primaryKey, $options = [])
 * @method \CakeNetworking\Model\Entity\ContentDeliveryNetwork newEntity($data = null, array $options = [])
 * @method \CakeNetworking\Model\Entity\ContentDeliveryNetwork[] newEntities(array $data, array $options = [])
 * @method \CakeNetworking\Model\Entity\ContentDeliveryNetwork|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeNetworking\Model\Entity\ContentDeliveryNetwork patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeNetworking\Model\Entity\ContentDeliveryNetwork[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeNetworking\Model\Entity\ContentDeliveryNetwork findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContentDeliveryNetworksTable extends Table
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

        $this->table('content_delivery_networks');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Buckets', [
            'foreignKey' => 'bucket_id',
            'joinType' => 'INNER',
            'className' => 'CakeNetworking.Buckets'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'CakeNetworking.Users'
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
        $rules->add($rules->existsIn(['bucket_id'], 'Buckets'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
