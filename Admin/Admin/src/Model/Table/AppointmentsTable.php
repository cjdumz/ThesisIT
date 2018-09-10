<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Appointments Model
 *
 * @method \App\Model\Entity\Appointment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Appointment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Appointment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Appointment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Appointment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Appointment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Appointment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Appointment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AppointmentsTable extends Table
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

        $this->setTable('appointments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('serviceId')
            ->requirePresence('serviceId', 'create')
            ->notEmpty('serviceId');

        $validator
            ->integer('vehicleId')
            ->allowEmpty('vehicleId');

        $validator
            ->scalar('serviceType')
            ->maxLength('serviceType', 255)
            ->requirePresence('serviceType', 'create')
            ->notEmpty('serviceType');

        $validator
            ->scalar('vehicleProblem')
            ->maxLength('vehicleProblem', 255)
            ->requirePresence('vehicleProblem', 'create')
            ->notEmpty('vehicleProblem');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->scalar('specialOffer')
            ->maxLength('specialOffer', 255)
            ->requirePresence('specialOffer', 'create')
            ->notEmpty('specialOffer');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->time('time')
            ->requirePresence('time', 'create')
            ->notEmpty('time');

        $validator
            ->scalar('plateNumber')
            ->maxLength('plateNumber', 11)
            ->requirePresence('plateNumber', 'create')
            ->notEmpty('plateNumber');

        return $validator;
    }
}
