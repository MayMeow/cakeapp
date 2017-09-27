<?php
namespace MCloudCompute\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OutgoingActions Model
 *
 * @method \MCloudCompute\Model\Entity\OutgoingAction get($primaryKey, $options = [])
 * @method \MCloudCompute\Model\Entity\OutgoingAction newEntity($data = null, array $options = [])
 * @method \MCloudCompute\Model\Entity\OutgoingAction[] newEntities(array $data, array $options = [])
 * @method \MCloudCompute\Model\Entity\OutgoingAction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MCloudCompute\Model\Entity\OutgoingAction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MCloudCompute\Model\Entity\OutgoingAction[] patchEntities($entities, array $data, array $options = [])
 * @method \MCloudCompute\Model\Entity\OutgoingAction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OutgoingActionsTable extends Table
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

        $this->setTable('outgoing_actions');
        $this->setDisplayField('id');
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
            ->requirePresence('app_key', 'create')
            ->notEmpty('app_key');

        $validator
            ->requirePresence('app_secret', 'create')
            ->notEmpty('app_secret');

        $validator
            ->requirePresence('payload', 'create')
            ->notEmpty('payload');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
