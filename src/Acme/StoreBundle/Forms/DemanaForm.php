<?php
// src/Acme/StoreBundle/Forms/LlibreForm.php
namespace Acme\StoreBundle\Forms;

class DemanaForm
{
    protected $name;

    protected $poblacio;
    
    protected $adreca;
    
    protected $codi;
    
    protected $email;

    protected $tel;
    
    protected $llibre;
	
  public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    
    public function getName()
    {
        return $this->name;
    }

    
    public function setPoblacio($poblacio)
    {
        $this->poblacio = $poblacio;
    
        return $this;
    }

   
    public function getPoblacio()
    {
        return $this->poblacio;
    }

    
    public function setAdreca($adreca)
    {
        $this->adreca = $adreca;
    
        return $this;
    }

    
    public function getAdreca()
    {
        return $this->adreca;
    }

    
    public function setCodi($codi)
    {
        $this->codi = $codi;
    
        return $this;
    }

    
    public function getCodi()
    {
        return $this->codi;
    }

    
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

   
    public function getEmail()
    {
        return $this->email;
    }

   
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }

   
    public function getTel()
    {
        return $this->tel;
    }

    
    public function setLlibre($llibre)
    {
        $this->llibre = $llibre;
    
        return $this;
    }

   
    public function getLlibre()
    {
        return $this->llibre;
    }
}