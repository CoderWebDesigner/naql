<?php
namespace App\Model\Table;

use App\Model\Entity\MachineDetail;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MachineDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Machines
 * @property \Cake\ORM\Association\HasMany $MachineOwners
 */
class MachineDetailsTable extends Table
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

        $this->table('machine_details');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Machines', [
            'foreignKey' => 'machine_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('MachineOwners', [
            'foreignKey' => 'machine_detail_id'
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

//        $validator
//            ->requirePresence('machine_photo', 'create')
//            ->notEmpty('machine_photo');

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
         $rules->add($rules->isUnique(['name']));
         $rules->add($rules->isUnique(['name_en']));
        $rules->add($rules->existsIn(['machine_id'], 'Machines'));
        return $rules;
    }
}
