<?php
namespace App\Services\Models;


Class JobPostingModelDTO implements \JsonSerializable{
    
    private $data;

    public function __construct($data){

        $this->data = $data;
    }
    
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
         
    }
    
    
    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
    
    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    
    
    
    
    
    
    
    
    
}