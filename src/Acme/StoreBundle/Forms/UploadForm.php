<?php
namespace Acme\StoreBundle\Forms;

class UploadForm
{
	
	protected $separator;
	
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