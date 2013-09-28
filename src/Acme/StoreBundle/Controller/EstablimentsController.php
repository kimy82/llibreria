<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\establiments;
use Acme\StoreBundle\Entity\foto;
use Acme\StoreBundle\Forms\EstablimentsForm;
use Acme\StoreBundle\Forms\FotoForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;


class EstablimentsController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeStoreBundle:establiments:EstablimentsMain.html.twig', array());
    }
    

	public function saveEstablimentsAction(Request $request){
		$form = new EstablimentsForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_establiments'))
       	 	->setMethod('POST')
            ->add('titol', 'text')
            ->add('description', 'text')
            ->add('save', 'submit')
            ->getForm();
            
		$form->handleRequest($request);
	
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	        $establiments = new Establiments();
	        $dades =$form->getData();
	        $establiments->setTitol($form['titol']->getData());
	        $establiments->setDescription($form['description']->getData());    
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	        $em = $this->getDoctrine()->getManager();
                $em->persist($establiments);
	    	$em->flush();
	        
			
	        return $this->redirect($this->generateUrl('acme_pre_store_establiments'));
	    }
	    
	}
	
	public function precreateAction(Request $request)
	{	 
		$establimentsform = new EstablimentsForm();
                $fotoform = new FotoForm();
	
	    
	
       	$establimentsform->setTitol("Titol");
       	$establimentsform->setDescription("descripcio");
        $fotoform->setDescription("descripcio");
       	
       	 $formToRender = $this->createFormBuilder($establimentsform)
       	 	->setAction($this->generateUrl('store_new_establiments'))
       	 	->setMethod('POST')
            ->add('titol', 'text')
            ->add('description', 'text')
            ->add('save', 'submit')
            ->getForm();
            
        	 $formfotoToRender = $this->createFormBuilder($fotoform)
       	 	->setAction($this->generateUrl('store_new_foto'))
       	 	->setMethod('POST')
            ->add('description', 'text')
             ->add('attachment', 'file')
            ->add('save', 'submit')
            ->getForm();    
            
        return $this->render('AcmeStoreBundle:establiments:EstablimentsForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>false,
            'formater' => $formfotoToRender->createView(),'attachment'=>'',
        ));	   
	}
	
		public function listAction(Request $request, $orderBy)
	{	 
		$em = $this->getDoctrine()->getManager();
		$orderBy = str_replace("..", "'%", $orderBy);
		$orderBy = str_replace(".,", "%'", $orderBy);
		$query = $em->createQuery('SELECT n from AcmeStoreBundle:foto n where '.$orderBy);
		
		$paginator= $this->get('knp_paginator');
		$pagination= $paginator->paginate($query,$this->get('request')->query->get('page',1),10);
		$path= $this->get('kernel')->getImagesPath('foto');
		$pathServer= $this->get('kernel')->getServerPath();
		
		return $this->render('AcmeStoreBundle:establiments:EstablimentsList.html.twig', array(
            'pagination' => $pagination,'path' =>  $path,'pathlocal'=>$pathServer,
        ));
	}
	
		public function editoAction($id)
	{	
		
		$foto = $this->getDoctrine()->getRepository('AcmeStoreBundle:Foto')->find($id);
		$fotoform = new FotoForm();			
		
	    
    $path= $this->get('kernel')->getImagesRootDir();
       	$fotoform->setDescription($foto->getDescription());
         $pathImg = $this->get('kernel')->getImagesPath("foto").$foto->getAttachment();
        $file = new File($path.'downloads/foto/'.$foto->getAttachment(), true);
       	$fotoform->setAttachment($file);
       	
       	 $formToRender = $this->createFormBuilder($fotoform)
       	 	->setAction($path.'/admin/secured/establiments/update/'.$id)
       	 	->setMethod('POST')
           
            ->add('description', 'text')
            ->add('attachment', 'file')
            ->add('save', 'submit')
            ->getForm();
            
            
            $establiments = $this->getDoctrine()->getRepository('AcmeStoreBundle:Establiments')->find(1);
	    $establimentsform = new EstablimentsForm();			
		
	    
    
       	$establimentsform->setDescription($establiments->getDescription());
        $establimentsform->setTitol($establiments->getTitol());
      
       
       
       	 $formToRenderEstabliments = $this->createFormBuilder($establimentsform)
       	 	->setAction($path.'/admin/secured/establiments/update/'.$id)
       	 	->setMethod('POST')
           
            ->add('description', 'text')
           ->add('titol', 'text')
            ->add('save', 'submit')
            ->getForm();
            
            $path= $this->get('kernel')->getImagesRootDir();
        return $this->render('AcmeStoreBundle:establiments:EstablimentsForm.html.twig', array(
            'form' => $formToRenderEstabliments->createView(),'update' =>true,
            'formater' => $formToRender->createView(),'update' =>true,'attachment'=>$pathImg,
        ));	   
	}
	
	public function updateEstablimentsAction(Request $request,$id){
		$form = new EstablimentsForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_Establiments'))
       	 	->setMethod('POST')
            ->add('titol', 'text')
            ->add('description', 'text')
            ->add('save', 'submit')
            ->getForm();
            
		$form->handleRequest($request);
	
		$establiments = $this->getDoctrine()->getRepository('AcmeStoreBundle:Establiments')->find($id);
		
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	       
	        $dades =$form->getData();
	      
	        $establiments->setTitol($form['titol']->getData());
	        $establiments->setDescription($form['description']->getData());
	       
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	         $em = $this->getDoctrine()->getManager();
	   		 $em->persist($establiments);
	    	 $em->flush();
			 
	    
		 $em->persist($establiments);
	    	 $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_establiments'));
	    }
	    
	}
	
	public function deleteoAction(Request $request,$id){
	
	
		$establiments = $this->getDoctrine()->getRepository('AcmeStoreBundle:Foto')->find($id);
		
	  	 $em = $this->getDoctrine()->getManager();
	   	 $em->remove($establiments);
	   	 $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_establiments'));
	    }
            
        public function saveFotoAction(Request $request){
		$form = new FotoForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_foto'))
       	 	->setMethod('POST')
            ->add('description', 'text')
             ->add('attachment', 'file')
            ->add('save', 'submit')
            ->getForm();
            
		$form->handleRequest($request);
	
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	        $establiments = new Foto();
	        $dades =$form->getData();
	        $establiments->setDescription($form['description']->getData());    
	    	
	        $establiments->setAttachment("aaa");
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	         $em = $this->getDoctrine()->getManager();
	   		 $em->persist($establiments);
	    	 $em->flush();
	         $path= $this->get('kernel')->getImagesRootDir();
			 $file = $form['attachment']->getData()->move($path.'/downloads/foto/','gal_'.$establiments->getId().'.jpg');
			 
			  $establiments->setAttachment('gal_'.$establiments->getId().'.jpg');
                $em->persist($establiments);
	    	$em->flush();
	        
			
	        return $this->redirect($this->generateUrl('acme_pre_store_establiments'));
	    }
	    
	}
	    
	
	
}