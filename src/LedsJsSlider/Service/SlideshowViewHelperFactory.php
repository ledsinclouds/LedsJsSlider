<?php
namespace LedsJsSlider\Service;

use LedsJsSlider\View\Helper\SlideshowViewHelper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SlideshowViewHelperFactory implements FactoryInterface{

	public function createService(ServiceLocatorInterface $serviceLocator){
		$slideService = $serviceLocator->getServiceLocator()->get('slideService');
		$helper = new SlideshowViewHelper($slideService);
		return $helper;
	}

}
