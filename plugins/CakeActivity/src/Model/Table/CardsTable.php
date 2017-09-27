<?php
namespace CakeActivity\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cards Model
 *
 * @method \CakeActivity\Model\Entity\Card get($primaryKey, $options = [])
 * @method \CakeActivity\Model\Entity\Card newEntity($data = null, array $options = [])
 * @method \CakeActivity\Model\Entity\Card[] newEntities(array $data, array $options = [])
 * @method \CakeActivity\Model\Entity\Card|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeActivity\Model\Entity\Card patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeActivity\Model\Entity\Card[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeActivity\Model\Entity\Card findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CardsTable extends Table
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

        $this->setTable('cards');
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('json_data')
            ->requirePresence('json_data', 'create')
            ->notEmpty('json_data');

        $validator
            ->boolean('webhook')
            ->requirePresence('webhook', 'create')
            ->notEmpty('webhook');

        return $validator;
    }
}
