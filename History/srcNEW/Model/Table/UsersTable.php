<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UserGroups
 * @property \Cake\ORM\Association\BelongsTo $Areas
 * @property \Cake\ORM\Association\HasMany $LoginTokens
 * @property \Cake\ORM\Association\HasMany $Messages
 * @property \Cake\ORM\Association\HasMany $Owners
 * @property \Cake\ORM\Association\HasMany $Rates
 * @property \Cake\ORM\Association\HasMany $Reservations
 * @property \Cake\ORM\Association\HasMany $ScheduledEmailRecipients
 * @property \Cake\ORM\Association\HasMany $UserActivities
 * @property \Cake\ORM\Association\HasMany $UserContacts
 * @property \Cake\ORM\Association\HasMany $UserDetails
 * @property \Cake\ORM\Association\HasMany $UserEmailRecipients
 * @property \Cake\ORM\Association\HasMany $UserEmailSignatures
 * @property \Cake\ORM\Association\HasMany $UserEmailTemplates
 * @property \Cake\ORM\Association\HasMany $UserSocials
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id'
        ]);
      
        $this->hasMany('LoginTokens', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Owners', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Rates', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Reservations', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('ScheduledEmailRecipients', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserActivities', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserContacts', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserDetails', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserEmailRecipients', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserEmailSignatures', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserEmailTemplates', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserSocials', [
            'foreignKey' => 'user_id'
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
       ->requirePresence('username', 'create')
            ->notEmpty('username',"username required");

        $validator
                 
            ->requirePresence('password', 'create')
            ->notEmpty('password',"password required");

//        $validator
//           ->requirePresence('email', 'create')
//            ->email('email')
//            ->notEmpty('email',"email required");

 
//        $validator
//                 ->requirePresence('area_id', 'create')
//            ->notEmpty('area_id',"area required");

  

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['mobile']));
        $rules->add($rules->isUnique(['email']));
         $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));
        
        return $rules;
    }
}
