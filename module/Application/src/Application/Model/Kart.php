<?php
namespace Application\Model;

use Rox\Model\AbstractModel;

class Kart extends AbstractModel
{
    protected $fields = [
        '_id' => null,
        'name' => [[self::ALPHA_NUM, true], [1, 255], true],
        'number' => [self::INT, [1, 3], true]
    ];
}
