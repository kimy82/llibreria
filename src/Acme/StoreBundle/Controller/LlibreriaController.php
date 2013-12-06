<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Agenda;
use Acme\StoreBundle\Entity\Foto;
use Acme\StoreBundle\Entity\Afegir;
use Acme\StoreBundle\Entity\Encarrecs;
use Acme\StoreBundle\Entity\Llibre;
use Acme\StoreBundle\Forms\Search;
use Acme\StoreBundle\Forms\AgendaForm;
use Acme\StoreBundle\Forms\DemanaForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Query\ResultSetMapping;

class LlibreriaController extends Controller {

    public function indexAction() {


        $year = date("Y");
        $previousyear = $year;
        $dates = array($previousyear - 4, $previousyear - 3, $previousyear - 2, $previousyear - 1, $previousyear);
        $em = $this->getDoctrine()->getManager();
        //Presentacio
        $query = $em->createQuery('SELECT n from AcmeStoreBundle:Presentacio n where n.dataFi >= :dat ')->setParameter('dat', new \DateTime('tomorrow'));
        $counter = count($query->getResult());

        if ($counter >= 1) {
            $query = $em->createQuery('SELECT n from AcmeStoreBundle:Presentacio n where n.dataFi >= :dat ')->setParameter('dat', new \DateTime('tomorrow'))->setMaxResults(7);
            $paginator = $this->get('knp_paginator');
            $paginationPresentacio = $paginator->paginate($query, $this->get('request')->query->get('page', 1), 20);
        } else {
            $query = $em->createQuery('SELECT n from AcmeStoreBundle:Presentacio n where n.dataFi >= :dat ')->setParameter('dat', new \DateTime('last week'))->setMaxResults(7);

            //$query = $em->createQuery('SELECT n from AcmeStoreBundle:presentacio n order by n.id DESC ')->setMaxResults(3);		
            $paginator = $this->get('knp_paginator');
            $paginationPresentacio = $paginator->paginate($query, $this->get('request')->query->get('page', 1), 20);
        }
        //Agenda	
        $rsm = new ResultSetMapping;
        $rsm->addEntityResult('Acme\StoreBundle\Entity\Agenda', 'a');
        $rsm->addFieldResult('a', 'id', 'id'); // ($alias, $columnName, $fieldName)
        $rsm->addFieldResult('a', 'tablePath', 'tablePath');
        $rsm->addFieldResult('a', 'dataEntrada', 'dataEntrada');
        $rsm->addFieldResult('a', 'titol', 'titol'); // ($alias, $columnName, $fieldName)
        $rsm->addFieldResult('a', 'subtitol', 'subtitol'); // ($alias, $columnName, $fieldName)
        $rsm->addFieldResult('a', 'description', 'description'); // ($alias, $columnName, $fieldName)
        $rsm->addFieldResult('a', 'video', 'video'); // ($alias, $columnName, $fieldName)
        $rsm->addFieldResult('a', 'attachment', 'attachment'); // ($alias, $columnName, $fieldName)  
        $queryw = $em->createNativeQuery('SELECT id, tablePath, description, titol, subtitol, attachment, video FROM agenda WHERE portada != ? order by dataEntrada DESC', $rsm);
        $queryw->setParameter(1, 'no');
        $agenda = $queryw->getResult();

        //Noticia
        $rsmn = new ResultSetMapping;
        $rsmn->addEntityResult('Acme\StoreBundle\Entity\Noticia', 'n');
        $rsmn->addFieldResult('n', 'id', 'id'); // ($alias, $columnName, $fieldName)
        $rsmn->addFieldResult('n', 'tablePath', 'tablePath');
        $rsmn->addFieldResult('n', 'dataEntrada', 'dataEntrada');
        $rsmn->addFieldResult('n', 'titol', 'titol'); // // ($alias, $columnName, $fieldName
        $rsmn->addFieldResult('n', 'subtitol', 'subtitol'); // // ($alias, $columnName, $fieldName
        $rsmn->addFieldResult('n', 'video', 'video'); // // ($alias, $columnName, $fieldName)
        $rsmn->addFieldResult('n', 'description', 'description'); // // ($alias, $columnName, $fieldName)
        $rsmn->addFieldResult('n', 'attachment', 'attachment');
        $queryn = $em->createNativeQuery('SELECT id, tablePath, dataEntrada, titol, subtitol, description, attachment, video FROM noticia WHERE portada != ? order by dataEntrada DESC', $rsmn);
        $queryn->setParameter(1, 'no');
        $noticia = $queryn->getResult();

        //slider
        $path = $this->get('kernel')->getImagesPathAlone();
        $pathSlider = $this->get('kernel')->getImagesPathAlone();
        $pathServer = $this->get('kernel')->getServerPath();
        $slider = $this->getSlider();


        return $this->render('AcmeStoreBundle:llibreria:LlibreriaMain.html.twig', array('pathSlider' => $pathSlider, 'slider' => $slider, 'dates' => $dates, 'paginationPresentacio' => $paginationPresentacio, 'path' => $path, 'pathlocal' => $pathServer, 'agenda' => $agenda, 'noticia' => $noticia, 'body' => 'index'));
    }

    public function galeriaAction($year) {
        $previousyear = date("Y");

        $em = $this->getDoctrine()->getManager();

        $queryYears = $em->createQuery('SELECT DISTINCT(date_format(n.dataEntrada,\'%Y\')) from AcmeStoreBundle:Galeria n where 1=1 order by n.dataEntrada DESC');
        $dates = $queryYears->getResult();



        $year2 = $year . '-12-30';
        $year = $year . '-01-01';




        $query = $em->createQuery('SELECT n from AcmeStoreBundle:Galeria n where n.dataEntrada BETWEEN :dt and :dt2 order by n.dataEntrada DESC')->setParameter('dt', $year)->setParameter('dt2', $year2);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $this->get('request')->query->get('page', 1), 100);
        $path = $this->get('kernel')->getImagesPath('galeria');
        $pathServer = $this->get('kernel')->getServerPath();

        $slider = $this->getSlider();
        $pathSlider = $this->get('kernel')->getImagesPathAlone();


        return $this->render('AcmeStoreBundle:llibreria:Galeria.html.twig', array(
                    'pathSlider' => $pathSlider, 'slider' => $slider, 'pagination' => $pagination, 'path' => $path, 'pathlocal' => $pathServer, 'dates' => $dates, 'body' => 'galeria',
        ));
    }

    public function bloqAction() {
        $previousyear = date("Y");
        $dates = array($previousyear - 4, $previousyear - 3, $previousyear - 2, $previousyear - 1, $previousyear);
        $em = $this->getDoctrine()->getManager();

        $year2 = $year . '-12-30';
        $year = $year . '-01-01';




        $query = $em->createQuery('SELECT n from AcmeStoreBundle:Galeria n where n.dataEntrada BETWEEN :dt and :dt2 order by n.dataEntrada DESC')->setParameter('dt', $year)->setParameter('dt2', $year2);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $this->get('request')->query->get('page', 1), 10);
        $path = $this->get('kernel')->getImagesPath('galeria');
        $pathServer = $this->get('kernel')->getServerPath();
        $slider = $this->getSlider();
        $pathSlider = $this->get('kernel')->getImagesPathAlone();
        return $this->render('AcmeStoreBundle:llibreria:Galeria.html.twig', array(
                    'pathSlider' => $pathSlider, 'slider' => $slider, 'pagination' => $pagination, 'path' => $path, 'pathlocal' => $pathServer, 'dates' => $dates,
        ));
    }

    public function portadaAction() {
        return $this->redirect($this->generateUrl('acme_llibreria22'));
    }

    public function noticiaAction() {

        $em = $this->getDoctrine()->getManager();
        // echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
        //Salida: Viernes 24 de Febrero del 2012	
        $query = $em->createQuery('SELECT n from AcmeStoreBundle:Noticia n order by n.dataEntrada DESC');
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $this->get('request')->query->get('page', 1), 12);
        $path = $this->get('kernel')->getImagesPath('noticia');
        $pathServer = $this->get('kernel')->getServerPath();
        $slider = $this->getSlider();
        $pathSlider = $this->get('kernel')->getImagesPathAlone();
        return $this->render('AcmeStoreBundle:llibreria:Noticia.html.twig', array(
                    'pathSlider' => $pathSlider, 'slider' => $slider, 'pagination' => $pagination, 'path' => $path, 'pathlocal' => $pathServer, 'body' => 'noticies'
        ));
    }

    public function agendaAction() {

        $em = $this->getDoctrine()->getManager();


        $query = $em->createQuery('SELECT n from AcmeStoreBundle:agenda n order by n.dataEntrada DESC');
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $this->get('request')->query->get('page', 1), 10);
        $path = $this->get('kernel')->getImagesPath('agenda');
        $pathServer = $this->get('kernel')->getServerPath();

        $slider = $this->getSlider();
        $pathSlider = $this->get('kernel')->getImagesPathAlone();
        return $this->render('AcmeStoreBundle:llibreria:Agenda.html.twig', array(
                    'pathSlider' => $pathSlider, 'slider' => $slider, 'pagination' => $pagination, 'path' => $path, 'pathlocal' => $pathServer, 'body' => 'agenda'
        ));
    }

    public function buscaLlibreAction($name) {

        $em = $this->getDoctrine()->getManager();
        $cerca = $name;
        
        
        $buscaafegir = $em->createQuery('SELECT n from AcmeStoreBundle:Afegir n order by n.id DESC');
        $paginatorafegir = $this->get('knp_paginator');
        $pagename2 = 'page2';
        $paginationafegir = $paginatorafegir->paginate($buscaafegir, $this->get('request')->query->get($pagename2, 1), 6, array('pageParameterName' => $pagename2));
        $path = $this->get('kernel')->getImagesPath('afegir');
        $pathServer = $this->get('kernel')->getServerPath();
        
        
    
         

        if ($name == 'any') {
            /*
              $cerca="";
              $query = $em->createQuery('SELECT n from AcmeStoreBundle:Llibre n order by n.dateEntrada DESC ');
             */
            $query = $em->createQueryBuilder();
            $query = $query->select('n')->from('AcmeStoreBundle:Llibre', 'n')
                    ->where($query->expr()->like('n.name', $query->expr()->literal('%ab%')))
                    ->getQuery();
        } else {
            
            
 
             
            $query = $em->createQueryBuilder();
            
            
            $autornou = preg_split("/[\s,]+/","$name");
            $arrlength = count ($autornou);
            for ($i=0;$i<$arrlength;$i++){
      
                if (!empty($autornou[$i]) ){
                    $query = $query->select('n')->from('AcmeStoreBundle:Llibre', 'n')
                       ->where($query->expr()->like('n.name', $query->expr()->literal('%' . $name . '%')))
                       ->orwhere($query->expr()->like('n.autor', $query->expr()->literal('%' .  $autornou[$i] . '%')))
                       ->orwhere($query->expr()->like('n.editorial', $query->expr()->literal('%' . $name . '%')))
                       ->getQuery();
                }
            }
            
           
        }
        

        $resultats = count($query->getResult());

        $paginator = $this->get('knp_paginator');
        $pagename1 = 'page1';
        $pagination = $paginator->paginate($query, $this->get('request')->query->get($pagename1, 1), 30, array('pageParameterName' => $pagename1));
        $path = $this->get('kernel')->getImagesPath('afegir');
        $pathServer = $this->get('kernel')->getServerPath();
        $slider = $this->getSlider();
        $pathSlider = $this->get('kernel')->getImagesPathAlone();
        return $this->render('AcmeStoreBundle:llibreria:BuscaLlibre.html.twig', array(
                    'pathSlider' => $pathSlider, 'slider' => $slider, 'paginationafegir' => $paginationafegir, 'pagination' => $pagination, 'path' => $path, 'pathlocal' => $pathServer, 'body' => 'busca', 'cerca' => $cerca, 'numresultats' => $resultats
        ));
    }

    public function demanaLlibreAction($id, $nom) {

        $em = $this->getDoctrine()->getManager();

        $path = $this->get('kernel')->getImagesPath('llibre');
        $pathServer = $this->get('kernel')->getServerPath();
        $query = $em->createQueryBuilder();
        $resultats = $query->select('n')->from('AcmeStoreBundle:Llibre', 'n')
                        ->where('n.name=\'' . $nom . '\'')
                        ->getQuery()->getResult();

        $formDemana = new DemanaForm();

        /*
          $name = $this->get('translator')->trans('f_busca_llibre_nom_client');
          $formDemana->setName($name);

          $poble = $this->get('translator')->trans('f_busca_llibre_poble_client');
          $formDemana->setPoblacio($poble);

          $adreca = $this->get('translator')->trans('f_busca_llibre_adreca_client');
          $formDemana->setAdreca($adreca);

          $codi = $this->get('translator')->trans('f_busca_llibre_codipostal_client');
          $formDemana->setCodi($codi);

          $email = $this->get('translator')->trans('f_busca_llibre_email_client');
          $formDemana->setEmail($email);

          $tel = $this->get('translator')->trans('f_busca_llibre_tel_client');
          $formDemana->setTel($tel);
         */
        $formDemana->setLlibre($id);


        $form = $this->createFormBuilder($formDemana)
                ->setAction($this->generateUrl('acme_save_demana'))
                ->setMethod('POST')
                ->add('name', 'text')
                ->add('poblacio', 'text')
                ->add('adreca', 'text')
                ->add('codi', 'text')
                ->add('email', 'text')
                ->add('tel', 'text')
                ->add('llibre', 'text')
                ->add('Encarregar', 'submit')
                ->getForm();
        $slider = $this->getSlider();
        $pathSlider = $this->get('kernel')->getImagesPathAlone();
        return $this->render('AcmeStoreBundle:llibreria:DemanaLlibre.html.twig', array(
                    'pathSlider' => $pathSlider, 'slider' => $slider, 'pagination' => $resultats, 'path' => $path, 'pathlocal' => $pathServer, 'body' => 'noticies',
                    'form' => $form->createView(),
        ));
    }

    public function saveDemanaAction(Request $request) {
        $formDemana = new DemanaForm();


        $form = $this->createFormBuilder($formDemana)
                ->setAction($this->generateUrl('acme_save_demana'))
                ->setMethod('POST')
                ->add('name', 'text')
                ->add('poblacio', 'text')
                ->add('adreca', 'text')
                ->add('codi', 'text')
                ->add('email', 'text')
                ->add('tel', 'text')
                ->add('llibre', 'text')
                ->add('Encarregar', 'submit')
                ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $encarrec = new Encarrecs();
            $em = $this->getDoctrine()->getManager();

            $encarrec->setName($form['name']->getData());
            $encarrec->setPoblacio($form['poblacio']->getData());
            $encarrec->setAdreca($form['adreca']->getData());
            $encarrec->setCodi($form['codi']->getData());
            $encarrec->setEmail($form['email']->getData());
            $encarrec->setTel($form['tel']->getData());
            $encarrec->setEnviat(0);

            //SENDING EMAIL ENCARREC
            $message = \Swift_Message::newInstance()
                    ->setSubject('Nova comanda')
                    ->setFrom('comanda@llibre.com')
                    ->setTo('adp.alex@gmail.com')
                    ->setBody($this->renderView('AcmeStoreBundle:llibreria:DemanaEmail.html.twig', array('name' => $encarrec->getName(),
                        'poble' => $encarrec->getPoblacio(),
                        'adreca' => $encarrec->getAdreca(),
                        'codi' => $encarrec->getCodi(),
                        'llibre' => $encarrec->getLlibre(),
                        'email' => $encarrec->getEmail())), 'text/html');
            $this->get('mailer')->send($message);

            //END SENDING EMAIL ENCARREC

            $query = $em->createQueryBuilder();
            $llibre = $query->select('n')->from('AcmeStoreBundle:Llibre', 'n')
                            ->where('n.id=' . $form['llibre']->getData())
                            ->getQuery()->getSingleResult();

            $encarrec->setLlibre($llibre->getName());


            $em->persist($encarrec);
            $em->flush();
            $pathServer = $this->get('kernel')->getServerPath();
            $slider = $this->getSlider();
            $pathSlider = $this->get('kernel')->getImagesPathAlone();
            return $this->render('AcmeStoreBundle:llibreria:DemanaLlibreOK.html.twig', array(
                        'pathSlider' => $pathSlider, 'slider' => $slider, 'body' => 'noticies', 'encarrec' => $encarrec, 'pathlocal' => $pathServer
            ));
        }
    }

    public function suggerimentsAction() {

        $em = $this->getDoctrine()->getManager();


        $queryficcio = $em->createQuery('SELECT n from AcmeStoreBundle:Suggerencia n where n.suggerir= :sug and n.category = :cat order by n.id DESC')->setParameter('sug', 1)->setParameter('cat', 'ficcio')->getResult();
        $querynoficcio = $em->createQuery('SELECT n from AcmeStoreBundle:Suggerencia n where n.suggerir= :sug and n.category= :cat order by n.id DESC')->setParameter('sug', 1)->setParameter('cat', 'noFiccio')->getResult();
        $queryautorscatalans = $em->createQuery('SELECT n from AcmeStoreBundle:Suggerencia n where n.suggerir= :sug and n.category= :cat order by n.id DESC')->setParameter('sug', 1)->setParameter('cat', 'autorsCatalans')->getResult();
        $querycomic = $em->createQuery('SELECT n from AcmeStoreBundle:Suggerencia n where n.suggerir= :sug and n.category= :cat order by n.id DESC')->setParameter('sug', 1)->setParameter('cat', 'comics')->getResult();
        $queryinfantil = $em->createQuery('SELECT n from AcmeStoreBundle:Suggerencia n where n.suggerir= :sug and n.category= :cat order by n.id DESC')->setParameter('sug', 1)->setParameter('cat', 'infantil')->getResult();
        $querybutxaca = $em->createQuery('SELECT n from AcmeStoreBundle:Suggerencia n where n.suggerir= :sug and n.category= :cat order by n.id DESC')->setParameter('sug', 1)->setParameter('cat', 'butxaca')->getResult();

        $path = $this->get('kernel')->getImagesPath('suggerencia');
        $pathServer = $this->get('kernel')->getServerPath();
        $slider = $this->getSlider();
        $pathSlider = $this->get('kernel')->getImagesPathAlone();

        return $this->render('AcmeStoreBundle:llibreria:Suggeriments.html.twig', array(
                    'pathSlider' => $pathSlider, 'slider' => $slider, 'paginationficcio' => $queryficcio, 'paginationnoficcio' => $querynoficcio,
                    'paginationautorscatalans' => $queryautorscatalans, 'paginationcomic' => $querycomic, 'paginationinfantil' => $queryinfantil, 'paginationbutxaca' => $querybutxaca, 'path' => $path, 'pathlocal' => $pathServer, 'body' => 'suggeriments'
        ));
    }

    public function semuaSearchAction($search) {

        $em = $this->getDoctrine()->getManager();
        $searchList = array();

        //Busqueda de llibres
        $query = $em->createQueryBuilder();
        $query = $query->select('n')->from('AcmeStoreBundle:Llibre', 'n')
                ->where($query->expr()->like('n.name', $query->expr()->literal('%' . $search . '%')))
                ->orwhere($query->expr()->like('n.autor', $query->expr()->literal('%' . $search . '%')))
                ->orwhere($query->expr()->like('n.editorial', $query->expr()->literal('%' . $search . '%')))
                ->getQuery();

        $resultatsLlibre = $query->getResult();
        $pathllibre = $this->get('kernel')->getImagesPath('llibre');

        for ($i = 0; $i < count($resultatsLlibre); ++$i) {
            $searched = new Search();
            $llibre = $resultatsLlibre[$i];
            $searched->setTitol($llibre->getName());
            $searched->setDescription($llibre->getAutor() . ', ' . $llibre->getEditorial() . ', ' . $llibre->getPrice());
            $searched->setCategory('llibre');
            $searched->setPath($pathllibre);
            $searched->setAttachment($llibre->getAttachment());


            array_push($searchList, $searched);
        }

        //Buqueda de presentacions

        $queryPresentacio = $em->createQueryBuilder();
        $queryPresentacio = $queryPresentacio->select('n')->from('AcmeStoreBundle:Presentacio', 'n')
                ->where($queryPresentacio->expr()->like('n.dataEntrada', $queryPresentacio->expr()->literal('%' . $search . '%')))
                ->orwhere($queryPresentacio->expr()->like('n.titol', $queryPresentacio->expr()->literal('%' . $search . '%')))
                ->orwhere($queryPresentacio->expr()->like('n.subtitol', $queryPresentacio->expr()->literal('%' . $search . '%')))
                ->orwhere($queryPresentacio->expr()->like('n.description', $queryPresentacio->expr()->literal('%' . $search . '%')))
                ->getQuery();

        $resultatsPresentacio = $queryPresentacio->getResult();
        $pathpresentacio = $this->get('kernel')->getImagesPath('presentacio');

        for ($i = 0; $i < count($resultatsPresentacio); ++$i) {
            $searched = new Search();
            $presentacio = $resultatsPresentacio[$i];
            // $searched->setDateEntrada($presentacio->GetDataEntrada());
            $searched->setTitol($presentacio->getTitol());
            $searched->setDescription($presentacio->getSubtitol() . ', ' . $presentacio->getDescription() . ', ' . $presentacio->getDataEntrada()->format('Y-m-d'));
            $searched->setCategory('presentacio');
            $searched->setPath($pathpresentacio);
            $searched->setAttachment($presentacio->getAttachment());


            array_push($searchList, $searched);
        }



        //Busqueda a noticies
        $query = $em->createQueryBuilder();
        $query = $query->select('n')->from('AcmeStoreBundle:Noticia', 'n')
                ->where($query->expr()->like('n.titol', $query->expr()->literal('%' . $search . '%')))
                ->orwhere($query->expr()->like('n.description', $query->expr()->literal('%' . $search . '%')))
                ->orwhere($query->expr()->like('n.subtitol', $query->expr()->literal('%' . $search . '%')))
                ->orwhere($query->expr()->like('n.dataEntrada', $query->expr()->literal('%' . $search . '%')))
                ->getQuery();

        $resultatsNoticia = $query->getResult();
        $pathnoticia = $this->get('kernel')->getImagesPath('noticia');

        for ($i = 0; $i < count($resultatsNoticia); ++$i) {
            $searched = new Search();
            $noticia = $resultatsNoticia[$i];
            // $searched->setDataEntrada($noticia->getDataEntrada());
            $searched->setTitol($noticia->getTitol());
            $searched->setDescription($noticia->getSubtitol() . ', ' . $noticia->getDescription());
            $searched->setCategory('noticia');
            $searched->setPath($pathnoticia);
            $searched->setAttachment($noticia->getAttachment());


            array_push($searchList, $searched);
        }

        //Busqueda de Agenda
        $query = $em->createQueryBuilder();
        $query = $query->select('n')->from('AcmeStoreBundle:Agenda', 'n')
                ->where($query->expr()->like('n.titol', $query->expr()->literal('%' . $search . '%')))
                ->orwhere($query->expr()->like('n.subtitol', $query->expr()->literal('%' . $search . '%')))
                ->getQuery();

        $resultatsAgenda = $query->getResult();
        $pathagenda = $this->get('kernel')->getImagesPath('agenda');

        for ($i = 0; $i < count($resultatsAgenda); ++$i) {
            $searched = new Search();
            $agenda = $resultatsAgenda[$i];
            $searched->setTitol($agenda->getTitol());
            $searched->setDescription($agenda->getSubtitol() . ', ' . $agenda->getDescription());
            $searched->setCategory('agenda');
            $searched->setPath($pathagenda);
            $searched->setAttachment($agenda->getAttachment());


            array_push($searchList, $searched);
        }

        $pathServer = $this->get('kernel')->getServerPath();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($searchList, $this->get('request')->query->get('page', 1), 10);
        $slider = $this->getSlider();
        $pathSlider = $this->get('kernel')->getImagesPathAlone();
        return $this->render('AcmeStoreBundle:llibreria:Searchs.html.twig', array('pathSlider' => $pathSlider, 'slider' => $slider, 'pagination' => $pagination,
                    'pathllibre' => $pathllibre, 'pathlocal' => $pathServer, 'body' => 'searchs'
        ));
    }

    public function presentacioAction() {

        $em = $this->getDoctrine()->getManager();


        $query = $em->createQuery('SELECT n from AcmeStoreBundle:Presentacio n order by n.dataEntrada DESC');

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $this->get('request')->query->get('page', 1), 12);
        $path = $this->get('kernel')->getImagesPath('presentacio');
        $pathServer = $this->get('kernel')->getServerPath();
        $slider = $this->getSlider();
        $pathSlider = $this->get('kernel')->getImagesPathAlone();
        return $this->render('AcmeStoreBundle:llibreria:Presentacio.html.twig', array(
                    'pathSlider' => $pathSlider, 'slider' => $slider, 'pagination' => $pagination, 'path' => $path, 'pathlocal' => $pathServer, 'body' => 'presentacio'
        ));
    }

    public function establimentsAction() {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT n from AcmeStoreBundle:Foto n order by n.id DESC');


        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $this->get('request')->query->get('page', 1), 10);
        $path = $this->get('kernel')->getImagesPath('foto');

        $result = $em->createQuery('SELECT n from AcmeStoreBundle:establiments n ')->setMaxResults(1)->getResult();

        //echo print_r($result);
        $pathServer = $this->get('kernel')->getServerPath();
        $slider = $this->getSlider();
        $pathSlider = $this->get('kernel')->getImagesPathAlone();




        return $this->render('AcmeStoreBundle:llibreria:Establiments.html.twig', array(
                    'pathSlider' => $pathSlider, 'pathfoto' => $pathSlider, 'slider' => $slider, 'pagination' => $pagination, 'establiment' => $result, 'path' => $path, 'pathlocal' => $pathServer, 'body' => 'establiments'
        ));
    }

    private function getSlider() {

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT n from AcmeStoreBundle:Slider n ');
        $sliders = $query->getResult();
        return $sliders;
    }

}