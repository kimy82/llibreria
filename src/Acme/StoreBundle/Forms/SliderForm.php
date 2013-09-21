<?php
// src/Acme/StoreBundle/Forms/LlibreForm.php
namespace Acme\StoreBundle\Forms;

class SliderForm
{
	
	
	
	protected $attachment;
	
	protected $description;

	
	
	
	public function setAttachment($attachment)
    {
        $this->attachment = $attachment;
    
        return $this;
    }

 
    public function getAttachment()
    {
        return $this->attachment;
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