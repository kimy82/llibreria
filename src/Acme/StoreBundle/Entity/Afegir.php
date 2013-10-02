<?php
// src/Acme/StoreBundle/Entity/Llibre.php
namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="afegir")
 */
class Afegir
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

}