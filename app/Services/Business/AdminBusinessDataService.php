<?php
namespace App\Services\Business;

use App\Services\Data\AdminManagementDAO;
use App\Services\Data\GroupDAO;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen
 * AdminBusinessDataService
 *  Jan/30/20
 * This class is working with database interacting for admin services
 */
class AdminBusinessDataService implements DataAccessInterface
{

    //CRUD methods
    public function read()
    {
      $adminManagementDAO = new AdminManagementDAO();
      return $adminManagementDAO->readAll();
    }

    public function create($obj)
    {}

    public function update($obj)
    {}

    public function delete($obj)
    {
        $adminManagementDAO = new AdminManagementDAO();
        return $adminManagementDAO->delete($obj);
    }
    public function ChangeStatus($obj)
    {
        $adminManagementDAO = new AdminManagementDAO();
        return $adminManagementDAO->change($obj);
    }
    
    public function getAllGroup(){
        $groupDAO = new GroupDAO();
        return $groupDAO->getAllGroup();
    }

    public function deactiveGroup($groupId){
        $groupDAO = new GroupDAO();
        return $groupDAO->deactivateGroup($groupId);
    }
    
    public function deleteGroup($groupID){
        $groupDAO = new GroupDAO();
        return $groupDAO->deleteGroup($groupID);
    }
}

