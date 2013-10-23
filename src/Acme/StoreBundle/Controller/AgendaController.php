<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Agenda;
use Acme\StoreBundle\Forms\AgendaForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;


class AgendaController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeStoreBundle:agenda:AgendaMain.html.twig', array());
    }
    

	public function saveAgendaAction(Request $request){
		$form = new AgendaForm();
		
		$form = $this->createFormBuilder($form)
       	 	->setAction($this->generateUrl('store_new_agenda'))
       	 	->setMethod('POST')
            ->add('date_entrada', 'date')
            ->add('titol', 'text')
            ->add('subtitol', 'text')
            ->add('video', 'text', array('label' => 'form.video','required' => false))
            ->add('description', 'textarea')
            ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
            ->add('portada',  'choice', array(
			    'choices'   => array('C1' => 'Col 1','no' => 'NO'),
			    'required'  => false,
			))
            ->add('data_fi','date')
            ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
            ->add('save', 'submit')
            ->getForm();
            
		$form->handleRequest($request);
	
	    if ($form->isValid()) {
	        // perform some action, such as saving the task to the database
	        $agenda = new Agenda();
	        $dades =$form->getData();
	      	$agenda->setDataEntrada($form['date_entrada']->getData());
	        $agenda->setTitol($form['titol']->getData());
	        $agenda->setSubtitol($form['subtitol']->getData());
                $agenda->setVideo($form['video']->getData());
	        $agenda->setDescription($form['description']->getData());
	        $agenda->setNovetat($form['novetat']->getData());
	        $agenda->setPortada($form['portada']->getData());
	      	$agenda->setDataFi($form['data_fi']->getData());
	      	$agenda->setTablePath("agenda");     
	        $agenda->setAttachment("aaa");
	    	
	     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
	         $em = $this->getDoctrine()->getManager();
	   		 $em->persist($agenda);
	    	 $em->flush();
	         $path= $this->get('kernel')->getImagesRootDir();
		 if ($form['attachment']->getData()!=null){
		    $file = $form['attachment']->getData()->move($path.'/downloads/agenda/','age_'.$agenda->getId().'.jpg');
		    $agenda->setAttachment('age_'.$agenda->getId().'.jpg');
		 }
		 	 
		$em->persist($agenda);
	    	$em->flush();
			
	        return $this->redirect($this->generateUrl('acme_pre_store_agenda'));
	    }
	    
	}
	
	public function precreateAction(Request $request)
	{	 
		$agendaform = new AgendaForm();			
	
	    
	    $agendaform->setDateEntrada(new \DateTime('tomorrow'));
       	$agendaform->setTitol("Titol");
       	$agendaform->setSubtitol("Sub Titol");
        $agendaform->setVideo("");
       	$agendaform->setDescription("descripcio");
       	$agendaform->setNovetat(true);
       	$agendaform->setPortada("C1");
       	$agendaform->setDataFi(new \DateTime('tomorrow'));
       	
       	 $formToRender = $this->createFormBuilder($agendaform)
       	 	->setAction($this->generateUrl('store_new_agenda'))
       	 	->setMethod('POST')
            ->add('date_entrada', 'date')
            ->add('titol', 'text')
            ->add('subtitol', 'text')
            ->add('video', 'text', array('label' => 'form.video','required' => false))
            ->add('description', 'textarea')
            ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
            ->add('portada',  'choice', array(
			    'choices'   => array('C1' => 'Col 1','no' => 'NO'),
			    'required'  => false,
			))
            ->add('data_fi','date')
            ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
            ->add('save', 'submit')
            ->getForm();
         
           $em = $this->getDoctrine()->getManager();
           $querypdf = $em->createQuery('SELECT n from AcmeStoreBundle:addpdf n order by n.id DESC');
           $paginatorpdf= $this->get('knp_paginator');
           $paginationpdf= $paginatorpdf->paginate($querypdf,$this->get('request')->query->get('page',1),3);
           $pathpdf= $this->get('kernel')->getImagesPath('addpdf');
            
        return $this->render('AcmeStoreBundle:agenda:AgendaForm.html.twig', array(
            'form' => $formToRender->createView(),'update' =>false, 'paginationpdf' => $paginationpdf,'pathpdf' =>  $pathpdf,
        ));	   
	}
	
public function listAction(Request $request, $orderBy)
	{	 
		$em = $this->getDoctrine()->getManager();
		$orderBy = str_replace("..", "'%", $orderBy);
		$orderBy = str_replace(".,", "%'", $orderBy);
		$query = $em->createQuery('SELECT n from AcmeStoreBundle:agenda n where '.$orderBy);
		
		$paginator= $this->get('knp_paginator');
		$pagination= $paginator->paginate($query,$this->get('request')->query->get('page',1),10);
		$path= $this->get('kernel')->getImagesPath('agenda');
		$pathServer= $this->get('kernel')->getServerPath();
		
		return $this->render('AcmeStoreBundle:agenda:AgendaList.html.twig', array(
                    'pagination' => $pagination,'path' =>  $path,'pathlocal'=>$pathServer,
                ));
	}
	
public function editAction($id)
	{	
		
		$agenda = $this->getDoctrine()->getRepository('AcmeStoreBundle:Agenda')->find($id);
		$agendaform = new AgendaForm();			
		
		$path = $this->get('kernel')->getImagesRootDir();
		
		if ( $agenda->getAttachment()!='aaa'){
		    $file = new File($path.'downloads/agenda/'.$agenda->getAttachment(), true);
		    $agendaform->setAttachment($file);
		}
		
	    
                $agendaform->setDateEntrada($agenda->getDataEntrada());
                $agendaform->setTitol($agenda->getTitol());
                $agendaform->setSubtitol($agenda->getSubtitol());
                $agendaform->setVideo($agenda->getVideo());
                $agendaform->setDescription($agenda->getDescription());
                $agendaform->setNovetat($agenda->getNovetat());
                $agendaform->setPortada($agenda->getPortada());
                $agendaform->setDataFi($agenda->getDataFi());
       	
       	
                $path = $this->get('kernel')->getServerPath();
                $formToRender = $this->createFormBuilder($agendaform)
                    ->setAction($path.'/admin/secured/agenda/update/'.$id)
                    ->setMethod('POST')
                    ->add('date_entrada', 'date')
                    ->add('titol', 'text')
                    ->add('subtitol', 'text')
                    ->add('video', 'text', array('label' => 'form.video','required' => false))
                    ->add('description', 'textarea')
                    ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
                    ->add('portada',  'choice', array(
                                   'choices'   => array('C1' => 'Col 1','no' => 'NO'),
                                    'required'  => false,
                                ))
                    ->add('data_fi','date')
                    ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
                    ->add('save', 'submit')
                    ->getForm();
                
                 $em = $this->getDoctrine()->getManager();
           $querypdf = $em->createQuery('SELECT n from AcmeStoreBundle:addpdf n order by n.id DESC');
           $paginatorpdf= $this->get('knp_paginator');
           $paginationpdf= $paginatorpdf->paginate($querypdf,$this->get('request')->query->get('page',1),3);
           $pathpdf= $this->get('kernel')->getImagesPath('addpdf');
            
            return $this->render('AcmeStoreBundle:agenda:AgendaForm.html.twig', array(
                'form' => $formToRender->createView(),'update' =>true, 'paginationpdf' => $paginationpdf,'pathpdf' =>  $pathpdf,
            ));	   
	}
	
	public function updateAgendaAction(Request $request,$id){
		$form = new AgendaForm();
		
		$form = $this->createFormBuilder($form)
                    ->setAction($this->generateUrl('store_new_agenda'))
                    ->setMethod('POST')
                    ->add('date_entrada', 'date')
                    ->add('titol', 'text')
                    ->add('subtitol', 'text')
                    ->add('video', 'text', array('label' => 'form.video','required' => false))
                    ->add('description', 'textarea')
                    ->add('novetat', 'choice', array('choices' => array('false'=> 'NO', 'true' =>'SI')))
                    ->add('portada',  'choice', array(
                                   'choices'   => array('C1' => 'Col 1','no' => 'NO'),
                                    'required'  => false,
                                ))
                    ->add('data_fi','date')
                    ->add('attachment', 'file', array('label' => 'form.atachment','required' => false))
                    ->add('save', 'submit')
                    ->getForm();
            
                    $form->handleRequest($request);

                    $agenda = $this->getDoctrine()->getRepository('AcmeStoreBundle:Agenda')->find($id);
		
                 if ($form->isValid()) {
                        // perform some action, such as saving the task to the database

                        $dades =$form->getData();

                        $agenda->setDataEntrada($form['date_entrada']->getData());
                        $agenda->setTitol($form['titol']->getData());
                        $agenda->setSubtitol($form['subtitol']->getData());
                        $agenda->setVideo($form['video']->getData());
                        $agenda->setDescription($form['description']->getData());
                        $agenda->setNovetat($form['novetat']->getData());
                        $agenda->setPortada($form['portada']->getData());
                        $agenda->setDataFi($form['data_fi']->getData());


                     //  return new Response("TITOL:: ".var_dump($dades)." END".$request->getBasePath());
                         $em = $this->getDoctrine()->getManager();
                                 $em->persist($agenda);
                         $em->flush();
                         $path= $this->get('kernel')->getImagesRootDir();
                         if ($form['attachment']->getData()!=null){
                                  $file = $form['attachment']->getData()->move($path.'/downloads/agenda/','age_'.$agenda->getId().'.jpg');
                                  $agenda->setAttachment('age_'.$agenda->getId().'.jpg');
                                  $em->persist($agenda);
                                  $em->flush();
                         }

                                  

                        return $this->redirect($this->generateUrl('acme_pre_store_agenda'));
                    }
	    
	}
	
	        public function deleteAgendaAction(Request $request,$id){
	
	
		 $agenda = $this->getDoctrine()->getRepository('AcmeStoreBundle:Agenda')->find($id);
		
	  	 $em = $this->getDoctrine()->getManager();
	   	 $em->remove($agenda);
	   	 $em->flush();
			
	        return $this->redirect($this->generateUrl('llistat_store_agenda/'));
	    }
	    
	
	
}
