<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Acme\StoreBundle\AcmeStoreBundle(),
            new Acme\DemoBundle\AcmeDemoBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Gregwar\ImageBundle\GregwarImageBundle()
        );

       
        
        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
    
  	public function getImagesRootDir()
    {
        return __DIR__.'/../';
    }
    
  	public function getImagesPath($place)
    {

        return 'http://localhost/repo22/downloads/'.$place.'/';

         
        
    }
    
	public function getImagesPathAlone()
    {
        return 'http://localhost/repo22/downloads/';
    }
    
	public function getServerPath()
    {

         if($this->getEnvironment()=='dev'){  
             return 'http://localhost/repo22/web/app_dev.php';
         }else{
              return 'http://localhost/repo22/web/app.php';
         }    
        
    
    }
}