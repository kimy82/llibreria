<?php
// src/Acme/StoreBundle/Forms/LlibreForm.php
namespace Acme\StoreBundle\Forms;

class GaleriaForm
{
	protected $date_entrada;

	
	protected $titol;

	
	protected $subtitol;


	protected $description;
	
	
	protected $attachment;

	
	
  public function setDateEntrada($dateEntrada)
    {
        $this->date_entrada = $dateEntrada;
    
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

   
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

  
    public function getDescription()
    {
        return $this->description;
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