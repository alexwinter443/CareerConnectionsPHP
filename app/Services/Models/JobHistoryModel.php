<?php
namespace App\Services\Models;

class JobHistoryModel{
    private $jobID;
    private $title;
    private $position;
    private $dateStart;
    private $dateEnd;
    private $skills;
    private $schools;
    private $highestDegree;
    private $isDeleted;
    
    /**
     * @return mixed
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * @param mixed $isDeleted
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
    }

    public function __construct()
    {
        
    }
    /**
     * @return mixed
     */
    public function getJobID()
    {
        return $this->jobID;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return mixed
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * @return mixed
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @return mixed
     */
    public function getSchools()
    {
        return $this->schools;
    }

    /**
     * @return mixed
     */
    public function getHighestDegree()
    {
        return $this->highestDegree;
    }

    /**
     * @param mixed $jobID
     */
    public function setJobID($jobID)
    {
        $this->jobID = $jobID;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @param mixed $dateStart
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    }

    /**
     * @param mixed $dateEnd
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
    }

    /**
     * @param mixed $skills
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    /**
     * @param mixed $schools
     */
    public function setSchools($schools)
    {
        $this->schools = $schools;
    }

    /**
     * @param mixed $highestDegree
     */
    public function setHighestDegree($highestDegree)
    {
        $this->highestDegree = $highestDegree;
    }

    
}