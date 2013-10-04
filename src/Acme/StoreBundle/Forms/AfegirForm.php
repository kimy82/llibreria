<?php
// src/Acme/StoreBundle/Forms/LlibreForm.php
namespace Acme\StoreBundle\Forms;

class AfegirForm
{
    protected $name;

    protected $date;
    
    protected $descripcio;
    
    protected $attachment;

    
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    
  	public function getDescripcio()
    {
        return $this->descripcio;
    }
    public function setDescripcio($descripcio)
    {
        $this->descripcio = $descripcio;
    }

    public function getDate()
    {
        return $this->date;
    }
    public function setDate(\DateTime $date = null)
    {
        $this->date = $date;
    }
    
    public function getAttachment()
    {
        return $this->attachment;
    }
    
    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;
    }
    
}