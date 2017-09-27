<?php
namespace CakeNetworking\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DnsRecordSets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Domains
 * @property \Cake\ORM\Association\HasMany $DnsValues
 *
 * @method \CakeNetworking\Model\Entity\DnsRecordSet get($primaryKey, $options = [])
 * @method \CakeNetworking\Model\Entity\DnsRecordSet newEntity($data = null, array $options = [])
 * @method \CakeNetworking\Model\Entity\DnsRecordSet[] newEntities(array $data, array $options = [])
 * @method \CakeNetworking\Model\Entity\DnsRecordSet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeNetworking\Model\Entity\DnsRecordSet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeNetworking\Model\Entity\DnsRecordSet[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeNetworking\Model\Entity\DnsRecordSet findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DnsRecordSetsTable extends Table
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

        $this->table('dns_record_sets');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Domains', [
            'foreignKey' => 'domain_id',
            'joinType' => 'INNER',
            'className' => 'CakeNetworking.Domains'
        ]);
        $this->hasMany('DnsValues', [
            'foreignKey' => 'dns_record_set_id',
            'className' => 'CakeNetworking.DnsValues'
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
            ->requirePresence('dns_name', 'create')
            ->notEmpty('dns_name');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->integer('ttl')
            ->requirePresence('ttl', 'create')
            ->notEmpty('ttl');

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
        $rules->add($rules->existsIn(['domain_id'], 'Domains'));

        return $rules;
    }
}
