<?php
namespace CakeResource\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResourceClasses Model
 *
 * @method \CakeResource\Model\Entity\ResourceClass get($primaryKey, $options = [])
 * @method \CakeResource\Model\Entity\ResourceClass newEntity($data = null, array $options = [])
 * @method \CakeResource\Model\Entity\ResourceClass[] newEntities(array $data, array $options = [])
 * @method \CakeResource\Model\Entity\ResourceClass|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeResource\Model\Entity\ResourceClass patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeResource\Model\Entity\ResourceClass[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeResource\Model\Entity\ResourceClass findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ResourceClassesTable extends Table
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

        $this->table('resource_classes');
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
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('ctrl', 'create')
            ->notEmpty('ctrl');

        $validator
            ->requirePresence('package', 'create')
            ->notEmpty('package');

        $validator
            ->uuid('uid')
            ->requirePresence('uid', 'create')
            ->notEmpty('uid');

        $validator
            ->requirePresence('uname', 'create')
            ->notEmpty('uname');

        $validator
            ->requirePresence('icon', 'create')
            ->notEmpty('icon');

        $validator
            ->requirePresence('developer', 'create')
            ->notEmpty('developer');

        return $validator;
    }

    public function isOwnedBy($id, $userId)
    {
        return $this->exists(['id' => $id, 'user_id' => $userId]);
    }
}
