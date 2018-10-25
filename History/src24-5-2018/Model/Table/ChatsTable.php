<?php
namespace App\Model\Table;

use App\Model\Entity\Chat;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chats Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Messages
 */
class ChatsTable extends Table
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

        $this->table('chats');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Messages', [
            'foreignKey' => 'message_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('frommm', [
            'foreignKey' => 'fromm',
            'joinType' => 'INNER',
             'className' => 'Users' 
        ]);
        $this->belongsTo('tooo', [
            'foreignKey' => 'too',
            'joinType' => 'INNER',
             'className' => 'Users' 
            
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
            ->requirePresence('post', 'create')
            ->notEmpty('post');

        $validator
            ->integer('too')
            ->requirePresence('too', 'create')
            ->notEmpty('too');

        $validator
            ->integer('fromm')
            ->requirePresence('fromm', 'create')
            ->notEmpty('fromm');

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
        $rules->add($rules->existsIn(['message_id'], 'Messages'));
        return $rules;
    }
}
