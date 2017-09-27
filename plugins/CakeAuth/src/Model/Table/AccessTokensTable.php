<?php
namespace CakeAuth\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AccessTokens Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $AuthApplications
 *
 * @method \CakeAuth\Model\Entity\AccessToken get($primaryKey, $options = [])
 * @method \CakeAuth\Model\Entity\AccessToken newEntity($data = null, array $options = [])
 * @method \CakeAuth\Model\Entity\AccessToken[] newEntities(array $data, array $options = [])
 * @method \CakeAuth\Model\Entity\AccessToken|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeAuth\Model\Entity\AccessToken patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeAuth\Model\Entity\AccessToken[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeAuth\Model\Entity\AccessToken findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AccessTokensTable extends Table
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

        $this->setTable('access_tokens');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'CakeAuth.Users'
        ]);
        $this->belongsTo('AuthApplications', [
            'foreignKey' => 'auth_application_id',
            'joinType' => 'INNER',
            'className' => 'CakeAuth.AuthApplications'
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
            ->requirePresence('token', 'create')
            ->notEmpty('token')
            ->add('token', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->dateTime('expires')
            ->requirePresence('expires', 'create')
            ->notEmpty('expires');

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
        $rules->add($rules->isUnique(['token']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['auth_application_id'], 'AuthApplications'));

        return $rules;
    }

    public function isOwnedBy($id, $userId)
    {
        return $this->exists(['id' => $id, 'user_id' => $userId]);
    }
}
