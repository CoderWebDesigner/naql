<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TafaseerFixture
 *
 */
class TafaseerFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tafaseer';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'tafseerlink' => ['type' => 'string', 'length' => 233, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'soundtrack' => ['type' => 'string', 'length' => 233, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'sora_type' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ayat_counter' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'pages_counter' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'part_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
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
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'tafseerlink' => 'Lorem ipsum dolor sit amet',
            'soundtrack' => 'Lorem ipsum dolor sit amet',
            'sora_type' => 1,
            'ayat_counter' => 1,
            'pages_counter' => 1,
            'part_id' => 1
        ],
    ];
}
