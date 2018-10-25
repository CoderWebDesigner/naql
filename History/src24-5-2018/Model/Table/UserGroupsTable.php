<?php
namespace App\Model\Table;

use App\Model\Entity\UserGroup;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserGroups Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentUserGroups
 * @property \Cake\ORM\Association\HasMany $ScheduledEmails
 * @property \Cake\ORM\Association\HasMany $UserEmails
 * @property \Cake\ORM\Association\HasMany $UserGroupPermissions
 * @property \Cake\ORM\Association\HasMany $ChildUserGroups
 * @property \Cake\ORM\Association\HasMany $Users
 */
class UserGroupsTable extends Table
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

        $this->table('user_groups');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('ParentUserGroups', [
            'className' => 'UserGroups',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ScheduledEmails', [
            'foreignKey' => 'user_group_id'
        ]);
        $this->hasMany('UserEmails', [
            'foreignKey' => 'user_group_id'
        ]);
        $this->hasMany('UserGroupPermissions', [
            'foreignKey' => 'user_group_id'
        ]);
        $this->hasMany('ChildUserGroups', [
            'className' => 'UserGroups',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'user_group_id'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->integer('registration_allowed')
            ->requirePresence('registration_allowed', 'create')
            ->notEmpty('registration_allowed');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentUserGroups'));
        return $rules;
    }
}
