<?php
namespace Application\Model;

use Rox\Model\AbstractModel;

class Kart extends AbstractModel
{
    const LAP_TIME_TYPE = 'Lap time must be INT';
    const LAP_TIME_VALUE = 'Lap time must be positive and grater than 20000';

    private $lapTime;
    private $position;

    protected $fields = [
        '_id' => null,
        'name' => [[self::ALPHA_NUM, true], [1, 255], true],
        'number' => [self::INT, [1, 3], true]
    ];

    public static function getPublicFields() {
        return [
            '_id',
            'name',
            'number'
        ];
    }
    /**
     * Set lap time in ms
     * @param int $time
     * @throws \InvalidArgumentException
     */
    public function setLapTime($time)
    {
        if(!is_int($time)){
            throw new \InvalidArgumentException(self::LAP_TIME_TYPE);
        }
        if (0 > $time || $time > 20000) {
            throw new \InvalidArgumentException(self::LAP_TIME_VALUE);
        }
        $this->lapTime = $time;
    }

    /**
     * Return lap time in ms
     * @return int
     */
    public function getLapTime()
    {
        return $this->lapTime;
    }

    /**
     * Set position
     * @param int $position
     * @throws \InvalidArgumentException
     */
    public function setPosition($position)
    {
        if(!is_int($position)){
            throw new \InvalidArgumentException(self::LAP_TIME_TYPE);
        }
        if (0 > $position) {
            throw new \InvalidArgumentException(self::LAP_TIME_VALUE);
        }
        $this->position = $position;
    }

    /**
     * Return position
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }
}
