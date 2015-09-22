<?php
namespace Application\Model;

use Rox\Model\AbstractModel;

class Race extends AbstractModel
{

    const INVALID_KART_FORMAT = 'Kart must be an array with right fields';

    private $karts = [];

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
    public function setKart($kart) {
        if(is_array($kart) && empty(array_diff(array_keys($kart), Kart::getPublicFields()))){
            $this->karts[] = $kart;
        } else {
            throw new \InvalidArgumentException(self::INVALID_KART_FORMAT);
        }
    }

    /**
     * @return array
     */
    public function getKarts() {
        return $this->karts;
    }

    public function simulate() {
        ;
    }

    /**
     * @return array
     */
    public function getResults() {
        return [];
    }
}
