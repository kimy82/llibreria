<?php

namespace Proxies\__CG__\Acme\StoreBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Noticia extends \Acme\StoreBundle\Entity\Noticia implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setTitol($titol)
    {
        $this->__load();
        return parent::setTitol($titol);
    }

    public function getTitol()
    {
        $this->__load();
        return parent::getTitol();
    }

    public function setSubtitol($subtitol)
    {
        $this->__load();
        return parent::setSubtitol($subtitol);
    }

    public function getSubtitol()
    {
        $this->__load();
        return parent::getSubtitol();
    }

    public function setDescription($description)
    {
        $this->__load();
        return parent::setDescription($description);
    }

    public function getDescription()
    {
        $this->__load();
        return parent::getDescription();
    }

    public function setNovetat($novetat)
    {
        $this->__load();
        return parent::setNovetat($novetat);
    }

    public function getNovetat()
    {
        $this->__load();
        return parent::getNovetat();
    }

    public function setPortada($portada)
    {
        $this->__load();
        return parent::setPortada($portada);
    }

    public function getPortada()
    {
        $this->__load();
        return parent::getPortada();
    }

    public function setAttachment($attachment)
    {
        $this->__load();
        return parent::setAttachment($attachment);
    }

    public function getAttachment()
    {
        $this->__load();
        return parent::getAttachment();
    }

    public function setDataEntrada($dataEntrada)
    {
        $this->__load();
        return parent::setDataEntrada($dataEntrada);
    }

    public function getDataEntrada()
    {
        $this->__load();
        return parent::getDataEntrada();
    }

    public function setDataFi($dataFi)
    {
        $this->__load();
        return parent::setDataFi($dataFi);
    }

    public function getDataFi()
    {
        $this->__load();
        return parent::getDataFi();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'dataEntrada', 'titol', 'subtitol', 'description', 'novetat', 'portada', 'dataFi', 'attachment');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}