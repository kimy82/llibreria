<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Galeria;
use Acme\StoreBundle\Forms\GaleriaForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;


class GaleriaController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeStoreBundle:galeria:GaleriaMain.html.twig', array());
    }
    

	public function saveGaleriaAction(Request $request){
		$form = new GaleriaForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_galeria'))
       	 	->setMethod('POST')
            ->add('date_entrada', 'date')
            ->add('titol', 'text')
            ->add('subtitol', 'text')
            ->add('description', 'text')
            ->add('attachment', 'file')
            ->add('Desa', 'submit')
            ->getForm();
            
		$form->handleRequest($request);
	
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	        $galeria = new Galeria();
	        $dades =$form->getData();
	      	$galeria->setDataEntrada($form['date_entrada']->getData());
	        $galeria->setTitol($form['titol']->getData());
	        $galeria->setSubtitol($form['subtitol']->getData());
	        $galeria->setDescription($form['description']->getData());
	        $galeria->setAttachment("aaa");
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	         $em = $this->getDoctrine()->getManager();
	   		 $em->persist($galeria);
	    	 $em->flush();
	         $path= $this->get('kernel')->getImagesRootDir();
			 $file = $form['attachment']->getData()->move($path.'/downloads/galeria/','gal_'.$galeria->getId().'.jpg');
			 
			  $galeria->setAttachment('gal_'.$galeria->getId().'.jpg');
			  $em->persist($galeria);
	    	  $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_galeria'));
	    }
	    
	}
	
	public function precreateAction(Request $request)
	{	 
		$galeriaform = new GaleriaForm();			
	
	    
	$galeriaform->setDateEntrada(new \DateTime('tomorrow'));
            //$galeriaform->setDateEntrada(new \'years' => range(1,31);
       	$galeriaform->setTitol("Titol");
       	$galeriaform->setSubtitol("Sub Titol");
       	$galeriaform->setDescription("descripcio");
       	
       	 $formToRender = $this->createFormBuilder($galeriaform)
       	 	->setAction($this->generateUrl('store_new_galeria'))
       	 	->setMethod('POST')
            //->add('date_entrada', 'date')
                  //->add('date_entrada', 'date' array)
             ->add('date_entrada', 'date', array('years' => range(2001, 2018)))
         
            ->add('titol', 'text')
            ->add('subtitol', 'text')
            ->add('description', 'text')
            ->add('attachment', 'file')
            ->add('Desa', 'submit')
            ->getForm();
            
         
         
        return $this->render('AcmeStoreBundle:galeria:GaleriaForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>false,
        ));	   
	}
	
		public function listAction(Request $request, $orderBy)
	{	 
		$em = $this->getDoctrine()->getManager();
		$orderBy = str_replace("..", "'%", $orderBy);
		$orderBy = str_replace(".,", "%'", $orderBy);
		$query = $em->createQuery('SELECT n from AcmeStoreBundle:Galeria n where '.$orderBy);
		
		$paginator= $this->get('knp_paginator');
		$pagination= $paginator->paginate($query,$this->get('request')->query->get('page',1),10);
		$path= $this->get('kernel')->getImagesPath('galeria');
		$pathServer= $this->get('kernel')->getServerPath();
		
		return $this->render('AcmeStoreBundle:galeria:GaleriaList.html.twig', array(
            'pagination' => $pagination,'path' =>  $path,'pathlocal'=>$pathServer,
        ));
	}
	
		public function editAction($id)
	{	
		
		$galeria = $this->getDoctrine()->getRepository('AcmeStoreBundle:Galeria')->find($id);
		$galeriaform = new GaleriaForm();			
		
		$path = $this->get('kernel')->getImagesRootDir();
		$file = new File($path.'downloads/galeria/'.$galeria->getAttachment(), true);
	    
	    $galeriaform->setDateEntrada($galeria->getDataEntrada());
       	$galeriaform->setTitol($galeria->getTitol());
       	$galeriaform->setSubtitol($galeria->getSubtitol());
       	$galeriaform->setDescription($galeria->getDescription());
       	$galeriaform->setAttachment($file);
       	
       	$path = $this->get('kernel')->getServerPath();
       	 $formToRender = $this->createFormBuilder($galeriaform)
       	 	->setAction($path.'/admin/secured/galeria/update/'.$id)
       	 	->setMethod('POST')
            ->add('date_entrada', 'date')
            ->add('titol', 'text')
            ->add('subtitol', 'text')
            ->add('description', 'text')
            ->add('attachment', 'file')
            ->add('Desa', 'submit')
            ->getForm();
            
        return $this->render('AcmeStoreBundle:galeria:GaleriaForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>true,
        ));	   
	}
	
	public function updateGaleriaAction(Request $request,$id){
		$form = new GaleriaForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_galeria'))
       	 	->setMethod('POST')
            ->add('date_entrada', 'date')
            ->add('titol', 'text')
            ->add('subtitol', 'text')
            ->add('description', 'text')
            ->add('attachment', 'file')
            ->add('Desa', 'submit')
            ->getForm();
            
		$form->handleRequest($request);
	
		$galeria = $this->getDoctrine()->getRepository('AcmeStoreBundle:Galeria')->find($id);
		
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	       
	        $dades =$form->getData();
	      
	      	$galeria->setDataEntrada($form['date_entrada']->getData());
	        $galeria->setTitol($form['titol']->getData());
	        $galeria->setSubtitol($form['subtitol']->getData());
	        $galeria->setDescription($form['description']->getData());
	       
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	         $em = $this->getDoctrine()->getManager();
	   		 $em->persist($galeria);
	    	 $em->flush();
	         $path= $this->get('kernel')->getImagesRootDir();
	         if ($form['attachment']->getData()!=null){
			 	$file = $form['attachment']->getData()->move($path.'/downloads/galeria/','gal_'.$galeria->getId().'.jpg');
	         }
			 
			  $galeria->setAttachment('gal_'.$galeria->getId().'.jpg');
			  $em->persist($galeria);
	    	  $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_galeria'));
	    }
	    
	}
	
	public function deleteGaleriaAction(Request $request,$id){
	
	
		$galeria = $this->getDoctrine()->getRepository('AcmeStoreBundle:Galeria')->find($id);
		
	  	 $em = $this->getDoctrine()->getManager();
	   	 $em->remove($galeria);
	   	 $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_galeria'));
	    }
	    
	
	
}
