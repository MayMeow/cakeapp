<?php
namespace CakeNetworking\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Domains Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \CakeNetworking\Model\Entity\Domain get($primaryKey, $options = [])
 * @method \CakeNetworking\Model\Entity\Domain newEntity($data = null, array $options = [])
 * @method \CakeNetworking\Model\Entity\Domain[] newEntities(array $data, array $options = [])
 * @method \CakeNetworking\Model\Entity\Domain|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeNetworking\Model\Entity\Domain patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeNetworking\Model\Entity\Domain[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeNetworking\Model\Entity\Domain findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DomainsTable extends Table
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

        $this->table('domains');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'CakeNetworking.Users'
        ]);

        /*$this->hasMany('DnsRecordSets', [
            'foreignKey' => 'domain_id',
            'className' => 'CakeNetworking.DnsRecordSets',
            'dependent' => true
        ]);*/

        //From Version 3.4 you can use following settings
        $this->hasMany('DnsRecordSets', [
            'className' => 'CakeNetworking.DnsRecordSets'
        ])
            ->setForeignKey('domain_id')
            ->setDependent(true);
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
            ->requirePresence('domain_key', 'create')
            ->notEmpty('domain_key');

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
