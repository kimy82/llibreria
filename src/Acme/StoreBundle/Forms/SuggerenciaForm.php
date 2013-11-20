<?php
// src/Acme/StoreBundle/Forms/LlibreForm.php
namespace Acme\StoreBundle\Forms;

class SuggerenciaForm
{
    protected $name;

    protected $date;
    
    protected $descripcio;
    
    protected $price;
    
    protected $attachment;

    protected $autor;
    
    protected $link;
    
    protected $category;
    
    protected $editorial;
    
    protected $suggerir;
    
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
    
  	public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
 public function setAutor($autor)
    {
        $this->autor = $autor;
    
        return $this;
    }

    public function getAutor()
    {
        return $this->autor;
    }
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    public function getLink()
    {
        return $this->link;
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
    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;
    
        return $this;
    }
    
    public function getEditorial()
    {
        return $this->editorial;
    }
    
    public function setSuggerir($suggerir)
    {
        $this->suggerir = $suggerir;
    
        return $this;
    }
    public function getSuggerir()
    {
        return $this->suggerir;
    }
}