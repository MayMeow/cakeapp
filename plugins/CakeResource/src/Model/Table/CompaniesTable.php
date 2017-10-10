<?php
namespace CakeResource\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Companies Model
 *
 * @property \MCloudResources\Model\Table\ContactsTable|\Cake\ORM\Association\HasMany $Contacts
 *
 * @method \CakeResource\Model\Entity\Company get($primaryKey, $options = [])
 * @method \CakeResource\Model\Entity\Company newEntity($data = null, array $options = [])
 * @method \CakeResource\Model\Entity\Company[] newEntities(array $data, array $options = [])
 * @method \CakeResource\Model\Entity\Company|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeResource\Model\Entity\Company patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeResource\Model\Entity\Company[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeResource\Model\Entity\Company findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompaniesTable extends Table
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

        $this->setTable('companies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Contacts', [
            'foreignKey' => 'company_id',
            'className' => 'CakeResource.Contacts'
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
            ->scalar('vat')
            ->allowEmpty('vat');

        $validator
            ->scalar('country')
            ->allowEmpty('country');

        $validator
            ->scalar('state')
            ->allowEmpty('state');

        return $validator;
    }
}
