<?php
namespace CakeService\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Issues Model
 *
 * @property \CakeService\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \CakeService\Model\Table\CommentsTable|\Cake\ORM\Association\BelongsToMany $Comments
 * @property \CakeService\Model\Table\UsersTable|\Cake\ORM\Association\BelongsToMany $Assignees
 *
 * @method \CakeService\Model\Entity\Issue get($primaryKey, $options = [])
 * @method \CakeService\Model\Entity\Issue newEntity($data = null, array $options = [])
 * @method \CakeService\Model\Entity\Issue[] newEntities(array $data, array $options = [])
 * @method \CakeService\Model\Entity\Issue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeService\Model\Entity\Issue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeService\Model\Entity\Issue[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeService\Model\Entity\Issue findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IssuesTable extends Table
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

        $this->setTable('issues');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'CakeService.Users'
        ]);
        $this->belongsToMany('Comments', [
            'foreignKey' => 'issue_id',
            'targetForeignKey' => 'comment_id',
            'joinTable' => 'issues_comments',
            'className' => 'CakeCommunication.Comments',
            'saveStrategy' => 'append'
        ]);
        $this->belongsToMany('Assignees', [
            'foreignKey' => 'issue_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'issues_users',
            'className' => 'CakeService.Users'
        ]);
        $this->belongsToMany('Labels', [
            'foreignKey' => 'issue_id',
            'targetForeignKey' => 'label_id',
            'joinTable' => 'issues_labels',
            'className' => 'CakeService.Labels'
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
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->date('due_date')
            ->allowEmpty('due_date');

        $validator
            ->integer('estimate')
            ->allowEmpty('estimate');

        $validator
            ->boolean('finished')
            ->requirePresence('finished', 'create')
            ->notEmpty('finished');

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

    public function findByLabelName(Query $query, $options = [])
    {
        $label = $options['label'];

        //var_dump($query);

        return $query->matching('Labels', function($q) use ($label) {
            return $q->where(['Labels.name' => $label]);
        });
    }

    public function beforeSave($event, $entity, $options)
    {
        if ($entity->label_string) {
            $entity->labels = $this->_buildLabels($entity->label_string);
        }
    }

    public function isOwnedBy($id, $userId)
    {
        return $this->exists(['id' => $id, 'user_id' => $userId]);
    }

    protected function _buildLabels($labelString)
    {
        $colorClasses = ['label-a1', 'label-a2', 'label-a3', 'label-primary', 'label-danger', 'label-success', 'label-warning'];
        $colorClassesCount = count($colorClasses) - 1;
        // Trim labels
        $newLabels = array_map('trim', explode(',', $labelString));
        // remove all empty tags
        $newLabels = array_filter($newLabels);
        // remove duplicates
        $newLabels = array_unique($newLabels);

        $out = [];
        $q = $this->Labels->find()->where(['Labels.name IN' => $newLabels]);

        // remove existing labels from new labels
        foreach ($q->extract('name') as $existing) {
            $index = array_search($existing, $newLabels);
            if ($index !== false) {
                unset($newLabels[$index]);
            }
        }

        // Add existing tags
        foreach ($q as $label) {
            $out[] = $label;
        }

        // add new tags
        foreach ($newLabels as $label) {
            $out[] = $this->Labels->newEntity(['name' => $label, 'label_class' => $colorClasses[rand(0, $colorClassesCount)]]);
        }

        return $out;
    }
}
