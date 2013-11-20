<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Llibre;
use Acme\StoreBundle\Forms\LlibreForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Date;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeStoreBundle:menu:index.html.twig', array());
    }
    
	
	public function precreateAction(Request $request)
	{	 
		$llibreform = new LlibreForm();			 
        $llibreform->setName('Enter name');
        $llibreform->setDate(new \DateTime('tomorrow'));
        $llibreform->setDescripcio('descripcio');
        $llibreform->setDescriptio2('descripcio');
	
      

        $form = $this->createFormBuilder($llibreform)
            ->add('name', 'text')
            ->add('date', 'date')
            ->add('descripcio', 'text')
            ->add('descriptio2', 'text')
            ->add('attachment', 'file')
            ->add('price', 'number')
            ->add('Desa', 'submit')
            ->getForm();
	
		$form->handleRequest($request);
	
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	        $llibre = new Llibre();
	        $llibre->setName($form['name']);
	    	$llibre->setPrice($form['price']);
	    	$llibre->setDateEntrada($form['date']);
	    	$llibre->setDescription($form['descripcio']);
	    	$llibre->setDescription2($form['descripcio']);
	    	$llibre->setAttachment(" ");
	    	
	    	  $llibre2 = new Llibre();
	        $llibre2->setName("asss");
	    	$llibre2->setPrice(135);
	    	$llibre2->setDateEntrada(new DateTime());
	    	$llibre2->setDescription("ssss");
	    	$llibre2->setDescription2("sss");
	    	$llibre2->setAttachment(" ");
	    	
	    	
	    	$em = $this->getDoctrine()->getManager();
	    	$em->persist($llibre2);
	    	$em->flush();
	    	
	    	$path= "llibre_".$llibre->getId().".jpg";
	    	
			$file = $form['attachment']->getData()->move('/downloads/llibre/',$path);
		
	        return $this->redirect($this->generateUrl('acme_store_homepage'));
	    }
        return $this->render('AcmeStoreBundle:Default:llibreMain.html.twig', array(
            'form' => $form->createView(),
        ));	   
	}
}
