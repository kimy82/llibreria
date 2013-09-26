<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Llibre;
use Acme\StoreBundle\Forms\LlibreForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;


class EncarrecsController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
		
		
		$query = $em->createQuery('SELECT n from AcmeStoreBundle:Encarrecs n where 1=1 order by n.id DESC');
		
		
		
		$paginator= $this->get('knp_paginator');
		$pagination= $paginator->paginate($query,$this->get('request')->query->get('page',1),10);
		$path= $this->get('kernel')->getImagesPath('llibre');
		$pathServer= $this->get('kernel')->getServerPath();
		
		return $this->render('AcmeStoreBundle:encarrecs:EncarrecsList.html.twig', array(
            'pagination' => $pagination,'path' =>  $path,'pathlocal'=>$pathServer,'body'=>'adminEncarrecs'
        ));
        
    }
    

	
	
	
		
	
	public function deleteAction(Request $request,$id){
	
	
		$encarrec = $this->getDoctrine()->getRepository('AcmeStoreBundle:Encarrecs')->find($id);
		
	  	 $em = $this->getDoctrine()->getManager();
	   	 $em->remove($encarrec);
	   	 $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_encarrecs'));
	    }
	    
	public function enviaAction(Request $request,$id){
	
	
		$encarrec = $this->getDoctrine()->getRepository('AcmeStoreBundle:Encarrecs')->find($id);
		
		$encarrec->setEnviat(1);
	  	 $em = $this->getDoctrine()->getManager();
	  	 $em->persist($encarrec);
	   	 $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_encarrecs'));
	    }
}
