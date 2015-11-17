<?php
namespace ApplicationTest\Model;

use PHPUnit_Framework_TestCase;
use Application\Model\Race;
use Application\Model\Kart;

class RaceTest extends PHPUnit_Framework_TestCase
{

    public function testAddKart()
    {
        $race = new Race();
        
        $kart = new Kart();
        $race->addKart($kart);
        $kartsList = $race->getKarts();
        $this->assertCount(1, $kartsList);
        $this->assertEquals($kart, $kartsList[0]);

        $kart2 = new Kart();
        $race->addKart($kart2);
        $kartsList = $race->getKarts();
        $this->assertCount(2, $kartsList);
        $this->assertEquals($kart2, $kartsList[1]);
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage \Application\Model\Race::NONE_KART_FOR_RACE
     */
    public function testSimulateFailNoneKart() {
        $race = new Race();
        $race->simulate();
    }

    public function testSimulate() {
        $race = new Race();
        $race->addKart(new Kart());
        $race->addKart(new Kart());
        $karts = $race->simulate();
        $this->assertTrue($karts[0]->getLapTime()+1500 >= $karts[1]->getLapTime());
        return $race;
    }

    /**
     * @depends testSimulate
     */
    public function testGetRaceResults($race) {
        $results = $race->getResults();
        $this->assertCount(2, $results);
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage \Application\Model\Race::RACE_NOT_SIMULATED
     */
    public function testGetRaceResultsFail() {
        $race = new Race();
        $results = $race->getResults();
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage \Application\Model\Race::RACE_ALREADY_SIMULATED
     */
    public function testSimulateAlreadyDone() {
      $race = new Race();
      $race->addKart(new Kart());
      $race->addKart(new Kart());
      $race->simulate();
      $race->simulate();
    }
    
}
