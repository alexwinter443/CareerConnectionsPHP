<?php
namespace App\Services\Business;

use App\Services\Data\GroupDAO;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen
 * GroupBusinessDataService
 *  Feb/26/21
 * This class is inmplement DataAccessInterface for Group CRUD methods
 */
class GroupBusinessDataService implements DataAccessInterface
{
    public function read()
    {
        $groupDAO = new GroupDAO();
        return $groupDAO->readAll();
    }

    public function getJoinedGroup($userId)
    {
        $groupDAO = new GroupDAO();
        return $groupDAO->getJoinedGroup($userId);
    }
    
    
    public function create($obj)
    {
        $affinityDAO = new GroupDAO();
        return $affinityDAO->create($obj);
    }

    public function update($obj)
    {}

    public function changeStatus($obj)
    {}

    public function delete($obj)
    {}

    
}

