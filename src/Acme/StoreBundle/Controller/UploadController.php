<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Forms\UploadForm;
use Acme\StoreBundle\Entity\Llibre;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Debug\Exception\ContextErrorException;


class UploadController extends Controller
{
    public function utf8_fopen_read($fileName) { 
        $fc = iconv('windows-1250', 'utf-8', file_get_contents($fileName)); 
        $handle=fopen("php://memory", "rw"); 
        fwrite($handle, $fc); 
        fseek($handle, 0); 
        return $handle; 
    } 
    public function indexAction()
    {
    	$uploadform = new UploadForm();			
	
	    
	    $uploadform->setSeparator('¦¦¦');
              
       	  
       	 $formToRender = $this->createFormBuilder($uploadform)
       	 	->setAction($this->generateUrl('acme_pujar_txt'))
       	 	->setMethod('POST') 
                ->add('separator', 'text')        
                ->add('attachment', 'file')
                ->add('save', 'submit')
                ->getForm();
            
        return $this->render('AcmeStoreBundle:upload:Upload.html.twig', array('form' => $formToRender->createView()));
    }
    

	public function upAction(Request $request){
		
			
	
		 $form = new UploadForm();					    	                  	
                 $form = $this->createFormBuilder($form)
                       ->setAction($this->generateUrl('acme_pujar_txt'))
                       ->setMethod('POST')
                       ->add('separator', 'text')        
                       ->add('attachment', 'file')
                       ->add('save', 'submit')
                       ->getForm();
		
                 $form->handleRequest($request);
	
	         if ($form->isValid()) {
	    	
	    	        $em = $this->getDoctrine()->getManager();
			$query = $em->createQuery('DELETE from AcmeStoreBundle:Llibre n where 1=1 ');
			$query->execute();
		
	       
                        $path= $this->get('kernel')->getImagesRootDir();
                        $separator = $form['separator']->getData();
                        echo $form['attachment']->getData();
                        $file = $form['attachment']->getData();
                        //extension = $file->guessExtension();
                        $pathRel= rand(1, 99999).'lastUpload.txt';
                        $form['attachment']->getData()->move($path.'/downloads/uploads/',$pathRel);
                        ini_set('auto_detect_line_endings', TRUE); 
               
	      
                        $handle = $this->utf8_fopen_read($path.'/downloads/uploads/'.$pathRel);
               
     
			
	  		if ($handle) {
	  			$numTotal=0;
	  			$numFets=0;
                                $batchSize = 200;
                                $i=1;
                                while (($line = fgets($handle, 4096)) !== false) {
			      
                                    try{
			      	
                                            $numTotal=$numTotal+1;
                                            list($name, $autor, $editorial, $category, $desc, $price) = explode("¦¦¦", $line);

                                            $llibre = new Llibre();

                                            $llibre->setName($name);
                                            $llibre->setPrice($price);
                                            $llibre->setDescription($desc);
                                            $llibre->setDateEntrada(new \DateTime('today'));	
                                            $llibre->setCategory($category);
                                            $llibre->setAutor($autor);
                                            $llibre->setEditorial($editorial);           
                                            $llibre->setTablePath("llibre");     
                                            $llibre->setAttachment("aaa");
                                            $llibre->setSuggerir(0);

                                            $em = $this->getDoctrine()->getManager();
                                            $em->persist($llibre);

                                            $numFets=$numFets+1;
                                            $i=$i+1;
                                
                                            if (($i % $batchSize) == 0) {
                                                    $em->flush();
                                                    $em->clear();
                                                  
                                            }
                                 
                                    }catch(ContextErrorException $e){
                                      echo 'Excepcipn capturada: ';
                                    }                            
                                }
                                echo 'SSSSSSSSSSSSSSSSSS\n';
                                if (!feof($handle)) {
                                    echo "Error: unexpected fgets() fail\n";
                                }
                                if (($i % $batchSize) != 0) {
                                             $em->flush();
                                             $em->clear();
                                             echo 'flushESPECIAL';
                                }
                                fclose($handle);
                                echo 'AFTER RENDER';
                                return $this->render('AcmeStoreBundle:upload:UploadOK.html.twig', array('numtotal'=>$numTotal,'numfet'=>$numFets));
			}	
	    }
	    return $this->render('AcmeStoreBundle:upload:UploadOK.html.twig', array());						
	}
	
}
