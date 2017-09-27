<?php
namespace CakeService\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Milestones Model
 *
 * @method \CakeService\Model\Entity\Milestone get($primaryKey, $options = [])
 * @method \CakeService\Model\Entity\Milestone newEntity($data = null, array $options = [])
 * @method \CakeService\Model\Entity\Milestone[] newEntities(array $data, array $options = [])
 * @method \CakeService\Model\Entity\Milestone|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeService\Model\Entity\Milestone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeService\Model\Entity\Milestone[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeService\Model\Entity\Milestone findOrCreate($search, callable $callback = null, $options = [])
 */
class MilestonesTable extends Table
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

        $this->setTable('milestones');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
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
            ->scalar('title')
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->date('start_date')
            ->allowEmpty('start_date');

        $validator
            ->date('end_date')
            ->allowEmpty('end_date');

        return $validator;
    }
}
