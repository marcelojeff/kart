<?php
namespace Application\Model;

use Rox\Model\AbstractModel;

class Race extends AbstractModel
{

    const INVALID_KART_FORMAT = 'Kart must be an array with right fields';
    const NONE_KART_FOR_RACE = 'None Kart for this race. A race must have at least one';
    const RACE_NOT_SIMULATED = "The race haven't been sumilated yet";

    private $karts = [];
    private $simulated = false;

    protected $fields = [
        '_id' => null,
        'name' => [[self::ALPHA_NUM, true], [1, 255], true],
        'track' => [[self::ALPHA_NUM, true], [1, 255], true],
        'Karts' => ['dynamic' => true]
    ];

    /**
     * 
     * @param array $kart
     * @throws \InvalidArgumentException
     */
    public function addKart(Kart $kart) {
        $this->karts[] = $kart;
    }

    /**
     * @return array
     */
    public function getKarts() {
        return $this->karts;
    }

    public function simulate() {
        if(empty($this->karts)){
            throw new \RuntimeException(self::NONE_KART_FOR_RACE);
        }
        foreach ($this->karts as $kart) {
            $kart->setLapTime(rand(105000, 120000));
            //TODO grant that laptime is unique for session
        }
        usort($this->karts, function($a, $b){
            if($a->getLapTime() < $b->getLapTime()){
                return 1;
            } elseif($a->getLapTime() > $b->getLapTime()) {
                return -1;
            }
            throw new \RuntimeException("2 Karts can't have same lap time");
        });
        $this->simulated = true;
        return $this->getResults();
    }

    /**
     * @return array
     */
    public function getResults() {
        if(!$this->simulated){
            throw new \RuntimeException(self::RACE_NOT_SIMULATED);
        }
        return $this->karts;
    }
}
