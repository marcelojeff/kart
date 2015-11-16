<?php
namespace ApplicationTest\Model;

use PHPUnit_Framework_TestCase;
use Application\Model\Kart;

class KartTest extends PHPUnit_Framework_TestCase
{

    public function testSetLapTime()
    {
        $kart = new Kart();
        $lapTime = 120000;
        $kart->setLapTime($lapTime);
        $lap = $kart->getLapTime();
        $this->assertEquals($lap, $lapTime);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage \Application\Model\Kart::LAP_TIME_TYPE
     */
    public function testSetLapTimeTypeFail()
    {
        $kart = new Kart();
        $kart->setLapTime('foobar');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage \Application\Model\Kart::LAP_TIME_VALUE
     */
    public function testSetLapTimeNegativeValueFail()
    {
        $kart = new Kart();
        $kart->setLapTime(-1);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage \Application\Model\Kart::LAP_TIME_VALUE
     */
    public function testSetLapTimeOverValueFail()
    {
        $kart = new Kart();
        $lapTime = 300000;
        $kart->setLapTime($lapTime);
    }
}