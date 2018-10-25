<?php
namespace App\Model\Table;

use App\Model\Entity\UserEmailRecipient;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserEmailRecipients Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UserEmails
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class UserEmailRecipientsTable extends Table
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

        $this->table('user_email_recipients');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('UserEmails', [
            'foreignKey' => 'user_email_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
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
            ->requirePresence('email_address', 'create')
            ->notEmpty('email_address');

        $validator
            ->integer('is_email_sent')
            ->requirePresence('is_email_sent', 'create')
            ->notEmpty('is_email_sent');

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
        $rules->add($rules->existsIn(['user_email_id'], 'UserEmails'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
