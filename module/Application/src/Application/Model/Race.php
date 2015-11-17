<?php
namespace Application\Model;

use Rox\Model\AbstractModel;

class Race extends AbstractModel
{

    const INVALID_KART_FORMAT = 'Kart must be an array with right fields';
    const NONE_KART_FOR_RACE = 'None Kart for this race. A race must have at least one';
    const RACE_NOT_SIMULATED = "The race haven't been sumilated yet";
    const RACE_ALREDY_SIMULATED = "The race was already simulated";

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
    public function addKart(Kart $kart) {}

    /**
     * @return array
     */
    public function getKarts() {}

    /**
     * @return void
     */
    public function simulate() {}

    /**
     * @return array
     */
    public function getResults() {}
}
