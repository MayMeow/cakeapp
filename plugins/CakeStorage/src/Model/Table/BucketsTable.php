<?php
namespace CakeStorage\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buckets Model
 *
 * @method \CakeStorage\Model\Entity\Bucket get($primaryKey, $options = [])
 * @method \CakeStorage\Model\Entity\Bucket newEntity($data = null, array $options = [])
 * @method \CakeStorage\Model\Entity\Bucket[] newEntities(array $data, array $options = [])
 * @method \CakeStorage\Model\Entity\Bucket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeStorage\Model\Entity\Bucket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeStorage\Model\Entity\Bucket[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeStorage\Model\Entity\Bucket findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BucketsTable extends Table
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

        $this->table('buckets');
        $this->displayField('name');
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->uuid('uid')
            ->allowEmpty('uid', 'create');

        return $validator;
    }

    public function isOwnedBy($id, $userId)
    {
        return $this->exists(['id' => $id, 'user_id' => $userId]);
    }
}
