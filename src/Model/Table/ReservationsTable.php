<?php
namespace App\Model\Table;

use App\Model\Entity\Reservation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reservations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Owners
 * @property \Cake\ORM\Association\BelongsTo $ReservationTypes
 * @property \Cake\ORM\Association\BelongsTo $Machines
 */
class ReservationsTable extends Table
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

        $this->table('reservations');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Owners', [
            'foreignKey' => 'owner_id',
            'joinType' => 'INNER'
        ]);
      
        $this->belongsTo('MachineDetails', [
            'foreignKey' => 'machine_detail_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Machines', [
            'foreignKey' => 'machine_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ReservationTypes', [
            'foreignKey' => 'reservation_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('OwnerPrices', [
            'foreignKey' => 'reservation_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
  //    public function validationDefault(Validator $validator)
//    {
//        $validator
//            ->integer('id')
//            ->allowEmpty('id', 'create');
// 
//        $validator
//            ->requirePresence('start_point', 'create')
//            ->notEmpty('start_point');
//
//        $validator
//            ->requirePresence('end_point', 'create')
//            ->notEmpty('end_point');
//        $validator
//            ->requirePresence('machine_id', 'create')
//            ->notEmpty('machine_id');
//        $validator
//            ->requirePresence('reservation_type_id', 'create')
//            ->notEmpty('reservation_type_id');
//        $validator
//            ->requirePresence('machine_detail_id', 'create')
//            ->notEmpty('machine_detail_id');
// 
//        $validator
//            ->requirePresence('date', 'create')
//            ->notEmpty('date');
// 
// 
// 
//        return $validator;
//     }

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
     //   $rules->add($rules->existsIn(['owner_id'], 'Owners'));
        $rules->add($rules->existsIn(['machine_id'], 'Machines'));
        $rules->add($rules->existsIn(['reservation_type_id'], 'ReservationTypes'));
        $rules->add($rules->existsIn(['machine_detail_id'], 'MachineDetails'));
        return $rules;
    }
}
