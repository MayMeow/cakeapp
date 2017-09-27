<?php
namespace MayCa\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Certificates Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentCertificates
 * @property \Cake\ORM\Association\HasMany $ChildCertificates
 *
 * @method \MayCa\Model\Entity\Certificate get($primaryKey, $options = [])
 * @method \MayCa\Model\Entity\Certificate newEntity($data = null, array $options = [])
 * @method \MayCa\Model\Entity\Certificate[] newEntities(array $data, array $options = [])
 * @method \MayCa\Model\Entity\Certificate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MayCa\Model\Entity\Certificate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MayCa\Model\Entity\Certificate[] patchEntities($entities, array $data, array $options = [])
 * @method \MayCa\Model\Entity\Certificate findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CertificatesTable extends Table
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

        $this->setTable('certificates');
        $this->setDisplayField('internal_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ParentCertificates', [
            'className' => 'MayCa.Certificates',
            'foreignKey' => 'parent_id',
            'conditions' => ['ParentCertificates.ca' => true]
        ]);
        $this->hasMany('ChildCertificates', [
            'className' => 'MayCa.Certificates',
            'foreignKey' => 'parent_id'
        ]);

        $this->addBehavior('Tree');
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
            ->requirePresence('internal_name', 'create')
            ->notEmpty('internal_name');

        $validator
            ->requirePresence('common_name', 'create')
            ->notEmpty('common_name');

        /*$validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');*/

        /*$validator
            ->requirePresence('country', 'create')
            ->notEmpty('country');

        $validator
            ->requirePresence('province', 'create')
            ->notEmpty('province');

        $validator
            ->requirePresence('locality', 'create')
            ->notEmpty('locality');

        $validator
            ->requirePresence('organization', 'create')
            ->notEmpty('organization');

        $validator
            ->requirePresence('organization_unit', 'create')
            ->notEmpty('organization_unit');*/

        /*$validator
            ->requirePresence('uid', 'create')
            ->notEmpty('uid');*/

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->boolean('ca')
            ->requirePresence('ca', 'create')
            ->notEmpty('ca');

        /*$validator
            ->boolean('signed')
            ->requirePresence('signed', 'create')
            ->notEmpty('signed');*/

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
        //$rules->add($rules->isUnique(['email']));
        //$rules->add($rules->existsIn(['parent_id'], 'ParentCertificates'));

        return $rules;
    }
}
