<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\KartForm;
use Application\Model\Kart;

class KartController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function createAction()
    {
        $form = $this->getForm();
        $request = $this->getRequest();
        if($request->isPost()){
            $data = $request->getPost();
            $form->setData($data);
            $kart = new Kart();
            $form->setInputFilter($kart->getInputFilter());
            if($form->isValid()){
                
            }
        }
        $viewModel = new ViewModel();
        $viewModel->setVariables([
            'form' => $form
        ]);
        $viewModel->setTemplate('application/kart/form.phtml');
        return $viewModel;
    }

    public function deleteAction() {
        $id = $this->params('id');
        return $this->redirect()->toRoute('application/default', [
            'controller' => 'kart'
        ]);
    }

    private function getForm() {
        return new KartForm();
    }
}