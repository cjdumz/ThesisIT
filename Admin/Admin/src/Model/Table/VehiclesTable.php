<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicles Model
 *
 * @method \App\Model\Entity\Vehicle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehicle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehicle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicle|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VehiclesTable extends Table
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

        $this->setTable('vehicles');
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
            ->integer('userId')
            ->requirePresence('userId', 'create')
            ->notEmpty('userId');

        $validator
            ->scalar('plateNumber')
            ->maxLength('plateNumber', 255)
            ->requirePresence('plateNumber', 'create')
            ->notEmpty('plateNumber');

        $validator
            ->scalar('bodyType')
            ->maxLength('bodyType', 255)
            ->allowEmpty('bodyType');

        $validator
            ->scalar('yearModel')
            ->maxLength('yearModel', 255)
            ->requirePresence('yearModel', 'create')
            ->notEmpty('yearModel');

        $validator
            ->scalar('chasisNumber')
            ->maxLength('chasisNumber', 255)
            ->allowEmpty('chasisNumber');

        $validator
            ->scalar('engineClassification')
            ->maxLength('engineClassification', 255)
            ->allowEmpty('engineClassification');

        $validator
            ->scalar('numberOfCylinders')
            ->maxLength('numberOfCylinders', 255)
            ->allowEmpty('numberOfCylinders');

        $validator
            ->scalar('typeOfDriveTrain')
            ->maxLength('typeOfDriveTrain', 255)
            ->allowEmpty('typeOfDriveTrain');

        $validator
            ->scalar('make')
            ->maxLength('make', 255)
            ->requirePresence('make', 'create')
            ->notEmpty('make');

        $validator
            ->scalar('series')
            ->maxLength('series', 255)
            ->requirePresence('series', 'create')
            ->notEmpty('series');

        $validator
            ->scalar('color')
            ->maxLength('color', 255)
            ->requirePresence('color', 'create')
            ->notEmpty('color');

        $validator
            ->scalar('engineNumber')
            ->maxLength('engineNumber', 255)
            ->allowEmpty('engineNumber');

        $validator
            ->scalar('typeOfEngine')
            ->maxLength('typeOfEngine', 255)
            ->allowEmpty('typeOfEngine');

        $validator
            ->scalar('engineDisplacement')
            ->maxLength('engineDisplacement', 255)
            ->allowEmpty('engineDisplacement');

        return $validator;
    }
}
