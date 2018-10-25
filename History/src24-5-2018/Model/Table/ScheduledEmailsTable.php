<?php
namespace App\Model\Table;

use App\Model\Entity\ScheduledEmail;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ScheduledEmails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UserEmails
 * @property \Cake\ORM\Association\BelongsTo $UserGroups
 * @property \Cake\ORM\Association\HasMany $ScheduledEmailRecipients
 */
class ScheduledEmailsTable extends Table
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

        $this->table('scheduled_emails');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('UserEmails', [
            'foreignKey' => 'user_email_id'
        ]);
        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id'
        ]);
        $this->hasMany('ScheduledEmailRecipients', [
            'foreignKey' => 'scheduled_email_id'
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
            ->allowEmpty('type');

        $validator
            ->allowEmpty('cc_to');

        $validator
            ->allowEmpty('from_name');

        $validator
            ->allowEmpty('from_email');

        $validator
            ->allowEmpty('subject');

        $validator
            ->allowEmpty('message');

        $validator
            ->dateTime('schedule_date')
            ->allowEmpty('schedule_date');

        $validator
            ->integer('is_sent')
            ->requirePresence('is_sent', 'create')
            ->notEmpty('is_sent');

        $validator
            ->integer('scheduled_by')
            ->allowEmpty('scheduled_by');

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
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));
        return $rules;
    }
}
