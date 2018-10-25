<?php
namespace App\Model\Table;

use App\Model\Entity\Message;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Messages Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Chats
 */
class MessagesTable extends Table
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

        $this->table('messages');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Chats', [
            'foreignKey' => 'message_id'
        ]);
        
 
  //////////////// last message a5eran el hamd llah 
$this->hasOne('Chatss', [                  
     'className' => 'Chats',
    'foreignKey' => 'message_id',
    'strategy' => 'select',
    'conditions' => function (\Cake\Database\Expression\QueryExpression $exp, \Cake\ORM\Query $query) {
         $query->order(['Chatss.id' => 'ASC']);
        return [];
    }
]);
 //////////////// last message a5eran el hamd llah 
 
//$this->hasOne('Chats', [
//     'className' => 'Chats',
//    'foreignKey' => 'message_id',
//    'strategy' => 'select',
//    'conditions' => function (\Cake\Database\Expression\QueryExpression $exp, \Cake\ORM\Query $query) {
//         $query->order(['Chats.id' => 'ASC']);
//        return [];
//    }
//]);
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
