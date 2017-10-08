<?php
namespace CakeResource\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contacts Model
 *
 * @property \MCloudResources\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 *
 * @method \CakeResource\Model\Entity\Contact get($primaryKey, $options = [])
 * @method \CakeResource\Model\Entity\Contact newEntity($data = null, array $options = [])
 * @method \CakeResource\Model\Entity\Contact[] newEntities(array $data, array $options = [])
 * @method \CakeResource\Model\Entity\Contact|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeResource\Model\Entity\Contact patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeResource\Model\Entity\Contact[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeResource\Model\Entity\Contact findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContactsTable extends Table
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

        $this->setTable('contacts');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Companies', [
            'joinType' => 'LEFT',
            'foreignKey' => 'company_id',
            'className' => 'CakeResource.Companies'
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('website')
            ->allowEmpty('website');

        $validator
            ->scalar('phone')
            ->allowEmpty('phone');

        $validator
            ->scalar('mobile')
            ->allowEmpty('mobile');

        $validator
            ->scalar('address')
            ->allowEmpty('address');

        $validator
            ->scalar('zip')
            ->allowEmpty('zip');

        $validator
            ->scalar('country')
            ->requirePresence('country', 'create')
            ->notEmpty('country');

        $validator
            ->scalar('state')
            ->requirePresence('state', 'create')
            ->notEmpty('state');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

        return $rules;
    }
}
