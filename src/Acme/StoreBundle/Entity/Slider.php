<?php
// src/Acme/StoreBundle/Entity/Llibre.php
namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="slider")
 */
class Slider
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
    protected $tablePath='slider';
    
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $attachment;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $description;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $descriptioner;
	
	
	
   

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
     * Set tablePath
     *
     * @param string $tablePath
     * @return Slider
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
     * Set attachment
     *
     * @param string $attachment
     * @return Slider
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
     * Set description
     *
     * @param string $description
     * @return Slider
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

     /**
     * Set description
     *
     * @param string $description
     * @return Slider
     */
    public function setDescriptioner($descriptioner)
    {
        $this->descriptioner = $descriptioner;
    
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
     * Get description
     *
     * @return string 
     */
    public function getDescriptioner()
    {
        return $this->descriptioner;
    }
    
}