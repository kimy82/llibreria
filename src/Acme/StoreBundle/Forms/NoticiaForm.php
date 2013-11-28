<?php
// src/Acme/StoreBundle/Forms/LlibreForm.php
namespace Acme\StoreBundle\Forms;

class NoticiaForm
{
	protected $date_entrada;

	
	protected $titol;

	
	protected $subtitol;
        
        
        protected $video;


	protected $description;

	
	protected $novetat;


	protected $portada;

	
	protected $data_fi;
	
	
	protected $attachment;

	
/*	
  public function setDateEntrada($dateEntrada)
    {
        $this->date_entrada = $dateEntrada;
    
        return $this;
    }
    */
     public function setDateEntrada($dateEntrada)
    {
         $this->date_entrada = new \DateTime();

        return $this;
    }


    public function getDateEntrada()
    {
        return $this->date_entrada;
    }

 
    public function setTitol($titol)
    {
        $this->titol = $titol;
    
        return $this;
    }

 
    public function getTitol()
    {
        return $this->titol;
    }

 
    public function setSubtitol($subtitol)
    {
        $this->subtitol = $subtitol;
    
        return $this;
    }


    public function getSubtitol()
    {
        return $this->subtitol;
    }
    
    public function setVideo($video)
    {
        $this->video = $video;
    
        return $this;
    }


    public function getVideo()
    {
        return $this->video;
    }
   
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

  
    public function getDescription()
    {
        return $this->description;
    }

 
    public function setNovetat($novetat)
    {
        $this->novetat = $novetat;
    
        return $this;
    }

  
    public function getNovetat()
    {
        return $this->novetat;
    }

  
    public function setPortada($portada)
    {
        $this->portada = $portada;
    
        return $this;
    }


    public function getPortada()
    {
        return $this->portada;
    }

  
    public function setDataFi($dataFi)
    {
        $this->data_fi = $dataFi;
    
        return $this;
    }

   
    public function getDataFi()
    {
        return $this->data_fi;
    }
    

    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;
    
        return $this;
    }

   
    public function getAttachment()
    {
        return $this->attachment;
    }

    
}