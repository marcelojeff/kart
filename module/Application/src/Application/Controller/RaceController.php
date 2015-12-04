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
            $race = new Race();
            $form->setInputFilter($race->getInputFilter());
            if ($form->isValid()) {
                try {
                    $race->exchangeArray($form->getData());
                    $this->serviceLocator->get('races')->save($race->getArrayCopy());
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

    public function simulationModalAction() {
        $karts = $this->serviceLocator->get('karts')->findAll();
        $viewModel = new ViewModel();
        $viewModel->setVariables([
            'karts' => $karts
        ]);

        $request = $this->getRequest();
        $viewModel->setTerminal($request->isXmlHttpRequest());
        return $viewModel;
    }

    public function addKart(){
        $kart = $karts = $this->serviceLocator->get('karts')->find();

    }

    public function doSimulation(){
        
    }

    private function getForm()
    {
        return new RaceForm();
    }
}