<?php
namespace CakeAuth\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuthApplications Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $AccessTokens
 *
 * @method \CakeAuth\Model\Entity\AuthApplication get($primaryKey, $options = [])
 * @method \CakeAuth\Model\Entity\AuthApplication newEntity($data = null, array $options = [])
 * @method \CakeAuth\Model\Entity\AuthApplication[] newEntities(array $data, array $options = [])
 * @method \CakeAuth\Model\Entity\AuthApplication|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeAuth\Model\Entity\AuthApplication patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeAuth\Model\Entity\AuthApplication[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeAuth\Model\Entity\AuthApplication findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AuthApplicationsTable extends Table
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

        $this->setTable('auth_applications');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'CakeAuth.Users'
        ]);
        $this->hasMany('AccessTokens', [
            'foreignKey' => 'auth_application_id',
            'className' => 'CakeAuth.AccessTokens'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('client_key', 'create')
            ->notEmpty('client_key');

        $validator
            ->requirePresence('client_secret', 'create')
            ->notEmpty('client_secret');

        $validator
            ->allowEmpty('description');

        $validator
            ->requirePresence('homepage_url', 'create')
            ->notEmpty('homepage_url');

        $validator
            ->requirePresence('callback_url', 'create')
            ->notEmpty('callback_url');

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
