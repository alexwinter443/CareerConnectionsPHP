<?php

namespace App\Services\Business;
use App\Services\Data\DatabaseConnection;
use Illuminate\Support\Facades\Log;
use App\Services\Models\User;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen Alex V.
 * UserDataService class
 *  Jan/22nd/20
 * This class is working as database service for CRUD.
 * */
class UserDataService{
    
    //Login function. The function will open a coonnection to the database. 
    //Select a record where email and password equal to the attributes of email and password in user object.
    function userLogin($user){
        //Open connection
        $db = new DatabaseConnection();
        //Query to the database
        $sql_query = "SELECT * FROM cst_256_users WHERE  email = '".$user->getEmail()."' AND password = '".$user->getPassword()."'";
        //Get connection
        $Connection = $db->getConnection();
        //Execute the query for a result
        $result = $Connection->query($sql_query);
        //Return the result
        return $result;
        
    }
    //user Register function.
    //Create a user record into the database using $user attributes.
    function userRegister($user){
        //Open Database connection
        $db = new DatabaseConnection();
        //Query to insert database 
        $sql = "INSERT INTO cst_256_users (firstname, lastname, email, password) 
                VALUES('".$user->getFirstName()."'
                      ,'".$user->getLastName()."'
                      ,'".$user->getEmail()."'
                      ,'".$user->getPassword()."')";
        if($db->getConnection()->query($sql)===true){
            Log::info("Successfully Registered User");
           return view('/login');
        }else{
           Log::info("Could Not Register User");
           return view('register');
        }
    }
    function adminViewProfile($user){
        //Open Database connection
        $db = new DatabaseConnection();
        //Query to the database
        $sql_query = "SELECT * FROM cst_256_users WHERE  email = '".$user->getEmail()."'";
        //Get connection
        $Connection = $db->getConnection();
        //Execute the query for a result
        $result = $Connection->query($sql_query);
        //Return the result
        return $result;
    }
    
    function userProfile($user)
    {
        // Open Database connection
        $db = new DatabaseConnection();
        // Query to insert database
        $sql = "INSERT INTO cst_256_users (firstname, lastname, dob, address, phone, email, career, skills)
                VALUES('" . $user->getFirstName() . "'
                      ,'" . $user->getLastName() . "'
                      ,'" . $user->getDOB() . "'
                      ,'" . $user->getAddress() . "'
                      ,'" . $user->getPhone() . "'
                      ,'" . $user->getEmail() . "'
                      ,'" . $user->getCareer() . "'
                      ,'" . $user->getSkills() . "')";
        if ($db->getConnection()->query($sql) === true) {
            return view('home');
        } else {
            return view('myprofile');
        }
    }
    
    /// Return 1 user profile
    function viewProfile($userModel){
        // get userID from the form we submitted
        $userID = $userModel->getId();
        //Open Database connection
        $db = new DatabaseConnection();
        //Query to the database
        $sql_query = "SELECT id, firstname, lastname, dob, address, phone, email, career, skills FROM cst_256_users where id = '" .$userID. "'";
        //Get connection
        $Connection = $db->getConnection();
        //run sql query
        $result = mysqli_query($Connection, $sql_query);
        // fetch row result
        $row = mysqli_fetch_row($result);
        // close connection
        $Connection->close();
        //Return the result
        return $row;
    }
    
    
    function viewMyProfile($userModel){
        // get userID from the form we submitted
        $userEmail = $userModel->getEmail();
        //Open Database connection
        $db = new DatabaseConnection();
        //Query to the database
        $sql_query = "SELECT id, firstname, lastname, dob, address, phone, email, career, skills FROM cst_256_users where email = '" . $userEmail . "'";
        //Get connection
        $Connection = $db->getConnection();
        //run sql query
        $result = mysqli_query($Connection, $sql_query);
        // fetch row result
        $row = mysqli_fetch_row($result);
        // close connection
        $Connection->close();
        //Return the result
        return $row;
    }
    
    function updateProfile($userModel){
        //$userModel = new User();
        $userid = $userModel->getId();
        $firstName = $userModel->getFirstName();
        $lastName = $userModel->getLastName();
        $phone = $userModel->getPhone();
        $address = $userModel->getAddress();
        $email = $userModel->getEmail();
        $dob = $userModel->getDob();
        $career = $userModel->getCareer();
        $skills = $userModel->getSkills();
        
        $db = new DatabaseConnection();
        // id = '" .$userID. "'";
        $sql_query = "Update cst_256_users SET firstname = '" . $firstName . "', lastname = '" . $lastName . 
            "', dob = '" . $dob . "', address = '" . $address . "', phone = '" . $phone . "', email = '" . $email . 
            "', career = '" . $career . "', skills = '" . $skills . "' WHERE id = '" . $userid . "'";
        
        $Connection = $db->getConnection();
        
        $result = mysqli_query($Connection, $sql_query);
        
        if($result){
            $Connection->close();
            return true;
        }
        else{
            $Connection->close();
            return false;
        }
        
    }
    
}
