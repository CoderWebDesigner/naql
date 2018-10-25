<?php
namespace App\Model\Table;

use App\Model\Entity\Machine;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Machines Model
 *
 * @property \Cake\ORM\Association\HasMany $MachineDetails
 * @property \Cake\ORM\Association\HasMany $Reservations
 */
class MachinesTable extends Table
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

        $this->table('machines');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->hasMany('MachineDetails', [
            'foreignKey' => 'machine_id'
        ]);
        $this->hasMany('MachineOwners', [
            'foreignKey' => 'machine_id'
        ]);
        
        $this->hasMany('Reservations', [
            'foreignKey' => 'machine_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('name_en', 'create')
            ->notEmpty('name_en');
//
//        $validator
//            ->requirePresence('photo', 'create')
//            ->notEmpty('photo');

        return $validator;
    }
}
