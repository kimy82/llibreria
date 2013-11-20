<?php

namespace Acme\StoreBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Addpdf;
use Acme\StoreBundle\Forms\AddpdfForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;


class AddpdfController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeStoreBundle:Addpdf:AddpdfMain.html.twig', array());
    }
    

	public function saveAddpdfAction(Request $request){
            $form = new AddpdfForm();
            $form = $this->createFormBuilder($form)
                        
            ->setAction($this->generateUrl('store_new_addpdf'))
            ->setMethod('POST')
            ->add('attachment', 'file')
            ->add('name', 'text')
            ->add('Desa', 'submit')
            ->getForm();
            
            $form->handleRequest($request);
	
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	        $addpdf = new Addpdf();
	        $dades = $form->getData();
	        $addpdf->setAttachment("aaa");
                $addpdf->setName($form['name']->getData());
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	        $em = $this->getDoctrine()->getManager();
	   	$em->persist($addpdf);
	    	$em->flush();
	        $path= $this->get('kernel')->getImagesRootDir();
                
               
           
		$file = $form['attachment']->getData()->move($path.'/downloads/addpdf/','addpdf_'.$addpdf->getId().'.'.$form['attachment']->getData()->getClientOriginalExtension());
			 
		$addpdf->setAttachment('addpdf_'.$addpdf->getId().'.'.$form['attachment']->getData()->getClientOriginalExtension());
                $em->persist($addpdf);
	    	$em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_addpdf'));
	    }
	    
	}
	
	public function precreateAction(Request $request)
	{	 
		$addpdfform = new addpdfForm();			
                $formToRender = $this->createFormBuilder($addpdfform)
                ->setAction($this->generateUrl('store_new_addpdf'))
                ->setMethod('POST')
                ->add('attachment', 'file')
                ->add('name', 'text')
                ->add('Desa', 'submit')
                ->getForm();
            
        return $this->render('AcmeStoreBundle:addpdf:AddpdfForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>false,
        ));	   
	}
	
		public function listAction(Request $request, $orderBy)
	{	 
		$em = $this->getDoctrine()->getManager();
		$orderBy = str_replace("..", "'%", $orderBy);
		$orderBy = str_replace(".,", "%'", $orderBy);
		$query = $em->createQuery('SELECT n from AcmeStoreBundle:addpdf n where '.$orderBy);
		
		$paginator= $this->get('knp_paginator');
		$pagination= $paginator->paginate($query,$this->get('request')->query->get('page',1),10);
		$path= $this->get('kernel')->getImagesPath('addpdf');
		$pathServer= $this->get('kernel')->getServerPath();
		
		return $this->render('AcmeStoreBundle:addpdf:AddpdfList.html.twig', array(
            'pagination' => $pagination,'path' =>  $path,'pathlocal'=>$pathServer,
        ));
                
	}
	
		public function editAction($id)
	{	
		
		$addpdf = $this->getDoctrine()->getRepository('AcmeStoreBundle:Addpdf')->find($id);
		$addpdfform = new AddpdfForm();			
		$path = $this->get('kernel')->getImagesRootDir();
		$file = new File($path.'downloads/addpdf/'.$addpdf->getAttachment(), true);
                $addpdfform->setAttachment($file);

                $path = $this->get('kernel')->getServerPath();
                $formToRender = $this->createFormBuilder($addpdfform)
                    ->setAction($path.'/admin/secured/addpdf/update/'.$id)
                    ->setMethod('POST')
                    ->add('attachment', 'file')
                    ->add('name', 'text')
                    ->add('Desa', 'submit')
                    ->getForm();
            
        return $this->render('AcmeStoreBundle:addpdf:AddpdfForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>true,
        ));	   
	}
	
	public function updateAddpdfAction(Request $request,$id){
		$form = new AddpdfForm();
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_addpdf'))
       	 	->setMethod('POST')
                ->add('attachment', 'file')
                ->add('name', 'text')
                ->add('Desa', 'submit')
                ->getForm();
            
		$form->handleRequest($request);
	
		$addpdf = $this->getDoctrine()->getRepository('AcmeStoreBundle:Addpdf')->find($id);
		
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	       
	        $dades =$form->getData();
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	         $em = $this->getDoctrine()->getManager();
                 $em->persist($addpdf);
	    	 $em->flush();
                 $addpdf->setName($form['name']->getData());
	         $path= $this->get('kernel')->getImagesRootDir();
	         $file = $form['attachment']->getData()->move($path.'/downloads/addpdf/','addpdf_'.$addpdf->getId().'.'.$form['attachment']->getData()->getClientOriginalExtension());
	         $addpdf->setAttachment('pdf_'.$addpdf->getId().'.'.$form['attachment']->getData()->getClientOriginalExtension());
                 $em->persist($addpdf);
	    	 $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_addpdf'));
	    }
	    
	}
	
	public function deleteAddpdfAction(Request $request,$id){
	
	
		 $addpdf = $this->getDoctrine()->getRepository('AcmeStoreBundle:Addpdf')->find($id);
		
	  	 $em = $this->getDoctrine()->getManager();
	   	 $em->remove($addpdf);
	   	 $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_addpdf'));
	    }
	    
	
	
}