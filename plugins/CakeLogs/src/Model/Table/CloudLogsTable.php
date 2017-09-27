<?php
namespace CakeLogs\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CloudLogs Model
 *
 * @method \CakeLogs\Model\Entity\CloudLog get($primaryKey, $options = [])
 * @method \CakeLogs\Model\Entity\CloudLog newEntity($data = null, array $options = [])
 * @method \CakeLogs\Model\Entity\CloudLog[] newEntities(array $data, array $options = [])
 * @method \CakeLogs\Model\Entity\CloudLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeLogs\Model\Entity\CloudLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeLogs\Model\Entity\CloudLog[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeLogs\Model\Entity\CloudLog findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CloudLogsTable extends Table
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

        $this->table('cloud_logs');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->requirePresence('resource_key', 'create')
            ->notEmpty('resource_key');

        $validator
            ->requirePresence('event_type', 'create')
            ->notEmpty('event_type');

        $validator
            ->requirePresence('severity', 'create')
            ->notEmpty('severity');

        $validator
            ->requirePresence('json_data', 'create')
            ->notEmpty('json_data');

        return $validator;
    }
}
