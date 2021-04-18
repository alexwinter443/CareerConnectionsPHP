<?php

// Vien
// Date: 3/14
// professor hughes
// this is my own work
namespace App\Services\Models;

class JobPostingModel
{

    private $jobID;

    private $title;

    private $description;
    
    private $wage;
    
    private $location;
    
    private $requirements;
    
    private $jobType;

    /**
     * @return mixed
     */
    public function getWage()
    {
        return $this->wage;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getRequirements()
    {
        return $this->requirements;
    }

    /**
     * @return mixed
     */
    public function getJobType()
    {
        return $this->jobType;
    }

    /**
     * @param mixed $wage
     */
    public function setWage($wage)
    {
        $this->wage = $wage;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @param mixed $requirements
     */
    public function setRequirements($requirements)
    {
        $this->requirements = $requirements;
    }

    /**
     * @param mixed $jobType
     */
    public function setJobType($jobType)
    {
        $this->jobType = $jobType;
    }

    /**
     *
     * @return mixed
     */
    public function __construct()
    {}

    public function getJobID()
    {
        return $this->jobID;
    }

    /**
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @param mixed $jobID
     */
    public function setJobID($jobID)
    {
        $this->jobID = $jobID;
    }

    /**
     *
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     *
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}
    
    
   