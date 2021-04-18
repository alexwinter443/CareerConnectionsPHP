<?php
namespace App\Services\Data;

use App\Services\Models\Group;
use Carbon\Exceptions\Exception;

class GroupDAO
{
    public function __construct()
    {}
    
    public function readAll()
    {
        $databaseConnection = new DatabaseConnection();;
        $sql_query = "SELECT * FROM cst_256_group WHERE isActive = true";
        //Get connection
        $conn = $databaseConnection->getConnection();
        //Execute the query for a result
        $result = mysqli_query($conn, $sql_query);
        $conn->close();
        return $result;
    }
    
    public function getJoinedGroup($userID)
    {
        $databaseConnection = new DatabaseConnection();;
        $sql_query = "SELECT * FROM member m join cst_256_group g ON m.GroupID = g.ID WHERE userID = '".$userID."' AND m.isActive = true AND g.isActive = true";
        //Get connection
        $conn = $databaseConnection->getConnection();
        //Execute the query for a result
        $result = mysqli_query($conn, $sql_query);
        $conn->close();
        return $result;
    }
    
    
    
    public function getAllGroup()
    {
        $databaseConnection = new DatabaseConnection();;
        $sql_query = "SELECT * FROM cst_256_group";
        //Get connection
        $conn = $databaseConnection->getConnection();
        //Execute the query for a result
        $result = mysqli_query($conn, $sql_query);
      
        $conn->close();
       
        return $result;
    }
    public function create(Group $group)
    {
        try {
            $databaseConnection = new DatabaseConnection();
            // Query to the database
            $sql_query = "INSERT INTO cst_256_group
                                (GroupName, Description, isActive)
                              VALUES('{$group->getGroupName()}','{$group->getDescription()}', '{$group->getIsActive()}')";
            $conn = $databaseConnection->getConnection();
            // Execute the query for a result
            if (mysqli_query($conn, $sql_query)) {
                $conn->close();
                return true;
            } else {
                $conn->close();
                return false;
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }
    
    public function update($obj)
    {}
    
    public function delete($userId)
    {

    }
    
    public function change($userId){

    }
    public function deleteGroup($groupID){
        $databaseConnection = new DatabaseConnection();
        $sql_query = "DELETE FROM cst_256_group WHERE ID = '".$groupID."'";
        $conn = $databaseConnection->getConnection();
        $result = mysqli_query($conn, $sql_query);
        
        if($result == true){
            $conn->close();
            return true;
        }
        else{
            $conn->close();
            return false;
        }
    }
    public function deactivateGroup($groupId){
            $databaseConnection = new DatabaseConnection();
            $sql_query =  "";
    
            $sql_query_status = "SELECT isActive FROM cst_256_group WHERE ID = '".$groupId."'";
    
            $conn = $databaseConnection->getConnection();
            $result = mysqli_query($conn, $sql_query_status);
    
            $status = mysqli_fetch_assoc($result);
            $isActive = $status['isActive'];
    
            if($isActive){
                $status = false;
                $sql_query = "UPDATE cst_256_group SET isActive = '".$status."' WHERE ID = '".$groupId."'";
            }else{
                $status = true;
                $sql_query = "UPDATE cst_256_group SET isActive = '".$status."' WHERE ID = '".$groupId."'";
            }
            $conn = $databaseConnection->getConnection();
            mysqli_query($conn, $sql_query);
            $conn->close();
    }
}

