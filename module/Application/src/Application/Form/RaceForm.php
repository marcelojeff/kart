<?php
namespace Application\Form;

use Zend\Form\Form;

class RaceForm extends Form
{
    public function __construct($name = 'form')
    {
        parent::__construct($name);
        $this->add([
            'name' => 'csrf',
            'type' => 'Csrf'
        ]);
        $this->add([
            'name' => '_id',
            'type' => 'Hidden',
        ]);
        $this->add([
            'name' => 'name',
            'type' => 'Text',
            'options' => [
                'label' => 'Nome',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'name'
            ]
        ]);
        $this->add([
            'name' => 'track',
            'type' => 'Text',
            'options' => [
                'label' => 'Circuito',
            ],
            'attributes' => [
                'class' => 'form-control',
                'id' => 'track'
            ]
        ]);
    }
}