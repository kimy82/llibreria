<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Afegir;
use Acme\StoreBundle\Forms\AfegirForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;


class AfegirController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeStoreBundle:afegir:AfegirMain.html.twig', array());
    }
    

	public function saveAfegirAction(Request $request){
	    $form = new AfegirForm();
		
	    $form = $this->createFormBuilder($form)
       	    ->setAction($this->generateUrl('store_new_afegir'))
       	    ->setMethod('POST')
            ->add('date', 'date')
            ->add('name', 'text')
            ->add('descripcio', 'text')
            ->add('link', 'text')
	    ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
            ->add('Desa', 'submit')
            ->getForm();
	    $form->handleRequest($request);
	
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	        $afegir = new Afegir();
	        $dades =$form->getData();
	      	$afegir->setName($form['name']->getData());
	        $afegir->setDescription($form['descripcio']->getData());
                $afegir->setLink($form['link']->getData());
	        $afegir->setDateEntrada($form['date']->getData());	              
	        $afegir->setAttachment("aaa");
	    
	        
		
		
		
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	        $em = $this->getDoctrine()->getManager();
	   	$em->persist($afegir);
	    	$em->flush();
	        $path= $this->get('kernel')->getImagesRootDir();
		if ($form['attachment']->getData()!=null){
		
		$file = $form['attachment']->getData()->move($path.'/downloads/afegir/','sug_'.$afegir->getId().'.jpg');
		$afegir->setAttachment('sug_'.$afegir->getId().'.jpg');
		}
		$em->persist($afegir);
	    	$em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_afegir'));
	    }
	   
	    
	}
	
	public function precreateAction(Request $request)
	{	 
		$afegirform = new AfegirForm();			
		$afegirform->setDate(new \DateTime('tomorrow'));
		$afegirform->setName("");
	    	$afegirform->setDescripcio("");
                $afegirform->setLink("");
		$formToRender = $this->createFormBuilder($afegirform)
       	 	->setAction($this->generateUrl('store_new_afegir'))
       	 	->setMethod('POST')
		->add('date', 'date')
                ->add('name', 'text', array('label' => 'form.name','required' => false))
                ->add('descripcio', 'text', array('label' => 'form.descripcio','required' => false))
                ->add('link', 'text')
		->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
		->add('Desa', 'submit')
		->getForm();
            
		return $this->render('AcmeStoreBundle:afegir:AfegirForm.html.twig', array(
		'form' => $formToRender->createView(),'update' =>false,'body'=>'adminafegir'
        ));	   
	}
	
		public function listAction(Request $request, $orderBy)
	{	 
		$em = $this->getDoctrine()->getManager();
		
		$orderBy = str_replace("..", "'%", $orderBy);
		$orderBy = str_replace(".,", "%'", $orderBy); 
		
		$query = $em->createQuery('SELECT n from AcmeStoreBundle:Afegir n where '.$orderBy);
		
		
		
		$paginator= $this->get('knp_paginator');
		$pagination= $paginator->paginate($query,$this->get('request')->query->get('page',1),10);
		$path= $this->get('kernel')->getImagesPath('afegir');
		$pathServer= $this->get('kernel')->getServerPath();
		return $this->render('AcmeStoreBundle:afegir:AfegirList.html.twig', array(
		'pagination' => $pagination,'path' =>  $path,'pathlocal'=>$pathServer,'body'=>'adminafegir'
        ));
	}
	
		public function editAction($id)
	{	
		
		$afegir = $this->getDoctrine()->getRepository('AcmeStoreBundle:Afegir')->find($id);
		$afegirform = new AfegirForm();
		
		
		$afegirform->setName($afegir->getName());
		$afegirform->setDate($afegir->getDateEntrada());
		$afegirform->setDescripcio($afegir->getDescription());
                $afegirform->setLink($afegir->getLink());
		$path = $this->get('kernel')->getImagesRootDir();
		
		if ( $afegir->getAttachment()!='aaa'){
		    $file = new File($path.'downloads/afegir/'.$afegir->getAttachment(), true);
		    $afegirform->setAttachment($file);
		}
	    
		
		

       	
		$path = $this->get('kernel')->getServerPath();
		$formToRender = $this->createFormBuilder($afegirform)
       	 	->setAction($path.'/admin/secured/afegir/update/'.$id)
       	 	->setMethod('POST')
		->add('date', 'date')
		->add('name', 'text')
		->add('descripcio', 'text')
                ->add('link', 'text')
		->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
		->add('Desa', 'submit')
		->getForm();
            
		return $this->render('AcmeStoreBundle:afegir:AfegirForm.html.twig', array(
		    'form' => $formToRender->createView(),'update' =>true,'body'=>'adminafegir'
        ));	   
	}
	
	public function updateAfegirAction(Request $request,$id){
		$form = new AfegirForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_afegir'))
       	 	->setMethod('POST')
		->add('date', 'date')
		->add('name', 'text')
		->add('descripcio', 'text')
                ->add('link', 'text')
		->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
		->add('Desa', 'submit')
		->getForm();
            
		$form->handleRequest($request);
	
		$afegir = $this->getDoctrine()->getRepository('AcmeStoreBundle:Afegir')->find($id);
		
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	       
	        $dades =$form->getData();
	      
	      	$afegir->setDateEntrada($form['date']->getData());
	        $afegir->setName($form['name']->getData());
	        $afegir->setDescription($form['descripcio']->getData());
	        
	       
	       
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	         $em = $this->getDoctrine()->getManager();
	   		 $em->persist($afegir);
	    	 $em->flush();
	         $path= $this->get('kernel')->getImagesRootDir();
	         if ($form['attachment']->getData()!=null){
			 $file = $form['attachment']->getData()->move($path.'/downloads/afegir/','sug_'.$afegir->getId().'.jpg');
                         $afegir->setAttachment('sug_'.$afegir->getId().'.jpg');
			 $em->persist($afegir);
                         $em->flush();
	         }
			 
			  
			
	        return $this->redirect($this->generateUrl('acme_pre_store_afegir'));
	    }
	    
	}
	
	public function deleteAfegirAction(Request $request,$id){
	
	
		$afegir = $this->getDoctrine()->getRepository('AcmeStoreBundle:Afegir')->find($id);
		$em = $this->getDoctrine()->getManager();
	   	$em->remove($afegir);
	   	$em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_afegir'));
	    }
	    
	
	
}
