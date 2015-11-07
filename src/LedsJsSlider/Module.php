<?php
namespace LedsJsSlider;

use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\Event;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\View\Model\ViewModel;

class Module{

	public function getServiceConfig(){
		return array(
			'factories' => array(
				'slideService' => 'LedsJsSlider\Service\SlideServiceFactory'
			)
		);
	}

	public function getViewHelperConfig(){
		return array(
			'factories' => array(
				'slideShow' => 'LedsJsSlider\Service\SlideshowViewHelperFactory'
			)
		);
	}

    public function getConfig(){
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig(){
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/../../src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
