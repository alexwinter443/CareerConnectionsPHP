<?php

namespace App\Services\Models;
/**
 *  CST-256 Database Application Programming 3
 * @author Vien Nguyen
 * Feb/27nd/21
 * This is an Affinity class which will be used affinity features
 */
class Group{
    //Groups' properties
    private $id;
    private $groupName;
    private $description;
    private $isActive;
    
    //Class default constructor
    public function __construct( $id, $groupName, $description, $isActive) {
        $this->id=$id;
        $this->groupName=$groupName;
        $this->description=$description;
        $this->isActive=$isActive;
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $affinityName
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }


  
}