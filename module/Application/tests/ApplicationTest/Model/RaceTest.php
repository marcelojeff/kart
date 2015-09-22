<?php
namespace ApplicationTest\Model;

use PHPUnit_Framework_TestCase;
use Application\Model\Race;

class RaceTest extends PHPUnit_Framework_TestCase
{

    public function testSetKart()
    {
        $race = new Race();
        $kart = ['_id' => 'abcdefghijklmnopqrstuvx1', 'number' => 12, 'name' => 'fobarbaz'];
        $race->setKart($kart);
        $kartsList = $race->getKarts();
        $this->assertTrue($kartsList[0] === $kart);
        $kart['number'] = 13;
        $race->setKart($kart);
        $kartsList = $race->getKarts();
        $this->assertTrue($kartsList[1] === $kart);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage \Application\Model\Race::INVALID_KART_FORMAT
     */
    public function testSetKartTypeFail()
    {
        $race = new Race();
        $race->setKart('foobar');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage \Application\Model\Race::INVALID_KART_FORMAT
     */
    public function testSetKartArrayFormatFail()
    {
        $race = new Race();
        $race->setKart([0 , 2]);
    }

    public function testGetRaceResults() {
        $karts = [
            [
                '_id' => 'abcdefghijklmnopqrstuvx1',
                'number' => 12,
                'name' => 'fobarbaz'
            ],
            [
                '_id' => 'abcdefghijklmnopqrstuvx2',
                'number' => 13,
                'name' => 'fobarbax'
            ]
        ];
        $race = new Race();
        $race->setKart($karts[0]);
        $race->setKart($karts[1]);
        $race->simulate();
        $results = $race->getResults();
        $this->assertCount(2, $results);
    }
}