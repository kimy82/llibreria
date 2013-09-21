<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Presentacio;
use Acme\StoreBundle\Forms\PresentacioForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;


class PresentacioController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeStoreBundle:presentacio:PresentacioMain.html.twig', array());
    }
    

	public function savePresentacioAction(Request $request){
		$form = new PresentacioForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_presentacio'))
       	 	->setMethod('POST')
            ->add('date_entrada', 'date')
            ->add('titol', 'text')
            ->add('subtitol', 'text')
            ->add('description', 'text')
            ->add('intervindran', 'text')
            ->add('lloc', 'text')
            ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
            ->add('portada',  'choice', array(
			    'choices'   => array('no' => 'NO', 'C1' => 'Col 1', 'C2' => 'Col 2','C3' => 'Col 3'),
			    'required'  => false,
			))
            ->add('data_fi','date')
            ->add('attachment', 'file')
            ->add('save', 'submit')
            ->getForm();
            
		$form->handleRequest($request);
	
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	        $presentacio = new Presentacio();
	        $dades =$form->getData();
	      	$presentacio->setDataEntrada($form['date_entrada']->getData());
	        $presentacio->setTitol($form['titol']->getData());
	        $presentacio->setSubtitol($form['subtitol']->getData());
	        $presentacio->setDescription($form['description']->getData());
	        $presentacio->setNovetat($form['novetat']->getData());
	        $presentacio->setPortada($form['portada']->getData());
	      	$presentacio->setDataFi($form['data_fi']->getData());
	      	$presentacio->setLloc($form['lloc']->getData());
	      	$presentacio->setIntervindran($form['intervindran']->getData());
	      	$presentacio->setTablePath("presentacio");     
	        $presentacio->setAttachment("aaa");
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	         $em = $this->getDoctrine()->getManager();
	   		 $em->persist($presentacio);
	    	 $em->flush();
	         $path= $this->get('kernel')->getImagesRootDir();
			 $file = $form['attachment']->getData()->move($path.'/downloads/presentacio/','pre_'.$presentacio->getId().'.jpg');
			 
			  $presentacio->setAttachment('pre_'.$presentacio->getId().'.jpg');
			  $em->persist($presentacio);
	    	  $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_presentacio'));
	    }
	    
	}
	
	public function precreateAction(Request $request)
	{	 
		$presentacioform = new PresentacioForm();			
	
	    
	    $presentacioform->setDateEntrada(new \DateTime('tomorrow'));
       	$presentacioform->setTitol("Titol");
       	$presentacioform->setSubtitol("Sub Titol");
       	$presentacioform->setDescription("descripcio");
       	$presentacioform->setNovetat(true);
       	$presentacioform->setPortada("no");
       	$presentacioform->setLloc(" Localitzacio, hora, etz");
	    $presentacioform->setIntervindran(" Qui intervindra");
       	$presentacioform->setDataFi(new \DateTime('tomorrow'));
       	
       	 $formToRender = $this->createFormBuilder($presentacioform)
       	 	->setAction($this->generateUrl('store_new_presentacio'))
       	 	->setMethod('POST')
            ->add('date_entrada', 'date')
            ->add('titol', 'text')
            ->add('subtitol', 'text')
            ->add('description', 'text')
            ->add('intervindran', 'text')
            ->add('lloc', 'text')
            ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
            ->add('portada',  'choice', array(
			    'choices'   => array('no' => 'NO', 'C1' => 'Col 1', 'C2' => 'Col 2','C3' => 'Col 3'),
			    'required'  => false,
			))
            ->add('data_fi','date')
            ->add('attachment', 'file')
            ->add('save', 'submit')
            ->getForm();
            
        return $this->render('AcmeStoreBundle:presentacio:PresentacioForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>false,
        ));	   
	}
	
		public function listAction(Request $request, $orderBy)
	{	 
		$em = $this->getDoctrine()->getManager();
		$orderBy = str_replace("..", "'%", $orderBy);
		$orderBy = str_replace(".,", "%'", $orderBy);
		$query = $em->createQuery('SELECT n from AcmeStoreBundle:presentacio n where '.$orderBy);
		
		$paginator= $this->get('knp_paginator');
		$pagination= $paginator->paginate($query,$this->get('request')->query->get('page',1),10);
		$path= $this->get('kernel')->getImagesPath('presentacio');
		$pathServer= $this->get('kernel')->getServerPath();
		
		return $this->render('AcmeStoreBundle:presentacio:PresentacioList.html.twig', array(
            'pagination' => $pagination,'path' =>  $path,'pathlocal'=>$pathServer,
        ));
	}
	
		public function editAction($id)
	{	
		
		$presentacio = $this->getDoctrine()->getRepository('AcmeStoreBundle:Presentacio')->find($id);
		$presentacioform = new PresentacioForm();			
		
		$path = $this->get('kernel')->getImagesRootDir();
		$file = new File($path.'downloads/presentacio/'.$presentacio->getAttachment(), true);
	    
	    $presentacioform->setDateEntrada($presentacio->getDataEntrada());
       	$presentacioform->setTitol($presentacio->getTitol());
       	$presentacioform->setSubtitol($presentacio->getSubtitol());
       	$presentacioform->setDescription($presentacio->getDescription());
       	$presentacioform->setNovetat($presentacio->getNovetat());
       	$presentacioform->setPortada($presentacio->getPortada());
       	$presentacioform->setDataFi($presentacio->getDataFi());
       	$presentacioform->setLloc($presentacio->getLloc());
	    $presentacioform->setIntervindran($presentacio->getIntervindran());
       	$presentacioform->setAttachment($file);
       	
       	$path = $this->get('kernel')->getServerPath();
       	 $formToRender = $this->createFormBuilder($presentacioform)
       	 	->setAction($path.'/admin/secured/presentacio/update/'.$id)
       	 	->setMethod('POST')
            ->add('date_entrada', 'date')
            ->add('titol', 'text')
            ->add('subtitol', 'text')
            ->add('description', 'text')
            ->add('intervindran', 'text')
            ->add('lloc', 'text')
            ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
            ->add('portada',  'choice', array(
			    'choices'   => array('no' => 'NO', 'C1' => 'Col 1', 'C2' => 'Col 2','C3' => 'Col 3'),
			    'required'  => false,
			))
            ->add('data_fi','date')
            ->add('attachment', 'file')
            ->add('save', 'submit')
            ->getForm();
            
        return $this->render('AcmeStoreBundle:presentacio:PresentacioForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>true,
        ));	   
	}
	
	public function updatePresentacioAction(Request $request,$id){
		$form = new PresentacioForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_presentacio'))
       	 	->setMethod('POST')
            ->add('date_entrada', 'date')
            ->add('titol', 'text')
            ->add('subtitol', 'text')
            ->add('description', 'text')
            ->add('intervindran', 'text')
            ->add('lloc', 'text')
            ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
            ->add('portada',  'choice', array(
			    'choices'   => array('no' => 'NO', 'C1' => 'Col 1', 'C2' => 'Col 2','C3' => 'Col 3'),
			    'required'  => false,
			))
            ->add('data_fi','date')
            ->add('attachment', 'file')
            ->add('save', 'submit')
            ->getForm();
            
		$form->handleRequest($request);
	
		$presentacio = $this->getDoctrine()->getRepository('AcmeStoreBundle:Presentacio')->find($id);
		
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	       
	        $dades =$form->getData();
	      
	      	$presentacio->setDataEntrada($form['date_entrada']->getData());
	        $presentacio->setTitol($form['titol']->getData());
	        $presentacio->setSubtitol($form['subtitol']->getData());
	        $presentacio->setDescription($form['description']->getData());
	        $presentacio->setNovetat($form['novetat']->getData());
	        $presentacio->setPortada($form['portada']->getData());
	      	$presentacio->setDataFi($form['data_fi']->getData());
	      	
	      	$presentacio->setLloc($form['lloc']->getData());
	      	$presentacio->setIntervindran($form['intervindran']->getData());
	       
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	         $em = $this->getDoctrine()->getManager();
	   		 $em->persist($presentacio);
	    	 $em->flush();
	         $path= $this->get('kernel')->getImagesRootDir();
	         if ($form['attachment']->getData()!=null){
			 	$file = $form['attachment']->getData()->move($path.'/downloads/presentacio/','pre_'.$presentacio->getId().'.jpg');
	         }
			 
			  $presentacio->setAttachment('pre_'.$presentacio->getId().'.jpg');
			  $em->persist($presentacio);
	    	  $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_presentacio'));
	    }
	    
	}
	
	public function deletePresentacioAction(Request $request,$id){
	
	
		$presentacio = $this->getDoctrine()->getRepository('AcmeStoreBundle:Presentacio')->find($id);
		
	  	 $em = $this->getDoctrine()->getManager();
	   	 $em->remove($presentacio);
	   	 $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_presentacio'));
	    }
	    
	
	
}