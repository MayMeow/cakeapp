<?php
namespace CakeTaxonomy\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Labels Model
 *
 * @method \CakeTaxonomy\Model\Entity\Label get($primaryKey, $options = [])
 * @method \CakeTaxonomy\Model\Entity\Label newEntity($data = null, array $options = [])
 * @method \CakeTaxonomy\Model\Entity\Label[] newEntities(array $data, array $options = [])
 * @method \CakeTaxonomy\Model\Entity\Label|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeTaxonomy\Model\Entity\Label patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeTaxonomy\Model\Entity\Label[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeTaxonomy\Model\Entity\Label findOrCreate($search, callable $callback = null, $options = [])
 */
class LabelsTable extends Table
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

        $this->setTable('labels');
        $this->setDisplayField('name');
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('label_class', 'create')
            ->notEmpty('label_class');

        return $validator;
    }
}
