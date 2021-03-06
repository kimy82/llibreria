<?php
namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="addpdf")
 */
class Addpdf
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
	protected $attachment;
        
        /**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $name;


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
     * Set attachment
     *
     * @param string $attachment
     * @return Addpdf
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
     * Set attachment
     *
     * @param string $attachment
     * @return Addpdf
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get attachment
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

  
}