<?php
namespace CakeAuth\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \CakeAuth\Model\Entity\User get($primaryKey, $options = [])
 * @method \CakeAuth\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \CakeAuth\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \CakeAuth\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeAuth\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeAuth\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeAuth\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Profiles', [
            'dependent' => true
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
            ->allowEmpty('uid', 'create');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->requirePresence('role', 'create')
            ->notEmpty('role')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'author', 'user']],
                'message' => 'Please enter a valid role'
            ]);

        $validator
            ->boolean('verified')
            ->requirePresence('verified', 'create')
            ->notEmpty('verified');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

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
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }

    /**
     * @param $id
     * @param $userId
     * @return bool
     */
    public function isOwnedBy($id, $userId)
    {
        if ($id == $userId) {
            return $this->exists(['id' => $id]);
        }

        return false;
    }
}
