<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Llibre;
use Acme\StoreBundle\Forms\LlibreForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;


class LlibreController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeStoreBundle:llibre:LlibreMain.html.twig', array());
    }
    

	public function saveLlibreAction(Request $request){
		$form = new LlibreForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_llibre'))
       	 	->setMethod('POST')
             ->add('date', 'date')
            ->add('name', 'text')
            ->add('autor', 'text')
            ->add('category', 'choice', array('choices' => array('llibre'=> 'Llibre', 'butxaca' =>'Butxaca', 'comic' =>'Comic', 'llibreInfaltil' =>'Llibre Infantil')))
            ->add('suggerir', 'choice', array('choices' => array('0'=> 'NO', '1' =>'SI')))
            ->add('editorial', 'text')
            ->add('descripcio', 'text')
            ->add('price','money')            
            ->add('attachment', 'file')
            ->add('save', 'submit')
            ->getForm();
            
		$form->handleRequest($request);
	
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	        $llibre = new Llibre();
	        $dades =$form->getData();
	      	$llibre->setName($form['name']->getData());
	        $llibre->setPrice($form['price']->getData());
	        $llibre->setDescription($form['descripcio']->getData());
	        $llibre->setDateEntrada($form['date']->getData());	
	        $llibre->setCategory($form['category']->getData());
	        $llibre->setAutor($form['autor']->getData());
            $llibre->setEditorial($form['editorial']->getData());           
	        $llibre->setTablePath("llibre");     
	        $llibre->setAttachment("aaa");
	        $llibre->setSuggerir($form['suggerir']->getData());
	    
	        
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	         $em = $this->getDoctrine()->getManager();
	   		 $em->persist($llibre);
	    	 $em->flush();
	         $path= $this->get('kernel')->getImagesRootDir();
			 $file = $form['attachment']->getData()->move($path.'/downloads/llibre/','llib_'.$llibre->getId().'.jpg');
			 
			  $llibre->setAttachment('llib_'.$llibre->getId().'.jpg');
			  $em->persist($llibre);
	    	  $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_llibre'));
	    }
	    
	}
	
	public function precreateAction(Request $request)
	{	 
		$llibreform = new LlibreForm();			
	
	    
	    $llibreform->setDate(new \DateTime('tomorrow'));
       	$llibreform->setName("Name");
       	$llibreform->setDescripcio("descripcio");
       	$llibreform->setPrice(0.0);
       	$llibreform->setSuggerir(0);
      
       	
       	 $formToRender = $this->createFormBuilder($llibreform)
       	 	->setAction($this->generateUrl('store_new_llibre'))
       	 	->setMethod('POST')
            ->add('date', 'date')
            ->add('name', 'text')
            ->add('descripcio', 'text')
            ->add('autor', 'text')
            ->add('category', 'choice', array('choices' => array('llibre'=> 'Llibre', 'butxaca' =>'Butxaca', 'comic' =>'Comic', 'llibreInfaltil' =>'Llibre Infantil')))
            ->add('suggerir', 'choice', array('choices' => array(0=> 'NO', 1 =>'SI')))
            ->add('editorial', 'text')
            ->add('price','money')
            ->add('attachment', 'file')
            ->add('save', 'submit')
            ->getForm();
            
        return $this->render('AcmeStoreBundle:llibre:LlibreForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>false,'body'=>'adminllibre'
        ));	   
	}
	
		public function listAction(Request $request, $orderBy)
	{	 
		$em = $this->getDoctrine()->getManager();
		
		$orderBy = str_replace("..", "'%", $orderBy);
		$orderBy = str_replace(".,", "%'", $orderBy); 
		
		$query = $em->createQuery('SELECT n from AcmeStoreBundle:Llibre n where '.$orderBy);
		
		
		
		$paginator= $this->get('knp_paginator');
		$pagination= $paginator->paginate($query,$this->get('request')->query->get('page',1),10);
		$path= $this->get('kernel')->getImagesPath('llibre');
		$pathServer= $this->get('kernel')->getServerPath();
		return $this->render('AcmeStoreBundle:llibre:LlibreList.html.twig', array(
            'pagination' => $pagination,'path' =>  $path,'pathlocal'=>$pathServer,'body'=>'adminllibre'
        ));
	}
	
		public function editAction($id)
	{	
		
		$llibre = $this->getDoctrine()->getRepository('AcmeStoreBundle:Llibre')->find($id);
		$llibreform = new LlibreForm();			
		
		$path = $this->get('kernel')->getImagesRootDir();
		$file = new File($path.'downloads/llibre/'.$llibre->getAttachment(), true);
	    
	    $llibreform->setDate($llibre->getDateEntrada());
       	$llibreform->setName($llibre->getName());
       	$llibreform->setDescripcio($llibre->getDescription());
       	$llibreform->setPrice($llibre->getPrice());
       	$llibreform->setAttachment($file);
       	$llibreform->setAutor($llibre->getAutor());
       	$llibreform->setCategory($llibre->getCategory());
       	$llibreform->setEditorial($llibre->getEditorial());
       	$llibreform->setSuggerir($llibre->getSuggerir());
       	
       	$path = $this->get('kernel')->getServerPath();
       	 $formToRender = $this->createFormBuilder($llibreform)
       	 	->setAction($path.'/admin/secured/llibre/update/'.$id)
       	 	->setMethod('POST')
            ->add('date', 'date')
            ->add('name', 'text')
            ->add('descripcio', 'text')
            ->add('autor', 'text')
            ->add('category', 'choice', array('choices' => array('llibre'=> 'Llibre', 'butxaca' =>'Butxaca', 'comic' =>'Comic', 'llibreInfaltil' =>'Llibre Infantil')))
            ->add('suggerir', 'choice', array('choices' => array(0=> 'NO', 1 =>'SI')))
            ->add('editorial', 'text')
            ->add('price','money')
            ->add('attachment', 'file')
            ->add('save', 'submit')
            ->getForm();
            
        return $this->render('AcmeStoreBundle:llibre:LlibreForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>true,'body'=>'adminllibre'
        ));	   
	}
	
	public function updateLlibreAction(Request $request,$id){
		$form = new LlibreForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_llibre'))
       	 	->setMethod('POST')
            ->add('date', 'date')
            ->add('name', 'text')
            ->add('descripcio', 'text')
            ->add('autor', 'text')
            ->add('category', 'choice', array('choices' => array('llibre'=> 'Llibre', 'butxaca' =>'Butxaca', 'comic' =>'Comic', 'llibreInfaltil' =>'Llibre Infantil')))
            ->add('suggerir', 'choice', array('choices' => array(0=> 'NO', 1 =>'SI')))
            ->add('editorial', 'text')
            ->add('price','money')
            ->add('attachment', 'file')
            ->add('save', 'submit')
            ->getForm();
            
		$form->handleRequest($request);
	
		$llibre = $this->getDoctrine()->getRepository('AcmeStoreBundle:Llibre')->find($id);
		
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	       
	        $dades =$form->getData();
	      
	      	$llibre->setDateEntrada($form['date']->getData());
	        $llibre->setName($form['name']->getData());
	        $llibre->setPrice($form['price']->getData());
	        $llibre->setDescription($form['descripcio']->getData());
	        $llibre->setAutor($form['autor']->getData());
	        $llibre->setEditorial($form['editorial']->getData());
	        $llibre->setCategory($form['category']->getData());
	        $llibre->setSuggerir($form['suggerir']->getData());
	        
	       
	       
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	         $em = $this->getDoctrine()->getManager();
	   		 $em->persist($llibre);
	    	 $em->flush();
	         $path= $this->get('kernel')->getImagesRootDir();
	         if ($form['attachment']->getData()!=null){
			 	$file = $form['attachment']->getData()->move($path.'/downloads/llibre/','llib_'.$llibre->getId().'.jpg');
	         }
			 
			  $llibre->setAttachment('llib_'.$llibre->getId().'.jpg');
			  $em->persist($llibre);
	    	  $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_llibre'));
	    }
	    
	}
	
	public function deleteLlibreAction(Request $request,$id){
	
	
		$llibre = $this->getDoctrine()->getRepository('AcmeStoreBundle:Llibre')->find($id);
		
	  	 $em = $this->getDoctrine()->getManager();
	   	 $em->remove($llibre);
	   	 $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_llibre'));
	    }
	    
	
	
}
