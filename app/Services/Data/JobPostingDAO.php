<?php
// Alex, Anh, Vien
// Date: 3/14
// Professor hughes
// this is our own work
namespace App\Services\Data;

class JobPostingDAO
{

    public function __construct()
    {}

    // reads all job postings
    public function readAll()
    {
        // create DB Object
        $databaseConnection = new DatabaseConnection();
        // select all job listings
        $sql_query = "SELECT * FROM job_posting";
        // Get connection
        $conn = $databaseConnection->getConnection();
        // Execute the query for a result
        $result = mysqli_query($conn, $sql_query);
        $conn->close();
        return $result;
    }

    // create job listing
    public function create($jobPosting)
    {
        // Open Database connection
        $db = new DatabaseConnection();
        // Query to insert database
        $sql = "INSERT INTO job_posting (title, description)
                VALUES('" . $jobPosting->getTitle() . "'
                      ,'" . $jobPosting->getDescription() . "')";

        // if sql stmt is executed
        if ($db->getConnection()->query($sql) === true) {
            return true;
        } else {
            return false;
        }
    }

    // search job listing
    public function searchJob($jobPosting)
    {
        // get job title 
        $key = $jobPosting->getTitle();
        $databaseConnection = new DatabaseConnection();
        // sql query finds job title that matches key
        $sql_query = "SELECT * FROM job_posting WHERE title LIKE CONCAT('%', '".$key."','%') OR description LIKE CONCAT('%', '".$key."','%') ";
        // Get connection
        $conn = $databaseConnection->getConnection();
        // Execute the query for a result
        $result = mysqli_query($conn, $sql_query);
        $conn->close();
        return $result;
    }
    
    // used to retrive our row result from our database
    public function viewDetails($jobModel){
        // get jobID from the form we submitted
        $jobId = $jobModel->getJobID();
        // establish connection to db
        $databaseConnection = new DatabaseConnection();
        
        // "DELETE FROM job_history WHERE jobID = '" . $userId . "'"
        $sql_query = "SELECT * FROM job_posting where ID = '" . $jobId . "'";
        
        $conn = $databaseConnection->getConnection();
        // run sql query
        $result = mysqli_query($conn, $sql_query);
        // fetch row result
        $row = mysqli_fetch_row($result);
        // close connection 
        $conn->close();
        // return row result
        return $row;
        
        
    }
    
    public function deletePost($jobModel){
        // get jobID from the form we submitted
        $jobId = $jobModel->getJobID();
        // establish connection to db
        $databaseConnection = new DatabaseConnection();
        
        // "DELETE FROM job_history WHERE jobID = '" . $userId . "'"
//         $sql_query = "SELECT * FROM job_posting where ID = '" . $jobId . "'";
        $sql = "DELETE FROM job_posting where ID = '" . $jobId . "' ";
        
        $conn = $databaseConnection->getConnection();
        // run sql query
        $result = mysqli_query($conn, $sql);
        // fetch row result
        // close connection
        $conn->close();
        // return row result
        
        
    }

}

