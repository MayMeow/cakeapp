<?php
namespace CakeAuth\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SshKeys Model
 *
 * @property \CakeAuth\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \CakeAuth\Model\Entity\SshKey get($primaryKey, $options = [])
 * @method \CakeAuth\Model\Entity\SshKey newEntity($data = null, array $options = [])
 * @method \CakeAuth\Model\Entity\SshKey[] newEntities(array $data, array $options = [])
 * @method \CakeAuth\Model\Entity\SshKey|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeAuth\Model\Entity\SshKey patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeAuth\Model\Entity\SshKey[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeAuth\Model\Entity\SshKey findOrCreate($search, callable $callback = null, $options = [])
 */
class SshKeysTable extends Table
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

        $this->setTable('ssh_keys');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'CakeAuth.Users'
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('public_key', 'create')
            ->notEmpty('public_key');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function isOwnedBy($id, $userId)
    {
        return $this->exists(['id' => $id, 'user_id' => $userId]);
    }
}
