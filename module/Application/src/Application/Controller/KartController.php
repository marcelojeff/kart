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

        $karts = $this->serviceLocator->get('karts')->findAll();
        $viewModel = new ViewModel();
        $viewModel->setVariables([
            'karts' => $karts
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
            $kart = new Kart();
            $form->setInputFilter($kart->getInputFilter());
            if ($form->isValid()) {
                try {
                    $kart->exchangeArray($form->getData());
                    $this->serviceLocator->get('karts')->save($kart->getArrayCopy());
                } catch (\Exception $e) {}
                return $this->redirect()->toRoute('application/default', [
                    'controller' => 'kart'
                ]);
            }
        } elseif ($id) {
            $kartData = $this->serviceLocator->get('karts')->findById($id);
            $form->setData($kartData);
        }
        $viewModel = new ViewModel();
        $viewModel->setVariables([
            'form' => $form
        ]);
        $viewModel->setTemplate('application/kart/form.phtml');
        return $viewModel;
    }

    public function deleteAction()
    {
        $id = $this->params('id');
        try {
            $this->serviceLocator->get('karts')->delete($id);
        } catch (\Exception $e) {}
        return $this->redirect()->toRoute('application/default', [
            'controller' => 'kart'
        ]);
    }

    private function getForm()
    {
        return new KartForm();
    }
}