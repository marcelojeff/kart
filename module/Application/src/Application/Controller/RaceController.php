<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Race;
use Application\Form\RaceForm;

class RaceController extends AbstractActionController
{

    public function indexAction()
    {
        $races = $this->serviceLocator->get('races')->findAll();
        $viewModel = new ViewModel();
        $viewModel->setVariables([
            'races' => $races
        ]);
        return $viewModel;
    }

    public function saveAction()
    {
        $form = $this->getForm();
        $request = $this->getRequest();
        $id = $this->params('id');
        if ($request->isPost()) {
            $data = $request->getPost();
            $form->setData($data);
            $kart = new Race();
            $form->setInputFilter($kart->getInputFilter());
            if ($form->isValid()) {
                try {
                    $kart->exchangeArray($form->getData());
                    $this->serviceLocator->get('races')->save($kart->getArrayCopy());
                } catch (\Exception $e) {}
                return $this->redirect()->toRoute('application/default', [
                    'controller' => 'race'
                ]);
            }
        } elseif ($id) {
            $data = $this->serviceLocator->get('races')->findById($id);
            $form->setData($data);
        }
        $viewModel = new ViewModel();
        $viewModel->setVariables([
            'form' => $form
        ]);
        $viewModel->setTemplate('application/race/form.phtml');
        return $viewModel;
    }

    public function deleteAction()
    {
        $id = $this->params('id');
        try {
            $this->serviceLocator->get('races')->delete($id);
        } catch (\Exception $e) {}
        return $this->redirect()->toRoute('application/default', [
            'controller' => 'race'
        ]);
    }

    private function getForm()
    {
        return new RaceForm();
    }
}