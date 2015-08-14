<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\KartForm;

class KartController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function createAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setVariables(['form' => $this->getForm()]);
        $viewModel->setTemplate('application/kart/form.phtml');
        return $viewModel;
    }

    private function getForm() {
        return new KartForm();
    }
}