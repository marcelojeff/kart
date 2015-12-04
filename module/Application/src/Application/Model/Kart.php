<?php
namespace Application\Model;

use Rox\Model\AbstractModel;

class Kart extends AbstractModel
{
    const LAP_TIME_TYPE = 'Lap time must be INT';
    const LAP_TIME_VALUE = 'Lap time must be positive and grater than 20000';

    private $lapTime;

    protected $fields = [
        '_id' => null,
        'name' => [[self::ALPHA_NUM, true], [1, 255], true],
        'number' => [self::INT, [1, 3], true]
    ];

    /**
     * Set lap time in ms
     * @param int $time
     * @throws \InvalidArgumentException
     */
    public function setLapTime($time)
    {
        if(is_numeric($time)){
            if( $time > 20000 ){
                $laptime = $time;
            }else{
                throw new Exception(LAP_TIME_VALUE, 1);
            }
        }else{
            throw new Exception(LAP_TIME_TYPE, 1);
        }
    }

    /**
     * Return lap time in ms
     * @return int
     */
    public function getLapTime()
    {
        if ($laptime > 20000) {
            return $laptime;
        }else{
            throw new Exception(LAP_TIME_VALUE, 1);
        }
    }
}
