<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var $loader ClassLoader
 */
$loader = require __DIR__.'/../vendor/autoload.php';
/*loader->registerNameSpaces(array(
   'Knp\\Component'  => __DIR__.'/../vendor/knp-components/src',
   'Knp'             => __DIR__.'/../vendor/bundles',   
))*/

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
