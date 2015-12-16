LedsJsSlider
============

##Introduction

ZF2 Module implementing [Basic jQuery Slider](http://www.basic-slider.com/).

##Installation Using Composer

The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies:

    curl -s https://getcomposer.org/installer | php --

You would then invoke `composer` to install dependencies. Add to your composer.json

	"ledsinclouds/leds-js-slider": "dev-master"        
        
##Required Modules

	"doctrine/doctrine-module": "0.*",  
	"doctrine/doctrine-orm-module": "0.*",	
	"rwoverdijk/assetmanager": "1.*"
		        
##Configuration

Once module installed, you could declare the module into your __"config/application.config.php"__ by adding: 
	
        'Application',	
        'DoctrineModule',
		'DoctrineORMModule',
        'LedsJsSlider',
        'AssetManager',					         	

Copy/Paste the configuration file and change configuration options according to your social accounts.
Note: You must create applications for that...

    cp vendor/ledsinclouds/leds-js-slider/config/doctrine.local.php.dist config/autoload/doctrine.local.php
	
##Create your Database:

	./vendor/bin/doctrine-module orm:validate-schema
	./vendor/bin/doctrine-module orm:schema-tool:update --force
	
##ViewHelper

You can use it with the ViewHelper provided in this module

	&lt;div id="container">
		&lt;?php echo $this->slideShow(); ?>
	&lt;/div>
	&lt;script>
		jQuery(document).ready(function($) {
			$('#container').bjqs({
				'height' : 320,
				'width' : 620,
				'responsive' : true
			});
		});
	&lt;/script>  
