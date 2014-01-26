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
                ->add('description', 'textarea')
                ->add('intervindran', 'text')
                ->add('lloc', 'text')
                ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
                ->add('portada',  'choice', array(
                                'choices'   => array('no' => 'NO', 'C1' => 'Col 1', 'C2' => 'Col 2','C3' => 'Col 3'),
                                'required'  => false,
                            ))
                ->add('data_fi','date')
                ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
                ->add('Desa', 'submit')
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
		 $prova = $form['attachment']->getData();
                 if ($form['attachment']->getData()!=null){
                    $file = $form['attachment']->getData()->move($path.'/downloads/presentacio/','pre_'.$presentacio->getId().'.jpg');
                    $presentacio->setAttachment('pre_'.$presentacio->getId().'.jpg');
		 }
		 $em->persist($presentacio);
	    	 $em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_presentacio'));
	    }
	    
	}
	
	public function precreateAction(Request $request)
	{	 
        $presentacioform = new PresentacioForm();			
	$presentacioform->setDateEntrada(new \DateTime('tomorrow'));
       	$presentacioform->setTitol("");
       	$presentacioform->setSubtitol("");
       	$presentacioform->setDescription("");
       	$presentacioform->setNovetat(true);
       	$presentacioform->setPortada("no");
       	$presentacioform->setLloc("");
        $presentacioform->setIntervindran("");
       	$presentacioform->setDataFi(new \DateTime('tomorrow'));
       	$formToRender = $this->createFormBuilder($presentacioform)
        ->setAction($this->generateUrl('store_new_presentacio'))
        ->setMethod('POST')
        ->add('date_entrada', 'date')
        ->add('titol', 'text')
        ->add('subtitol', 'text')
        ->add('description', 'textarea')
        ->add('intervindran', 'text')
        ->add('lloc', 'text')
        ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
        ->add('portada',  'choice', array(
                        'choices'   => array('no' => 'NO', 'C1' => 'Col 1', 'C2' => 'Col 2','C3' => 'Col 3'),
                        'required'  => false,
                    ))
        ->add('data_fi','date')
         ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
        ->add('Desa', 'submit')
        ->getForm();
        
        $em = $this->getDoctrine()->getManager();
        $querypdf = $em->createQuery('SELECT n from AcmeStoreBundle:Addpdf n order by n.id DESC');
        $paginatorpdf= $this->get('knp_paginator');
        $paginationpdf= $paginatorpdf->paginate($querypdf,$this->get('request')->query->get('page',1),30);
        $pathpdf= $this->get('kernel')->getImagesPath('addpdf');
            
        return $this->render('AcmeStoreBundle:presentacio:PresentacioForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>false, 'paginationpdf' => $paginationpdf,'pathpdf' =>  $pathpdf,
        ));	   
	}
	
	public function listAction(Request $request, $orderBy)
	{	 
		$em = $this->getDoctrine()->getManager();
		$orderBy = str_replace("..", "'%", $orderBy);
		$orderBy = str_replace(".,", "%'", $orderBy);
		$query = $em->createQuery('SELECT n from AcmeStoreBundle:Presentacio n order by n.dataEntrada DESC');
		
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
		$presentacioform->setDateEntrada($presentacio->getDataEntrada());
		$presentacioform->setTitol($presentacio->getTitol());
		$presentacioform->setSubtitol($presentacio->getSubtitol());
		$presentacioform->setDescription($presentacio->getDescription());
		$presentacioform->setNovetat($presentacio->getNovetat());
		$presentacioform->setPortada($presentacio->getPortada());
		$presentacioform->setDataFi($presentacio->getDataFi());
		$presentacioform->setLloc($presentacio->getLloc());
		$presentacioform->setIntervindran($presentacio->getIntervindran());
                if (  $presentacio->getAttachment()!='aaa'){
                    $file = new File($path.'downloads/presentacio/'.$presentacio->getAttachment(), true);
		    $presentacioform->setAttachment($file);
		}
       	
		$path = $this->get('kernel')->getServerPath();
		$formToRender = $this->createFormBuilder($presentacioform)
                ->setAction($path.'/admin/secured/presentacio/update/'.$id)
                ->setMethod('POST')
                ->add('date_entrada', 'date')
                ->add('titol', 'text')
                ->add('subtitol', 'text')
                ->add('description', 'textarea')
                ->add('intervindran', 'text')
                ->add('lloc', 'text')
                ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
                ->add('portada',  'choice', array(
                                'choices'   => array('no' => 'NO', 'C1' => 'Col 1', 'C2' => 'Col 2','C3' => 'Col 3'),
                                'required'  => false,
                            ))
                ->add('eliminador',  'choice', array(
			    'choices'   => array('no' => 'NO','si' => 'Si'),
			    'required'  => false,
			))
                ->add('data_fi','date')
                 ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
                ->add('Desa', 'submit')
                ->getForm();
                
                 $em = $this->getDoctrine()->getManager();
        $querypdf = $em->createQuery('SELECT n from AcmeStoreBundle:Addpdf n order by n.id DESC');
        $paginatorpdf= $this->get('knp_paginator');
        $paginationpdf= $paginatorpdf->paginate($querypdf,$this->get('request')->query->get('page',1),30);
        $pathpdf= $this->get('kernel')->getImagesPath('addpdf');
            
        return $this->render('AcmeStoreBundle:presentacio:PresentacioForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>true, 'paginationpdf' => $paginationpdf,'pathpdf' =>  $pathpdf,
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
            ->add('description', 'textarea')
            ->add('intervindran', 'text')
            ->add('lloc', 'text')
            ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
            ->add('portada',  'choice', array(
			    'choices'   => array('no' => 'NO', 'C1' => 'Col 1', 'C2' => 'Col 2','C3' => 'Col 3'),
			    'required'  => false,
			))
            ->add('eliminador',  'choice', array(
			    'choices'   => array('no' => 'NO','si' => 'Si'),
			    'required'  => false,
			))
            ->add('data_fi','date')
             ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
            ->add('Desa', 'submit')
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
                                $presentacio->setAttachment('pre_'.$presentacio->getId().'.jpg');
			  $em->persist($presentacio);
	    	  $em->flush();
	         }
                  if ($form['eliminador']->getData()=="si"){
                        $presentacio->setAttachment("aaa");
                        $em->persist($presentacio);
                        $em->flush();
                 }
			 
			  
			
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
