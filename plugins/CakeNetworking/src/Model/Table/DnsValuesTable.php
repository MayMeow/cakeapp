<?php
namespace CakeNetworking\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DnsValues Model
 *
 * @property \Cake\ORM\Association\BelongsTo $DnsRecordSets
 *
 * @method \CakeNetworking\Model\Entity\DnsValue get($primaryKey, $options = [])
 * @method \CakeNetworking\Model\Entity\DnsValue newEntity($data = null, array $options = [])
 * @method \CakeNetworking\Model\Entity\DnsValue[] newEntities(array $data, array $options = [])
 * @method \CakeNetworking\Model\Entity\DnsValue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeNetworking\Model\Entity\DnsValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeNetworking\Model\Entity\DnsValue[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeNetworking\Model\Entity\DnsValue findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DnsValuesTable extends Table
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

        $this->table('dns_values');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('DnsRecordSets', [
            'foreignKey' => 'dns_record_set_id',
            'joinType' => 'INNER',
            'className' => 'CakeNetworking.DnsRecordSets'
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
        $rules->add($rules->existsIn(['dns_record_set_id'], 'DnsRecordSets'));

        return $rules;
    }
}
