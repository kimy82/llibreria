<?php
namespace Acme\StoreBundle\Forms;

class UploadForm
{
	
	protected $separator;
	
	
	protected $attachment;

	
    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;
    
        return $this;
    }

   
    public function getAttachment()
    {
        return $this->attachment;
    }
    
	public function setSeparator($separator)
    {
        $this->separator = $separator;
    
        return $this;
    }

   
    public function getSeparator()
    {
        return $this->separator;
    }

    
}