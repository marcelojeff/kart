<?php
namespace Application\Model;

use Rox\Model\AbstractModel;

class Race extends AbstractModel
{

    const INVALID_KART_FORMAT = 'Kart must be an array with right fields';
    const NONE_KART_FOR_RACE = 'None Kart for this race. A race must have at least one';
    const RACE_NOT_SIMULATED = "The race haven't been sumilated yet";
    const RACE_ALREADY_SIMULATED = "The race was already simulated";

    private $karts = [];
    private $simulated = false;

    protected $fields = [
        '_id' => null,
        'name' => [[self::ALPHA_NUM, true], [1, 255], true],
        'kartodromo' => [[self::ALPHA_NUM, true], [1, 255], true],
        'Karts' => ['dynamic' => true]
    ];

    /**
     *
     * @param array $kart
     * @throws \InvalidArgumentException
     */
    public function addKart(Kart $kart) 
    {
        if (is_array($kart) && count($kart)==0)
        {
            throw new \InvalidArgumentException(self::INVALID_KART_FORMAT);
        }

        $this->karts[] = $kart;           
    }

    /**
     * @return array
     */
    public function getKarts() 
    {
        return $this->karts;
    }

    /**
     * @return void
     */
    public function simulate() 
    {
        if ($this->simulated == true)
        {
            throw new \RuntimeException(self::RACE_ALREADY_SIMULATED);        
        }

        if (count($this->karts)==0)
        {
            throw new \RuntimeException(self::NONE_KART_FOR_RACE);        
        }

        $this->simulated = true;
        return $this->karts;
    }

    /**
     * @return array
     */
    public function getResults() 
    {
        if ($this->simulated == false)
        {
            throw new \RuntimeException(self::RACE_NOT_SIMULATED);        
        }

        return $this->karts;
    }
}
