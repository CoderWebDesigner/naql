<?php
namespace App\Model\Table;

use App\Model\Entity\UserSettingOption;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserSettingOptions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UserSettings
 * @property \Cake\ORM\Association\BelongsTo $SettingOptions
 */
class UserSettingOptionsTable extends Table
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

        $this->table('user_setting_options');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('UserSettings', [
            'foreignKey' => 'user_setting_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SettingOptions', [
            'foreignKey' => 'setting_option_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['user_setting_id'], 'UserSettings'));
        $rules->add($rules->existsIn(['setting_option_id'], 'SettingOptions'));
        return $rules;
    }
}
