<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehicle Entity
 *
 * @property int $id
 * @property int $userId
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $plateNumber
 * @property string $bodyType
 * @property string $yearModel
 * @property string $chasisNumber
 * @property string $engineClassification
 * @property string $numberOfCylinders
 * @property string $typeOfDriveTrain
 * @property string $make
 * @property string $series
 * @property string $color
 * @property string $engineNumber
 * @property string $typeOfEngine
 * @property string $engineDisplacement
 * @property \Cake\I18n\FrozenTime $created
 */
class Vehicle extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'userId' => true,
        'modified' => true,
        'plateNumber' => true,
        'bodyType' => true,
        'yearModel' => true,
        'chasisNumber' => true,
        'engineClassification' => true,
        'numberOfCylinders' => true,
        'typeOfDriveTrain' => true,
        'make' => true,
        'series' => true,
        'color' => true,
        'engineNumber' => true,
        'typeOfEngine' => true,
        'engineDisplacement' => true,
        'created' => true
    ];
}
