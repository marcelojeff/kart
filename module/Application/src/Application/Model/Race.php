<?php
namespace Application\Model;

use Rox\Model\AbstractModel;

class Race extends AbstractModel
{
    protected $fields = [
        '_id' => null,
        'name' => [[self::ALPHA_NUM, true], [1, 255], true],
        'Karts' => ['dynamic' => true]
    ];
}
