<?php
namespace App\Services\Models;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen
 * Group member class
 *  Feb/27/21
 * This class is working on ground member services.
 */
class GroupMember
{
    //Declare class properties
    private $groupMemberID;
    private $userId;
    private $groupId;
    private $groupName;
    private $isActive;
    
    //Defalt constructor
    public function __construct($groupMemberID, $userId, $groupId, $groupName, $isActive){
        $this->groupMemberID = $groupMemberID;
        $this->userId = $userId;
        $this->groupId = $groupId;
        $this->groupName = $groupName;
        $this->isActive = $isActive;
    }
    /**
     * @return mixed
     */
    public function getGroupMemberID()
    {
        return $this->groupMemberID;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->groupId;
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
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $groupMemberID
     */
    public function setGroupMemberID($groupMemberID)
    {
        $this->groupMemberID = $groupMemberID;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @param mixed $groupId
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @param mixed $groupName
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }
}

