<?php
// src/Acme/StoreBundle/Forms/LlibreForm.php
namespace Acme\StoreBundle\Forms;

class FotoForm
{
	
	
	protected $description;
	
	
	protected $attachment;

	
	
 
   
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