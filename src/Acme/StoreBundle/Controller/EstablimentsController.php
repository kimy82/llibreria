<?php
namespace Acme\StoreBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\establiments;
use Acme\StoreBundle\Entity\Foto;
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
   
    public function editAction(){

       
            $id=1;
            $establiments = $this->getDoctrine()->getRepository('AcmeStoreBundle:establiments')->find(1);
	    $establimentsform = new EstablimentsForm();			
	    $establimentsform->setTitol($establiments->getTitol());
	    $establimentsform->setDescription($establiments->getDescription());
	    $pathUrl = $this->get('kernel')->getServerPath();
            
            $formToRenderEstabliments = $this->createFormBuilder($establimentsform)
                ->setAction($pathUrl.'/admin/secured/establiments/update')
                ->setMethod('POST')
                ->add('description', 'textarea')
                ->add('titol', 'text')
                ->add('Guardar Establiments', 'submit')
                ->getForm();
            //add pdf 
            $em = $this->getDoctrine()->getManager();
            $querypdf = $em->createQuery('SELECT n from AcmeStoreBundle:Addpdf n order by n.id DESC');
	    $paginatorpdf= $this->get('knp_paginator');
	    $paginationpdf= $paginatorpdf->paginate($querypdf,$this->get('request')->query->get('page',1),10);
	    $pathpdf= $this->get('kernel')->getImagesPath('addpdf');
  
	    return $this->render('AcmeStoreBundle:establiments:EstablimentsForm.html.twig', array(
		'form' => $formToRenderEstabliments->createView(),'update' =>true, 'pathpdf' =>  $pathpdf,'paginationpdf' => $paginationpdf,'update' =>true,
		
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
	
		$establiments = $this->getDoctrine()->getRepository('AcmeStoreBundle:establiments')->find(1);
		
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
			
	        return $this->redirect($this->generateUrl('acme_store_homepage'));
	    }
	    
	}

}