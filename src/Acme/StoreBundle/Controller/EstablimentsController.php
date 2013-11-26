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
    
    //establiments
    public function saveEstablimentsAction(Request $request){
        $form = new EstablimentsForm();
        $form = $this->createFormBuilder($form)
        ->setAction($this->generateUrl('store_new_establiments'))
        ->setMethod('POST')
        ->add('titol', 'text')
        ->add('description', 'textarea')
        ->add('Desa', 'submit')
        ->getForm();
        $form->handleRequest($request);
        $establiments = $this->getDoctrine()->getRepository('AcmeStoreBundle:Establiments')->find(1);
        
    if ($form->isValid()) {
        // perform some action, such as saving the task to the database
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
	
    public function precreateAction(Request $request){
		 
        $establimentsform = new EstablimentsForm();
        $fotoform = new FotoForm();
        $establiments = $this->getDoctrine()->getRepository('AcmeStoreBundle:establiments')->find(1);			
        $establimentsform->setDescription($establiments->getDescription());
        $establimentsform->setTitol($establiments->getTitol());
        $fotoform->setDescription("descripcio");
        //establiments
        $formToRender = $this->createFormBuilder($establimentsform)
               ->setAction($this->generateUrl('store_new_establiments'))
               ->setMethod('POST')
               ->add('titol', 'text')
               ->add('description', 'textarea')
               ->add('Guardar Establiments', 'submit')
               ->getForm();
        //foto
        $formfotoToRender = $this->createFormBuilder($fotoform)
               ->setAction($this->generateUrl('store_new_foto'))
               ->setMethod('POST')
               ->add('description', 'text')
               ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
               ->add('Desa', 'submit')
               ->getForm();    

    return $this->render('AcmeStoreBundle:establiments:EstablimentsForm.html.twig', array(
        'form' => $formToRender->createView(),'update' =>false,
        'formater' => $formfotoToRender->createView(),'attachment'=>'',
    ));	   
}
    //establiments
    public function listAction(Request $request, $orderBy){

            $em = $this->getDoctrine()->getManager();
            $orderBy = str_replace("..", "'%", $orderBy);
            $orderBy = str_replace(".,", "%'", $orderBy);
            $query = $em->createQuery('SELECT n from AcmeStoreBundle:Foto n where '.$orderBy);

            $paginator= $this->get('knp_paginator');
            $pagination= $paginator->paginate($query,$this->get('request')->query->get('page',1),10);
            $path= $this->get('kernel')->getImagesPath('foto');
            $pathServer= $this->get('kernel')->getServerPath();

            return $this->render('AcmeStoreBundle:establiments:EstablimentsList.html.twig', array(
                'pagination' => $pagination,'path' =>  $path,'pathlocal'=>$pathServer,
            ));
    }
    //foto
    public function editFotoAction($id){

            $foto = $this->getDoctrine()->getRepository('AcmeStoreBundle:Foto')->find($id);
            $fotoform = new FotoForm();	
            
            $path= $this->get('kernel')->getImagesRootDir();
            $fotoform->setDescription($foto->getDescription());
            
            if ( $foto->getAttachment()!='aaa'){
                $file = new File($path.'downloads/foto/'.$foto->getAttachment(), true);
                $fotoform->setAttachment($file);
            }
            
            $pathImg = $this->get('kernel')->getImagesPath("foto").$foto->getAttachment();
            $pathUrl = $this->get('kernel')->getServerPath();
            
            $formToRender = $this->createFormBuilder($fotoform)
                ->setAction($pathUrl.'/admin/secured/foto/update/'.$id)
                ->setMethod('POST')
                ->add('description', 'text')
                ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
                ->add('Desa', 'submit')
                ->getForm();
            
            $establiments = $this->getDoctrine()->getRepository('AcmeStoreBundle:Establiments')->find(1);
            $establimentsform = new EstablimentsForm();			
            $establimentsform->setDescription($establiments->getDescription());
            $establimentsform->setTitol($establiments->getTitol());
            
            $formToRenderEstabliments = $this->createFormBuilder($establimentsform)
                ->setAction($pathUrl.'/admin/secured/establiments/update')
                ->setMethod('POST')
                ->add('description', 'textarea')
                ->add('titol', 'text')
                ->add('Guardar Establiments', 'submit')
                ->getForm();
  
	    return $this->render('AcmeStoreBundle:establiments:EstablimentsForm.html.twig', array(
		'form' => $formToRenderEstabliments->createView(),'update' =>true,
		'formater' => $formToRender->createView(),'update' =>true,'attachment'=>$pathImg,
	    ));	   
	}
	//establiments
	public function updateEstablimentsAction(Request $request){
		$form = new EstablimentsForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('update_establiments'))
       	 	->setMethod('POST')
		->add('titol', 'text')
		->add('description', 'textarea')
		->add('Guardar Establiments', 'submit')
		->getForm();
            
		$form->handleRequest($request);
	
		$establiments = $this->getDoctrine()->getRepository('AcmeStoreBundle:Establiments')->find(1);
		
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
	
	public function updateFotoAction(Request $request, $id){
		$form = new FotoForm();
		$pathUrl = $this->get('kernel')->getServerPath();
		
		$form = $this->createFormBuilder($form)
		    ->setAction($pathUrl.'/admin/secured/foto/update/'.$id)
		    ->setMethod('POST')
		    ->add('description', 'text')
		    ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
		    ->add('Desa', 'submit')
		    ->getForm();
		
		$form->handleRequest($request);
	
		$fotoToUpdate = $this->getDoctrine()->getRepository('AcmeStoreBundle:Foto')->find($id);
		
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	       
	        $dades =$form->getData();
                $fotoToUpdate->setDescription($form['description']->getData());
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($fotoToUpdate);
                $em->flush();                
		$path= $this->get('kernel')->getImagesRootDir();
           
	         if ($form['attachment']->getData()!=null){
                     
			  $file = $form['attachment']->getData()->move($path.'/downloads/foto/','gal_'.$fotoToUpdate->getId().'.jpg');
                          $fotoToUpdate->setAttachment('gal_'. $fotoToUpdate->getId().'.jpg');
                          $em->persist($fotoToUpdate);
                          $em->flush();
                         
	         }
	        
                 
			 
	    
	        return $this->redirect($this->generateUrl('acme_pre_store_establiments'));
	    }
	    
	}
	
	public function deleteEstablimentsoAction(Request $request,$id){
	
	
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
		->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
		->add('Desa', 'submit')
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
		    if ($form['attachment']->getData()!=null){
                        $file = $form['attachment']->getData()->move($path.'/downloads/foto/','gal_'.$establiments->getId().'.jpg');
                        $establiments->setAttachment('gal_'.$establiments->getId().'.jpg');
                        $em->persist($establiments);
                        $em->flush();
		    }
    
		   
		    
			    
		    return $this->redirect($this->generateUrl('acme_pre_store_establiments'));
		}
	    
	}
	    
	
	
}
