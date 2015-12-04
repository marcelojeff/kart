<?php
namespace Application\Model;

use Rox\Model\AbstractModel;

class Race extends AbstractModel
{

    const INVALID_KART_FORMAT = 'Kart must be an array with right fields';
    const NONE_KART_FOR_RACE = 'None Kart for this race. A race must have at least one';
    const RACE_NOT_SIMULATED = "The race haven't been sumilated yet";
    const RACE_ALREDY_SIMULATED = "The race was already simulated";
    const MIN_TIME_LAP = 21500;

    private $karts = [];
    private $simulated = false;

    protected $fields = [
        '_id' => null,
        'name' => [[self::ALPHA_NUM, true], [1, 255], true],
        'Karts' => ['dynamic' => true]
    ];

    /**
     *
     * @param array $kart
     * @throws \InvalidArgumentException
     */
    public function addKart(Kart $kart) {
        array_push($karts,$kart);
    }

    /**
     * @return array
     */
    public function getKarts() {
        return $karts;
    }

    /**
     * @return void
     */
    public function simulate() {
        $lapTimes[0] = rand(MIN_TIME_LAP);

        if(!isset($karts[0])){
            throw new Exception(NONE_KART_FOR_RACE, 1);
        }

        foreach ($karts as $id => $kart) {
            if(get_class($kart) == 'Kart'){
                // set values between max and mininum laptimes following the bussiness definition 
                $lapTimes[$id] = rand(min($lapTimes) - 1500, max($lapTimes) + 1500);
                $Kart->setLapTime($lapTimes[$id]);
                $simulated = true;
            }else{
                throw new Exception(INVALID_KART_FORMAT, 1);
            }
        }
    }

    /**
     * @return array
     */
    public function getResults() {
        return getKarts();
    }
}
