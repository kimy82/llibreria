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
                ->add('Desa', 'submit')
                ->getForm();
            
        return $this->render('AcmeStoreBundle:upload:Upload.html.twig', array('form' => $formToRender->createView()));
    }
    

	public function upAction(Request $request){
		
		 
	
	    	
	    	        $em = $this->getDoctrine()->getManager();
			$query = $em->createQuery('DELETE from AcmeStoreBundle:Llibre n where 1=1 ');
			$query->execute();
		
	                              
                        ini_set('auto_detect_line_endings', TRUE); 
               
	      
                        $handle = $this->utf8_fopen_read('../web/dades/web.txt');
               
     
			
	  		if ($handle) {
	  			$numTotal=0;
	  			$numFets=0;
                             

                                $i=1;
                                
                                $conn = mysql_connect('localhost:3306', 'mylli607', 'FXD9Z3l0');
                                
                                if (!mysql_select_db('symphondog', $conn)) {
                                    echo 'No pudo seleccionar la base de datos';
                                    exit;
                                }
                                mysql_query("BEGIN",$conn);
                                while (($line = fgets($handle, 4096)) !== false) {
                                     if (trim($line) == '') {
				  continue;
				}    
                                    try{
			      	
                                            $tomorrow = mktime(0,0,0,date("m"),date("d"),date("Y"));
                                            list($name, $autor, $editorial, $category, $desc, $price) = explode("¦¦¦", $line);
                                            mysql_query("Insert into llibre (dateEntrada,attachment,suggerir,name,autor,editorial,category,tablePath,price,description) values ('".date("Y/m/d", $tomorrow)."','aaa',0,\"".addslashes($name)."\",\"".addslashes($autor)."\",\"".addslashes($editorial)."\",\"".addslashes($category)."\",'llibre','".$price."','".addslashes($desc)."')",$conn) or die (mysql_error());
		                                                                                     
                                            $numFets=$numFets+1;        
                                            
                                    }catch(ContextErrorException $e){
                                      echo 'Excepcipn capturada: '.$e;
                                    }                            
                                }
                             
                                mysql_query("COMMIT",$conn);
                                                           
                                
                               
                                    fclose($handle);
                                    
                                     //END SENDING EMAIL ENCARREC
                                    return $this->render('AcmeStoreBundle:upload:UploadOK.html.twig', array('numtotal'=>$numFets));
                                
                                
			}	
	    					
	}
                                    }
