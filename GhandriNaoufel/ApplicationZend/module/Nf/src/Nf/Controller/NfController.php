<?php
// module/Nf/src/Nf/Controller/NfController.php:
 namespace Nf\Controller;
 
 use Zend\View\Model\JsonModel;
 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 use Nf\Model\Nf;
 use Nf\Form\NfForm;     

class NfController extends AbstractActionController
{
	protected $nfTable;
	
    public function indexAction()
    {
        return new ViewModel(array(
            'nfs' => $this->getNfTable()->fetchAll(),
        ));
    }

   public function addAction()
    {
        $form = new NfForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $nf = new Nf();
            $form->setInputFilter($nf->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $nf->exchangeArray($form->getData());
                $this->getNfTable()->saveNf($nf);

                // Redirect to list of nfs
                return $this->redirect()->toRoute('nf');
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('nf', array(
                'action' => 'add'
            ));
        }
        $nf = $this->getNfTable()->getNf($id);

        $form  = new NfForm();
        $form->bind($nf);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($nf->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getNfTable()->saveNf($nf);

                // Redirect to list of nfs
                return $this->redirect()->toRoute('nf');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('nf');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getNfTable()->deleteNf($id);
            }

            // Redirect to list of nfs
            return $this->redirect()->toRoute('nf');
        }

        return array(
            'id'    => $id,
            'nf' => $this->getNfTable()->getNf($id)
        );
    }
	
	 
public function noterAction(){
		   $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('nf', array(
                'action' => 'add'
            ));
        }
        $nf = $this->getNfTable()->getNf($id);

        $form  = new NfForm();
        $form->bind($nf);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($nf->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getNfTable()->saveNf($nf);

                
                return $this->redirect()->toRoute('nf');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }
	
	
	public function modifAction(){
		$id = (int) $this->params()->fromRoute('id',0);
		$this->getNfTable()->deleteNf($id);
		$result = new JsonModel(array(
				'success'=>true,
			));

			return $result;

    }
	


    public function getNfTable()
    {
        if (!$this->nfTable) {
            $sm = $this->getServiceLocator();
            $this->nfTable = $sm->get('Nf\Model\NfTable');
        }
        return $this->nfTable;
    }
}