<?php
// src/Acme/StoreBundle/Forms/LlibreForm.php
namespace Acme\StoreBundle\Forms;

class Search
{


	
	protected $titol;


	protected $description;

	
	protected $category;
	
	
	protected $path;

	
	

 
    public function setTitol($titol)
    {
        $this->titol = $titol;
    
        return $this;
    }

 
    public function getTitol()
    {
        return $this->titol;
    }

   public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

 
    public function getPath()
    {
        return $this->path;
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

 
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

  
    public function getCategory()
    {
        return $this->category;
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