<?php
namespace App\Model\Table;

use App\Model\Entity\MachineOwner;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MachineOwners Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MachineDetails
 * @property \Cake\ORM\Association\BelongsTo $Owners
 */
class MachineOwnersTable extends Table
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

        $this->table('machine_owners');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('MachineDetails', [
            'foreignKey' => 'machine_detail_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Owners', [
            'foreignKey' => 'owner_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Areas', [
            'foreignKey' => 'area_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Machines', [
            'foreignKey' => 'machine_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('MachinePhotos', [
            'foreignKey' => 'machine_owner_id'
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
            ->requirePresence('machine_detail_id', 'create')
            ->notEmpty('machine_detail_id');
   
   $validator
            ->requirePresence('machine_id', 'create')
            ->notEmpty('machine_id');
   
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
        $rules->add($rules->existsIn(['machine_detail_id'], 'MachineDetails'));
        $rules->add($rules->existsIn(['machine_id'], 'Machines'));
        $rules->add($rules->existsIn(['owner_id'], 'Owners'));
        return $rules;
    }
}
