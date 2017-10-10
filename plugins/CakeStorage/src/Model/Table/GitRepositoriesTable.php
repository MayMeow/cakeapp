<?php
namespace CakeStorage\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GitRepositories Model
 *
 * @property \CakeStorage\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \CakeStorage\Model\Entity\GitRepository get($primaryKey, $options = [])
 * @method \CakeStorage\Model\Entity\GitRepository newEntity($data = null, array $options = [])
 * @method \CakeStorage\Model\Entity\GitRepository[] newEntities(array $data, array $options = [])
 * @method \CakeStorage\Model\Entity\GitRepository|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeStorage\Model\Entity\GitRepository patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeStorage\Model\Entity\GitRepository[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeStorage\Model\Entity\GitRepository findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GitRepositoriesTable extends Table
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

        $this->setTable('git_repositories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Sluggable', [
            'field' => 'name'
        ]);

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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('slug');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->uuid('uid')
            ->requirePresence('uid', 'create')
            ->notEmpty('uid');

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
        $rules->add($rules->isUnique(['namespace', 'name'], 'Combination is taken'));

        return $rules;
    }

    /**
     * @param $id
     * @param $userId
     * @return bool
     */
    public function isOwnedBy($id, $userId)
    {
        return $this->exists(['id' => $id, 'user_id' => $userId]);
    }

    /**
     * @param $id
     */
    public function isPublic($id)
    {
        //TODO
        //return $this->exists(['id' => $id, 'public' => true]);
    }
}
