<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Suggerencia;
use Acme\StoreBundle\Forms\SuggerenciaForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;


class SuggerenciaController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeStoreBundle:suggerencia:SuggerenciaMain.html.twig', array());
    }
    

	public function saveSuggerenciaAction(Request $request){
		$form = new SuggerenciaForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_suggerencia'))
       	 	->setMethod('POST')
             ->add('date', 'date')
            ->add('name', 'text')
            ->add('autor', 'text')
            ->add('category', 'choice', array('choices' => array('suggerencia'=> 'Llibres', 'butxaca' =>'Butxaca', 'comic' =>'Comic', 'suggerenciaInfaltil' =>'Suggerencia Infantil')))
            ->add('suggerir', 'choice', array('choices' => array('0'=> 'NO', '1' =>'SI')))
            ->add('editorial', 'text')
            ->add('descripcio', 'text')
            ->add('price','money')            
            ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
            ->add('save', 'submit')
            ->getForm();
            
		$form->handleRequest($request);
	
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	        $suggerencia = new Suggerencia();
	        $dades =$form->getData();
	      	$suggerencia->setName($form['name']->getData());
	        $suggerencia->setPrice($form['price']->getData());
	        $suggerencia->setDescription($form['descripcio']->getData());
	        $suggerencia->setDateEntrada($form['date']->getData());	
	        $suggerencia->setCategory($form['category']->getData());
	        $suggerencia->setAutor($form['autor']->getData());
            $suggerencia->setEditorial($form['editorial']->getData());           
	        $suggerencia->setTablePath("suggerencia");     
	        $suggerencia->setAttachment("aaa");
	        $suggerencia->setSuggerir($form['suggerir']->getData());
	    
	        
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	         $em = $this->getDoctrine()->getManager();
	   		 $em->persist($suggerencia);
	    	 $em->flush();
	         $path= $this->get('kernel')->getImagesRootDir();
		 if ($form['attachment']->getData()!=null){
		    
		    $file = $form['attachment']->getData()->move($path.'/downloads/suggerencia/','sug_'.$suggerencia->getId().'.jpg');
		    $suggerencia->setAttachment('sug_'.$suggerencia->getId().'.jpg');
	    	 }
	    
			  $em->persist($suggerencia);
	    	  $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_suggerencia'));
	    }
	    
	}
	
	public function precreateAction(Request $request)
	{	 
		$suggerenciaform = new SuggerenciaForm();			
	
	    
	    $suggerenciaform->setDate(new \DateTime('tomorrow'));
       	$suggerenciaform->setName("Name");
       	$suggerenciaform->setDescripcio("descripcio");
       	$suggerenciaform->setPrice(0.0);
       	$suggerenciaform->setSuggerir(0);
      
       	
       	 $formToRender = $this->createFormBuilder($suggerenciaform)
       	 	->setAction($this->generateUrl('store_new_suggerencia'))
       	 	->setMethod('POST')
            ->add('date', 'date')
            ->add('name', 'text')
            ->add('descripcio', 'text')
            ->add('autor', 'text')
            ->add('category', 'choice', array('choices' => array('suggerencia'=> 'Llibres', 'butxaca' =>'Butxaca', 'comic' =>'Comic', 'suggerenciaInfaltil' =>'Suggerencia Infantil')))
            ->add('suggerir', 'choice', array('choices' => array(0=> 'NO', 1 =>'SI')))
            ->add('editorial', 'text')
            ->add('price','money')
            ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
            ->add('save', 'submit')
            ->getForm();
            
        return $this->render('AcmeStoreBundle:suggerencia:SuggerenciaForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>false,'body'=>'adminsuggerencia'
        ));	   
	}
	
		public function listAction(Request $request, $orderBy)
	{	 
		$em = $this->getDoctrine()->getManager();
		
		$orderBy = str_replace("..", "'%", $orderBy);
		$orderBy = str_replace(".,", "%'", $orderBy); 
		
		$query = $em->createQuery('SELECT n from AcmeStoreBundle:Suggerencia n where '.$orderBy);
		
		
		
		$paginator= $this->get('knp_paginator');
		$pagination= $paginator->paginate($query,$this->get('request')->query->get('page',1),10);
		$path= $this->get('kernel')->getImagesPath('suggerencia');
		$pathServer= $this->get('kernel')->getServerPath();
		return $this->render('AcmeStoreBundle:suggerencia:SuggerenciaList.html.twig', array(
            'pagination' => $pagination,'path' =>  $path,'pathlocal'=>$pathServer,'body'=>'adminsuggerencia'
        ));
	}
	
		public function editSugAction($id)
	{	
		
		$suggerencia = $this->getDoctrine()->getRepository('AcmeStoreBundle:Suggerencia')->find($id);
		$suggerenciaform = new SuggerenciaForm();			
		
		$path = $this->get('kernel')->getImagesRootDir();
		if ( $suggerencia->getAttachment()!='aaa'){
		    $file = new File($path.'downloads/suggerencia/'.$suggerencia->getAttachment(), true);
		    $suggerenciaform->setAttachment($file);
		}
		
		
	    
	    $suggerenciaform->setDate($suggerencia->getDateEntrada());
       	$suggerenciaform->setName($suggerencia->getName());
       	$suggerenciaform->setDescripcio($suggerencia->getDescription());
       	$suggerenciaform->setPrice($suggerencia->getPrice());
       	
       	$suggerenciaform->setAutor($suggerencia->getAutor());
       	$suggerenciaform->setCategory($suggerencia->getCategory());
       	$suggerenciaform->setEditorial($suggerencia->getEditorial());
       	$suggerenciaform->setSuggerir($suggerencia->getSuggerir());
       	
       	$path = $this->get('kernel')->getServerPath();
       	 $formToRender = $this->createFormBuilder($suggerenciaform)
       	 	->setAction($path.'/admin/secured/suggerencia/update/'.$id)
       	 	->setMethod('POST')
            ->add('date', 'date')
            ->add('name', 'text')
            ->add('descripcio', 'text')
            ->add('autor', 'text')
            ->add('category', 'choice', array('choices' => array('suggerencia'=> 'Llibres', 'butxaca' =>'Butxaca', 'comic' =>'Comic', 'suggerenciaInfaltil' =>'Suggerencia Infantil')))
            ->add('suggerir', 'choice', array('choices' => array(0=> 'NO', 1 =>'SI')))
            ->add('editorial', 'text')
            ->add('price','money')
            ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
            ->add('save', 'submit')
            ->getForm();
            
        return $this->render('AcmeStoreBundle:suggerencia:SuggerenciaForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>true,'body'=>'adminsuggerencia'
        ));	   
	}
	
	public function updateSuggerenciaAction(Request $request,$id){
		$form = new SuggerenciaForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_suggerencia'))
       	 	->setMethod('POST')
            ->add('date', 'date')
            ->add('name', 'text')
            ->add('descripcio', 'text')
            ->add('autor', 'text')
            ->add('category', 'choice', array('choices' => array('suggerencia'=> 'Llibres', 'butxaca' =>'Butxaca', 'comic' =>'Comic', 'suggerenciaInfaltil' =>'Suggerencia Infantil')))
            ->add('suggerir', 'choice', array('choices' => array(0=> 'NO', 1 =>'SI')))
            ->add('editorial', 'text')
            ->add('price','money')
            ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
            ->add('save', 'submit')
            ->getForm();
            
		$form->handleRequest($request);
	
		$suggerencia = $this->getDoctrine()->getRepository('AcmeStoreBundle:Suggerencia')->find($id);
		
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	       
	        $dades =$form->getData();
	      
	      	$suggerencia->setDateEntrada($form['date']->getData());
	        $suggerencia->setName($form['name']->getData());
	        $suggerencia->setPrice($form['price']->getData());
	        $suggerencia->setDescription($form['descripcio']->getData());
	        $suggerencia->setAutor($form['autor']->getData());
	        $suggerencia->setEditorial($form['editorial']->getData());
	        $suggerencia->setCategory($form['category']->getData());
	        $suggerencia->setSuggerir($form['suggerir']->getData());
	        
	       
	       
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	         $em = $this->getDoctrine()->getManager();
	   		 $em->persist($suggerencia);
	    	 $em->flush();
	         $path= $this->get('kernel')->getImagesRootDir();
	         if ($form['attachment']->getData()!=null){
			 	$file = $form['attachment']->getData()->move($path.'/downloads/suggerencia/','sug_'.$suggerencia->getId().'.jpg');
	         }
			 
			  $suggerencia->setAttachment('sug_'.$suggerencia->getId().'.jpg');
			  $em->persist($suggerencia);
	    	  $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_suggerencia'));
	    }
	    
	}
	
	public function deleteSuggerenciaAction(Request $request,$id){
	
	
		$suggerencia = $this->getDoctrine()->getRepository('AcmeStoreBundle:Suggerencia')->find($id);
		
	  	 $em = $this->getDoctrine()->getManager();
	   	 $em->remove($suggerencia);
	   	 $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_suggerencia'));
	    }
	    
	
	
}
