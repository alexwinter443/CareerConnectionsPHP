<?php
namespace App\Services\Data;

class AdminManagementDAO
{
    
    public function readAll()
    {
        $databaseConnection = new DatabaseConnection();;
        $sql_query = "SELECT * FROM cst_256_users";
        //Get connection
        $conn = $databaseConnection->getConnection();
        //Execute the query for a result
        $result = mysqli_query($conn, $sql_query);
        $conn->close();
        return $result;
        
    }
    
    public function create($obj)
    {}
    
    public function update($obj)
    {}
    
    public function delete($userId)
    {
        $databaseConnection = new DatabaseConnection();
        $sql_query = "DELETE FROM cst_256_users WHERE id = '".$userId."'";
        
        $conn = $databaseConnection->getConnection();
        mysqli_query($conn, $sql_query);
        $conn->close();
    }
    
    public function change($userId){
        $databaseConnection = new DatabaseConnection();
        $sql_query =  "";
        
        $sql_query_status = "SELECT isDeleted FROM cst_256_users WHERE id = '".$userId."'";
        
        $conn = $databaseConnection->getConnection();
        $result = mysqli_query($conn, $sql_query_status);
      
        $status = mysqli_fetch_assoc($result);
        $isDeleted = $status['isDeleted'];
        
        if($isDeleted === '1'){
            $status = 0;
            $sql_query = "UPDATE cst_256_users SET isDeleted = '".$status."' WHERE id = '".$userId."'";
        }else{
            $status = 1;
            $sql_query = "UPDATE cst_256_users SET isDeleted = '".$status."' WHERE id = '".$userId."'";
        }
        $conn = $databaseConnection->getConnection();
        mysqli_query($conn, $sql_query);
        $conn->close();
    }
}

