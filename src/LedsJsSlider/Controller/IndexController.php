<?php

namespace LedsJsSlider\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
// use LedsJsSlider\Form\Test;

class IndexController extends AbstractActionController{

	public function indexAction(){
        return new ViewModel();
	}

	public function createAction(){
		$data = array(
			'title' => 'my file',
			'url' => 'some url',
			'alt' => 'some alt'
		);

		$test = $this->getServiceLocator()->get('slideService');
		var_dump($test->create($data));
		return $this->redirect()->toRoute('slider', array('action' => 'list'));
        return new ViewModel();
	}

	public function listAction(){
		$test = $this->getServiceLocator()->get('slideService');
		var_dump($test->findAll());
	}

	public function updateAction(){
		$em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		$slide = $em->find('LedsJsSlider\Entity\SlideEntity', 3);
		$slide->setFile('updated');
		$slide->setUrl('sowewhere updated');
		$slide->setAlt('Alt updated');

		$test = $this->getServiceLocator()->get('slideService');
		$test->update($slide);
		return $this->redirect()->toRoute('slider', array('action' => 'list'));

	}

	public function deleteAction(){
		$em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		$slide = $em->find('LedsJsSlider\Entity\SlideEntity', 4);
		$test = $this->getServiceLocator()->get('slideService');
		$test->delete($slide);
		return $this->redirect()->toRoute('slider', array('action' => 'list'));

	}

}
