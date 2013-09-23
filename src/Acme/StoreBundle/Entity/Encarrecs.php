<?php
// src/Acme/StoreBundle/Entity/Llibre.php
namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="encarrecs")
 */
class Encarrecs
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
    protected $poblacio;
    
     /**
     * @ORM\Column(type="string", length=100)
     */
    protected $adreca;
    
     /**
     * @ORM\Column(type="string", length=100)
     */
    protected $codi;
   
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $email;

    /**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $tel;
	
	/**
     * @ORM\Column(type="integer")
     */
    protected $enviat;
	
    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $llibre;
	

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
     * @return Encarrecs
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
     * Set poblacio
     *
     * @param string $poblacio
     * @return Encarrecs
     */
    public function setPoblacio($poblacio)
    {
        $this->poblacio = $poblacio;
    
        return $this;
    }

    /**
     * Get poblacio
     *
     * @return string 
     */
    public function getPoblacio()
    {
        return $this->poblacio;
    }

    /**
     * Set adreca
     *
     * @param string $adreca
     * @return Encarrecs
     */
    public function setAdreca($adreca)
    {
        $this->adreca = $adreca;
    
        return $this;
    }

    /**
     * Get adreca
     *
     * @return string 
     */
    public function getAdreca()
    {
        return $this->adreca;
    }

    /**
     * Set codi
     *
     * @param string $codi
     * @return Encarrecs
     */
    public function setCodi($codi)
    {
        $this->codi = $codi;
    
        return $this;
    }

    /**
     * Get codi
     *
     * @return string 
     */
    public function getCodi()
    {
        return $this->codi;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Encarrecs
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param \DateTime $tel
     * @return Encarrecs
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }

    /**
     * Get tel
     *
     * @return \DateTime 
     */
    public function getTel()
    {
        return $this->tel;
    }

   
    /**
     * Set enviat
     *
     * @param integer $enviat
     * @return Encarrecs
     */
    public function setEnviat($enviat)
    {
        $this->enviat = $enviat;
    
        return $this;
    }

    /**
     * Get enviat
     *
     * @return integer 
     */
    public function getEnviat()
    {
        return $this->enviat;
    }

    /**
     * Set llibre
     *
     * @param string $llibre
     * @return Encarrecs
     */
    public function setLlibre($llibre)
    {
        $this->llibre = $llibre;
    
        return $this;
    }

    /**
     * Get llibre
     *
     * @return string 
     */
    public function getLlibre()
    {
        return $this->llibre;
    }
}