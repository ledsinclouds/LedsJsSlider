<?php
namespace LedsJsSlider\Service;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use LedsJsSlider\Entity\SlideEntity;

class SlideService{

	protected $objectManager;
	protected $objectRepository;

	public function __construct(ObjectManager $objectManager){
		$this->objectManager = $objectManager;
		$this->objectRepository = $objectManager->getRepository('LedsJsSlider\Entity\SlideEntity');
	}

	public function create($data){
		$slide = new SlideEntity();
		$slide->setFile($data['title']);
		$slide->setAlt($data['alt']);
		$slide->setUrl($data['url']);
		$this->objectManager->persist($slide);
		$this->objectManager->flush();
		return $slide;
	}

	public function findAll(){
        return $this->objectRepository->findAll();
	}

	public function find($id){
		return $this->objectRepository()->find($id);
	}

	public function update(SlideEntity $slide){
		$this->objectManager->flush($slide);
		return $this;
	}

	public function delete(SlideEntity $slide){
		$this->objectManager->remove($slide);
		$this->objectManager->flush();
		return $this;
	}
}
