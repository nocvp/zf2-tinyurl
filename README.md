ZF2 TinyUrl, v1.0
=======

Introduction
------------

ZF2 TinyUrl is a Zend Framework 2 module that provides [youtube-or-tinyurl](http://kvz.io/blog/2009/06/10/create-short-ids-with-php-like-youtube-or-tinyurl/) features.


Requirements
------------

* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)

Installation
------------

### Main Setup

#### With composer

1. Add this project in your composer.json:

    ```json
    "require": {
        "noc-med/zf2-tinyurl": "dev-master"
    }
    ```

2. Now tell composer to download __ZF2 TinyUrl__ by running the command:

    ```bash
    $ php composer.phar update
    ```

#### Post installation

1. Enabling it in your `application.config.php`file.

    ```php
    <?php
    return array(
        'modules' => array(
            // ...
            'NocMed\TinyUrl',
        ),
        // ...
    );
    ```
    
# How to use _ZF2 TinyUrl_


1. Call TinyUrl with the service manager

	```php
	
	/* @var $serviceManager \Zend\ServiceManager\ServiceLocatorInterface */	
	
   	$tinyUrl = $serviceManager->get('NocMed\TinyUrl');
   	$tinyUrl->alphaID(907492350932095432);
   	```
    
2. Call TinyUrl in a view

 	```php
   	$tinyUrl = $this->plugin('NocMed\TinyUrl');
   	$tinyUrl->alphaID(907492350932095432);
   	```