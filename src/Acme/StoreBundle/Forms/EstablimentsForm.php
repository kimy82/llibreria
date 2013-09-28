<?php
// src/Acme/StoreBundle/Forms/LlibreForm.php
namespace Acme\StoreBundle\Forms;

class EstablimentsForm
{

	
	protected $titol;



	protected $description;

	

	
	
 
    public function setTitol($titol)
    {
        $this->titol = $titol;
    
        return $this;
    }

 
    public function getTitol()
    {
        return $this->titol;
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
    
}