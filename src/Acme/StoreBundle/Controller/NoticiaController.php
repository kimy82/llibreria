<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Noticia;
use Acme\StoreBundle\Forms\NoticiaForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;


class NoticiaController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeStoreBundle:noticia:NoticiaMain.html.twig', array());
    }
    

	public function saveNoticiaAction(Request $request){
	    $form = new NoticiaForm();
	    $form = $this->createFormBuilder($form)
       	    ->setAction($this->generateUrl('store_new_noticia'))
       	    ->setMethod('POST')
            ->add('date_entrada', 'date')
            ->add('titol', 'text', array('label' => 'form.titol','required' => false))
            ->add('subtitol', 'text')
            ->add('description', 'textarea')
            ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
            ->add('portada',  'choice', array(
			    'choices'   => array('no' => 'NO', 'C1' => 'Col 1', 'C2' => 'Col 2','C3' => 'Col 3'),
			    'required'  => false,
			))
            ->add('data_fi','date')
            ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
            ->add('save', 'submit')
            ->getForm();
            
	    $form->handleRequest($request);
	
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	    $noticia = new Noticia();
	    $dades =$form->getData();
	    $noticia->setDataEntrada($form['date_entrada']->getData());
	    $noticia->setTitol($form['titol']->getData());
	    $noticia->setSubtitol($form['subtitol']->getData());
	    $noticia->setDescription($form['description']->getData());
	    $noticia->setNovetat($form['novetat']->getData());
	    $noticia->setPortada($form['portada']->getData());
	    $noticia->setDataFi($form['data_fi']->getData());
	    $noticia->setTablePath("noticia");
	    $noticia->setAttachment("aaa");
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	    $em = $this->getDoctrine()->getManager();
	    $em->persist($noticia);
	    $em->flush();
	    $prova = $form['attachment']->getData();
	    $path= $this->get('kernel')->getImagesRootDir();
	    if ($form['attachment']->getData()!=null){
		echo print_r($prova);
		
		$file = $form['attachment']->getData()->move($path.'/downloads/noticia/','not_'.$noticia->getId().'.jpg');
		$noticia->setAttachment('not_'.$noticia->getId().'.jpg');
	    }
		
		$em->persist($noticia);
	    	$em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_noticia'));
	    }
	    
	}
	
	public function precreateAction(Request $request){	 
	
	    $noticiaform = new NoticiaForm();			
	    $noticiaform->setDateEntrada(new \DateTime('tomorrow'));
	    $noticiaform->setTitol("");
	    $noticiaform->setSubtitol("Sub Titol");
	    $noticiaform->setDescription("descripcio");
	    $noticiaform->setNovetat(true);
	    $noticiaform->setPortada("no");
	    $noticiaform->setDataFi(new \DateTime('tomorrow'));
	    
	    $formToRender = $this->createFormBuilder($noticiaform)
	    ->setAction($this->generateUrl('store_new_noticia'))
	    ->setMethod('POST')
	    ->add('date_entrada', 'date')
	    ->add('titol', 'text', array('label' => 'form.titol','required' => false))
	    ->add('subtitol', 'text')
	    ->add('description', 'textarea')
	    ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
	    ->add('portada',  'choice', array(
			    'choices'   => array('no' => 'NO', 'C1' => 'Col 1', 'C2' => 'Col 2','C3' => 'Col 3'),
			    'required'  => false,
			))
	    ->add('data_fi','date')
	    ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
	    ->add('save', 'submit')
	    ->getForm();
		
	    return $this->render('AcmeStoreBundle:noticia:NoticiaForm.html.twig', array(
		'form' => $formToRender->createView(),'update' =>false,
	    ));	   
	}
	
	public function listAction(Request $request, $orderBy)
	{	 
	    $em = $this->getDoctrine()->getManager();
	    $orderBy = str_replace("..", "'%", $orderBy);
	    $orderBy = str_replace(".,", "%'", $orderBy);
	    $query = $em->createQuery('SELECT n from AcmeStoreBundle:noticia n where '.$orderBy);
	    
	    $paginator= $this->get('knp_paginator');
	    $pagination= $paginator->paginate($query,$this->get('request')->query->get('page',1),10);
	    $path= $this->get('kernel')->getImagesPath('noticia');
	    $pathServer= $this->get('kernel')->getServerPath();
		
	    return $this->render('AcmeStoreBundle:noticia:NoticiaList.html.twig', array(
            'pagination' => $pagination,'path' =>  $path,'pathlocal'=>$pathServer,
        ));
	}
	
	public function editAction($id)
	{	
		
	    $noticia = $this->getDoctrine()->getRepository('AcmeStoreBundle:Noticia')->find($id);
	    $noticiaform = new NoticiaForm();			
	    
	    $path = $this->get('kernel')->getImagesRootDir();
	   
	
	    $noticiaform->setDateEntrada($noticia->getDataEntrada());
	    $noticiaform->setTitol($noticia->getTitol());
	    $noticiaform->setSubtitol($noticia->getSubtitol());
	    $noticiaform->setDescription($noticia->getDescription());
	    $noticiaform->setNovetat($noticia->getNovetat());
	    $noticiaform->setPortada($noticia->getPortada());
	    $noticiaform->setDataFi($noticia->getDataFi());
	    
	    if ( $noticia->getAttachment()!='aaa'){
                echo $path.'downloads/noticia/'.$noticiaform->getAttachment();
		    $file = new File($path.'downloads/noticia/'.$noticia->getAttachment(), true);
		    $noticiaform->setAttachment($file);
		}
       	
	    
	
	    $path = $this->get('kernel')->getServerPath();
	    $formToRender = $this->createFormBuilder($noticiaform)
       	    ->setAction($path.'/admin/secured/noticia/update/'.$id)
       	    ->setMethod('POST')
            ->add('date_entrada', 'date')
            ->add('titol', 'text')
            ->add('subtitol', 'text')
            ->add('description', 'textarea')
            ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
            ->add('portada',  'choice', array(
			    'choices'   => array('no' => 'NO', 'C1' => 'Col 1', 'C2' => 'Col 2','C3' => 'Col 3'),
			    'required'  => false,
			))
            ->add('data_fi','date')
            ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
            ->add('save', 'submit')
            ->getForm();
            
        return $this->render('AcmeStoreBundle:noticia:NoticiaForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>true,
        ));	   
	}
	
	public function updateNoticiaAction(Request $request,$id){
	    $form = new NoticiaForm();
		
	    $form = $this->createFormBuilder($form)
       	    ->setAction($this->generateUrl('store_new_noticia'))
       	    ->setMethod('POST')
            ->add('date_entrada', 'date')
            ->add('titol', 'text')
            ->add('subtitol', 'text')
            ->add('description', 'textarea')
            ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
            ->add('portada',  'choice', array(
			    'choices'   => array('no' => 'NO', 'C1' => 'Col 1', 'C2' => 'Col 2','C3' => 'Col 3'),
			    'required'  => false,
			))
            ->add('data_fi','date')
            ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
            ->add('save', 'submit')
            ->getForm();
            
	    $form->handleRequest($request);
	
	    $noticia = $this->getDoctrine()->getRepository('AcmeStoreBundle:Noticia')->find($id);
		
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	       
	        $dades =$form->getData();
	      
	      	$noticia->setDataEntrada($form['date_entrada']->getData());
	        $noticia->setTitol($form['titol']->getData());
	        $noticia->setSubtitol($form['subtitol']->getData());
	        $noticia->setDescription($form['description']->getData());
	        $noticia->setNovetat($form['novetat']->getData());
	        $noticia->setPortada($form['portada']->getData());
	      	$noticia->setDataFi($form['data_fi']->getData());
	       
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	        $em = $this->getDoctrine()->getManager();
	   	$em->persist($noticia);
	    	$em->flush();
	        $path= $this->get('kernel')->getImagesRootDir();
	        if ($form['attachment']->getData()!=null){
		$file = $form['attachment']->getData()->move($path.'/downloads/noticia/','not_'.$noticia->getId().'.jpg');
	        }
			 
		$noticia->setAttachment('not_'.$noticia->getId().'.jpg');
		$em->persist($noticia);
	    	$em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_noticia'));
	    }
	    
	}
	
	public function deleteNoticiaAction(Request $request,$id){
	
	
	    $noticia = $this->getDoctrine()->getRepository('AcmeStoreBundle:Noticia')->find($id);
	    $em = $this->getDoctrine()->getManager();
	    $em->remove($noticia);
	    $em->flush();
		    
	    return $this->redirect($this->generateUrl('acme_pre_store_noticia'));
	    }
	    
	
	
}
