<?php
namespace MCloudHome\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Devices Model
 *
 * @method \MCloudHome\Model\Entity\Device get($primaryKey, $options = [])
 * @method \MCloudHome\Model\Entity\Device newEntity($data = null, array $options = [])
 * @method \MCloudHome\Model\Entity\Device[] newEntities(array $data, array $options = [])
 * @method \MCloudHome\Model\Entity\Device|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MCloudHome\Model\Entity\Device patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MCloudHome\Model\Entity\Device[] patchEntities($entities, array $data, array $options = [])
 * @method \MCloudHome\Model\Entity\Device findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DevicesTable extends Table
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

        $this->setTable('devices');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('socket', 'create')
            ->notEmpty('socket');

        $validator
            ->requirePresence('app_key', 'create')
            ->notEmpty('app_key');

        $validator
            ->requirePresence('app_secret', 'create')
            ->notEmpty('app_secret');

        $validator
            ->requirePresence('agent_type', 'create')
            ->notEmpty('agent_type');

        return $validator;
    }
}
