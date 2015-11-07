<?php
namespace LedsJsSlider\View\Helper;

use LedsJsSlider\Service\SlideService;
use Zend\View\Helper\AbstractHtmlElement;

class SlideshowViewHelper extends AbstractHtmlElement{

	protected $slideService;
	protected $options = array(
        'attributes' => array(
            'class' => 'bjqs',
        ),
        'slide_attributes' => array(
            'class' => 'slide',
        ),
        'image_attributes' => array(),
        'link_attributes' => array(),
        'resize_options' => array(),
    );

	public function __construct(SlideService $slideService){
        $this->slideService = $slideService;
    }

	public function __invoke($options = array()){
        $this->options = array_merge_recursive($this->options, $options);
        return $this;
    }

	public function openTag(){
        $this->getView()->headScript()
            ->appendFile($this->getView()->basePath('/js/slider/bjqs.js'));
        $this->getView()->headLink()
            ->appendStylesheet($this->getView()->basePath('/js/slider/bjqs.css'));

        $attributes = $this->htmlAttribs($this->options['attributes']);

        return sprintf("<ul%s>", $attributes) . PHP_EOL;
    }	

	//public function slides(){
		
        //$slideAttribs = $this->options['slide_attributes'];
        //$linkAttribs = $this->options['link_attributes'];

        //$markup = '';
        //foreach($this->getSlides() as $slide) {

            //$slideAttribs['data-id'] = $slide->getId();

            //$imgAttribs['src'] = $slide->getUrl();
            //$imgAttribs['alt'] = $slide->getAlt();

            //$linkAttribs['href'] = $slide->getUrl();

            //// attributes passed via the helper options array do override actual image properties.
            //$imgAttribs = array_merge($imgAttribs, $this->options['image_attributes']);

            //$format = '<figure%s><img%s></figure>';

            //$args = array(
                //$this->htmlAttribs($slideAttribs),
                //$this->htmlAttribs($imgAttribs)
            //);

            //if(!empty($linkAttribs['href'])) {
                //$format = '<a%3$s>'.$format.'</a>';
                //$args[] = $this->htmlAttribs($linkAttribs);
            //}

            //$markup .= vsprintf($format, $args) . PHP_EOL;
        //}

        //return $markup;
    //}
    
	public function slides(){

        $markup = '';
        foreach($this->getSlides() as $slide) {

            $imgAttribs['src'] = $slide->getUrl();
            $imgAttribs['alt'] = $slide->getAlt();
            $imgAttribs['title'] = $slide->getTitle();            
            $imgAttribs = array_merge($imgAttribs, $this->options['image_attributes']);

            $format = '<li><img%s></li>';
            $args = array(
                $this->htmlAttribs($imgAttribs)
            );
            $markup .= vsprintf($format, $args) . PHP_EOL;
        }
        return $markup;
    }    

	public function closeTag(){
        return '</ul>' . PHP_EOL;
    }

	protected function getSlides(){
        $slides = $this->slideService->findAll();

        if (!$slides) {
            return array();
        }

        return $slides;
    }

	public function __toString(){
        return $this->openTag() . $this->slides() . $this->closeTag();
    }


}


































