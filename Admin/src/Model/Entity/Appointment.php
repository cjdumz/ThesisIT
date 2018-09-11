<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Appointment Entity
 *
 * @property int $id
 * @property int $serviceId
 * @property int $vehicleId
 * @property string $serviceType
 * @property string $vehicleProblem
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $status
 * @property string $specialOffer
 * @property \Cake\I18n\FrozenDate $date
 * @property \Cake\I18n\FrozenTime $time
 */
class Appointment extends Entity
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
        'serviceId' => true,
        'vehicleId' => true,
        'serviceType' => true,
        'vehicleProblem' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'specialOffer' => true,
        'date' => true,
        'time' => true
    ];
}
