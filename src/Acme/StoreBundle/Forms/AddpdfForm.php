<?php
// src/Acme/StoreBundle/Forms/LlibreForm.php
namespace Acme\StoreBundle\Forms;

class AddpdfForm
{
	
	protected $attachment;
        protected $name;

	
    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;
    
        return $this;
    }

   
    public function getAttachment()
    {
        return $this->attachment;
    }

    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

   
    public function getName()
    {
        return $this->name;
    }
    
}