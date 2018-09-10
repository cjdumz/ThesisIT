<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppointmentsFixture
 *
 */
class AppointmentsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 255, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'serviceId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'vehicleId' => ['type' => 'integer', 'length' => 255, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'serviceType' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'vehicleProblem' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'specialOffer' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'time' => ['type' => 'time', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'plateNumber' => ['type' => 'string', 'length' => 11, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'serviceId' => 1,
                'vehicleId' => 1,
                'serviceType' => 'Lorem ipsum dolor sit amet',
                'vehicleProblem' => 'Lorem ipsum dolor sit amet',
                'created' => '2018-09-10 06:30:24',
                'modified' => '2018-09-10 06:30:24',
                'status' => 'Lorem ipsum dolor sit amet',
                'specialOffer' => 'Lorem ipsum dolor sit amet',
                'date' => '2018-09-10',
                'time' => '06:30:24',
                'plateNumber' => 'Lorem ips'
            ],
        ];
        parent::init();
    }
}
