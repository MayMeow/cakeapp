<?php
namespace CakeConfigure\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicationSettings Model
 *
 * @method \CakeConfigure\Model\Entity\ApplicationSetting get($primaryKey, $options = [])
 * @method \CakeConfigure\Model\Entity\ApplicationSetting newEntity($data = null, array $options = [])
 * @method \CakeConfigure\Model\Entity\ApplicationSetting[] newEntities(array $data, array $options = [])
 * @method \CakeConfigure\Model\Entity\ApplicationSetting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeConfigure\Model\Entity\ApplicationSetting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeConfigure\Model\Entity\ApplicationSetting[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeConfigure\Model\Entity\ApplicationSetting findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ApplicationSettingsTable extends Table
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

        $this->setTable('application_settings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->scalar('config_key')
            ->requirePresence('config_key', 'create')
            ->notEmpty('config_key');

        $validator
            ->scalar('config_value')
            ->requirePresence('config_value', 'create')
            ->notEmpty('config_value');

        return $validator;
    }
}
