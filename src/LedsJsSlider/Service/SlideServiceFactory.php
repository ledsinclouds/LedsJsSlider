<?php
namespace LedsJsSlider\Service;

use Doctrine\Common\Persistence\ObjectManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SlideServiceFactory implements FactoryInterface{

	public function createService(ServiceLocatorInterface $serviceLocator){
		$objectManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
		$slideService = new SlideService($objectManager);
		return $slideService;
	}

}
