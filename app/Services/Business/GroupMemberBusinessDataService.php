<?php
namespace App\Services\Business;

use App\Services\Data\GroupMemberDAO;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen
 * GroupMemberBusinessDataService
 *  Feb/26/21
 * This class is inmplement DataAccessInterface for GroupMember CRUD methods
 */
class GroupMemberBusinessDataService implements DataAccessInterface
{
    public function read()
    {}

    public function create($member)
    {
        $groupMemberDAO = new GroupMemberDAO();
        $groupMemberDAO->createGroupMember($member);
    }

    public function update($obj)
    {}

    public function changeStatus($obj)
    {}

    public function delete($obj)
    {}
    public function leaveGroup($member)
    {
        $groupMemberDAO = new GroupMemberDAO();
        $groupMemberDAO->leaveGroup($member);
    }
    

}

