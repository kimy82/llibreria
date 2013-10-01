<?php
// src/Acme/StoreBundle/Forms/LlibreForm.php
namespace Acme\StoreBundle\Forms;

class SliderForm
{
	
	
	
	protected $attachment;
	
	protected $description;
	protected $descriptioner;

	
	
	
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

    
     public function setDescriptioner($descriptioner)
    {
        $this->descriptioner = $descriptioner;
    
        return $this;
    }

    public function getDescriptioner()
    {
        return $this->descriptioner;
    }

   
}