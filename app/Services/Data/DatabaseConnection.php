<?php 


namespace App\Services\Data;
/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen
 * Database class
 *  Jan/22nd/20
 * This class is responsible for communicating to the database server and connect to the database
 * */
class DatabaseConnection{
    //Server properties
    private $dbservername = "phtfaw4p6a970uc0.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306";
    private $dbusername = "jmatgpup260fcqm7";
    private $dbpassword = "hkll6pdswwrox591";
    private $dbname = "tehqysltlkccm9g6";
    
    //Get connection method will open a connection to the server.
    function getConnection(){
        $conn = new \mysqli($this->dbservername, $this->dbusername,$this->dbpassword, $this->dbname);
        
        //Return the connection result
        if($conn->connect_error){
            echo("Connection failed " .$conn->connect_error . "<br>");   
        }else{
            return $conn;
        }
    }
}