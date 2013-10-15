<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Slider;
use Acme\StoreBundle\Forms\SliderForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;


class SliderController extends Controller
{
	
	  public function indexAction()
    {
        return $this->render('AcmeStoreBundle:slider:SliderMain.html.twig', array());
    }
    

	public function saveSliderAction(Request $request){
		$form = new SliderForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_slider'))
       	 	->setMethod('POST')
            ->add('attachment', 'file')
            ->add('description', 'text')
            ->add('descriptioner', 'text', array('label' => 'form.descriptioner','required' => false))
            ->add('save', 'submit')
            ->getForm();
            
		$form->handleRequest($request);
	
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	        $slider = new Slider();	      
	      	
	        $slider->setDescription($form['description']->getData());
		$slider->setDescriptioner($form['descriptioner']->getData());
	        $slider->setAttachment("aaa");
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	         $em = $this->getDoctrine()->getManager();
	   		 $em->persist($slider);
	    	 $em->flush();
	         $path= $this->get('kernel')->getImagesRootDir();
			 $file = $form['attachment']->getData()->move($path.'/downloads/slider/','sld_'.$slider->getId().'.jpg');
			 
			  $slider->setAttachment('sld_'.$slider->getId().'.jpg');
			  $em->persist($slider);
	    	  $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_slider'));
	    }
	    
	}
	
	public function precreateAction(Request $request)
	{	 
		$sliderform = new SliderForm();			
	
	    
       	
       	 $formToRender = $this->createFormBuilder($sliderform)
       	 	->setAction($this->generateUrl('store_new_slider'))
       	 	->setMethod('POST')           
            ->add('attachment', 'file')
            ->add('description', 'text')
	    ->add('descriptioner', 'text', array('label' => 'form.descriptioner','required' => false))
            ->add('save', 'submit')
            ->getForm();
            
        return $this->render('AcmeStoreBundle:slider:SliderForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>false,
        ));	   
	}
	
		public function listAction(Request $request, $orderBy)
	{	 
		$em = $this->getDoctrine()->getManager();
		$orderBy = str_replace("..", "'%", $orderBy);
		$orderBy = str_replace(".,", "%'", $orderBy);
		$query = $em->createQuery('SELECT n from AcmeStoreBundle:slider n where '.$orderBy);
		
		$paginator= $this->get('knp_paginator');
		$pagination= $paginator->paginate($query,$this->get('request')->query->get('page',1),10);
		$path= $this->get('kernel')->getImagesPath('slider');
		$pathServer= $this->get('kernel')->getServerPath();
		
		return $this->render('AcmeStoreBundle:slider:SliderList.html.twig', array(
            'pagination' => $pagination,'path' =>  $path,'pathlocal'=>$pathServer,
        ));
	}
	
		public function editAction($id)
	{	
		
		$slider = $this->getDoctrine()->getRepository('AcmeStoreBundle:Slider')->find($id);
		$sliderform = new SliderForm();			
		
		$path = $this->get('kernel')->getImagesRootDir();
		$file = new File($path.'downloads/slider/'.$slider->getAttachment(), true);
	    
	    $sliderform->setDescription($slider->getDescription());
	    $sliderform->setDescriptioner($slider->getDescriptioner());
       	$sliderform->setAttachment($file);
       	
       	$path = $this->get('kernel')->getServerPath();
       	 $formToRender = $this->createFormBuilder($sliderform)
       	 	->setAction($path.'/admin/secured/slider/update/'.$id)
       	 	->setMethod('POST')           
            ->add('attachment', 'file')
            ->add('description', 'text')
	      ->add('descriptioner', 'text', array('label' => 'form.descriptioner','required' => false))
            ->add('save', 'submit')
            ->getForm();
            
        return $this->render('AcmeStoreBundle:slider:SliderForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>true,
        ));	   
	}
	
	public function updateSliderAction(Request $request,$id){
		$form = new SliderForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_slider'))
       	 	->setMethod('POST')           
            ->add('attachment', 'file')
            ->add('description', 'text')
	      ->add('descriptioner', 'text', array('label' => 'form.descriptioner','required' => false))
            ->add('save', 'submit')
            ->getForm();
            
		$form->handleRequest($request);
	
		$slider = $this->getDoctrine()->getRepository('AcmeStoreBundle:Slider')->find($id);
		
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	       
	        $dades =$form->getData();
	      	      
	        $slider->setDescription($form['description']->getData());
		 $slider->setDescriptioner($form['descriptioner']->getData());
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	         $em = $this->getDoctrine()->getManager();
	   		 $em->persist($slider);
	    	 $em->flush();
	         $path= $this->get('kernel')->getImagesRootDir();
	         if ($form['attachment']->getData()!=null){
			 	$file = $form['attachment']->getData()->move($path.'/downloads/slider/','sld_'.$slider->getId().'.jpg');
	         }
			 
			  $slider->setAttachment('sld_'.$slider->getId().'.jpg');
			  $em->persist($slider);
	    	  $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_slider'));
	    }
	    
	}
	
	public function deleteSliderAction(Request $request,$id){
	
	
		$slider = $this->getDoctrine()->getRepository('AcmeStoreBundle:Slider')->find($id);
		
	  	 $em = $this->getDoctrine()->getManager();
	   	 $em->remove($slider);
	   	 $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_slider'));
	    }	    							    	
		
}
