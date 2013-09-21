<?php
// src/Acme/StoreBundle/Entity/Llibre.php
namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="llibre")
 */
class Llibre
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;
    
     /**
     * @ORM\Column(type="string", length=100)
     */
    protected $autor;
    
     /**
     * @ORM\Column(type="string", length=100)
     */
    protected $category;
    
     /**
     * @ORM\Column(type="string", length=100)
     */
    protected $editorial;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $tablePath='llibre';
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $price;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
	 * @ORM\Column(type="date")
	 */
	protected $dateEntrada;
	
	 /**
     * @ORM\Column(type="text")
     */
    protected $attachment;
	
    /**
     * @ORM\OneToMany(targetEntity="Encarrecs", mappedBy="llibre")
     */
    protected $encarrecs;
     
    /**
	 * @ORM\Column(type="integer")
	 */
	protected $suggerir;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Llibre
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Llibre
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Llibre
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Set attachment
     *
     * @param string $attachment
     * @return Llibre
     */
    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;
    
        return $this;
    }

    /**
     * Get attachment
     *
     * @return string 
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * Set dateEntrada
     *
     * @param \DateTime $dateEntrada
     * @return Llibre
     */
    public function setDateEntrada($dateEntrada)
    {
        $this->dateEntrada = $dateEntrada;
    
        return $this;
    }

    /**
     * Get dateEntrada
     *
     * @return \DateTime 
     */
    public function getDateEntrada()
    {
        return $this->dateEntrada;
    }



    /**
     * Set tablePath
     *
     * @param string $tablePath
     * @return Llibre
     */
    public function setTablePath($tablePath)
    {
        $this->tablePath = $tablePath;
    
        return $this;
    }

    /**
     * Get tablePath
     *
     * @return string 
     */
    public function getTablePath()
    {
        return $this->tablePath;
    }

    /**
     * Set autor
     *
     * @param string $autor
     * @return Llibre
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    
        return $this;
    }

    /**
     * Get autor
     *
     * @return string 
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Llibre
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set editorial
     *
     * @param string $editorial
     * @return Llibre
     */
    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;
    
        return $this;
    }

    /**
     * Get editorial
     *
     * @return string 
     */
    public function getEditorial()
    {
        return $this->editorial;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->encarrecs = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add encarrecs
     *
     * @param \Acme\StoreBundle\Entity\Encarrecs $encarrecs
     * @return Llibre
     */
    public function addEncarrec(\Acme\StoreBundle\Entity\Encarrecs $encarrecs)
    {
        $this->encarrecs[] = $encarrecs;
    
        return $this;
    }

    /**
     * Remove encarrecs
     *
     * @param \Acme\StoreBundle\Entity\Encarrecs $encarrecs
     */
    public function removeEncarrec(\Acme\StoreBundle\Entity\Encarrecs $encarrecs)
    {
        $this->encarrecs->removeElement($encarrecs);
    }

    /**
     * Get encarrecs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEncarrecs()
    {
        return $this->encarrecs;
    }

    /**
     * Set suggerir
     *
     * @param integer $suggerir
     * @return Llibre
     */
    public function setSuggerir($suggerir)
    {
        $this->suggerir = $suggerir;
    
        return $this;
    }

    /**
     * Get suggerir
     *
     * @return integer 
     */
    public function getSuggerir()
    {
        return $this->suggerir;
    }
}