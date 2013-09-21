<?php
namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="galeria")
 */
class Galeria
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="date")
	 */
	protected $dataEntrada;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $titol;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $subtitol;

	/**
	 * @ORM\Column(type="text")
	 */
	protected $description;

	/**
	 * @ORM\Column(type="string", length=100)
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
     * Set titol
     *
     * @param string $titol
     * @return Noticia
     */
    public function setTitol($titol)
    {
        $this->titol = $titol;
    
        return $this;
    }

    /**
     * Get titol
     *
     * @return string 
     */
    public function getTitol()
    {
        return $this->titol;
    }

    /**
     * Set subtitol
     *
     * @param string $subtitol
     * @return Noticia
     */
    public function setSubtitol($subtitol)
    {
        $this->subtitol = $subtitol;
    
        return $this;
    }

    /**
     * Get subtitol
     *
     * @return string 
     */
    public function getSubtitol()
    {
        return $this->subtitol;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Noticia
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
     * @return Noticia
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
     * Set dataEntrada
     *
     * @param \DateTime $dataEntrada
     * @return Noticia
     */
    public function setDataEntrada($dataEntrada)
    {
        $this->dataEntrada = $dataEntrada;
    
        return $this;
    }

    /**
     * Get dataEntrada
     *
     * @return \DateTime 
     */
    public function getDataEntrada()
    {
        return $this->dataEntrada;
    }
}