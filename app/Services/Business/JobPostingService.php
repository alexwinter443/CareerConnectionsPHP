<?php
namespace App\Services\Business;

use App\Services\Data\JobPostingDAO;
use App\Services\Data\DatabaseConnection;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen - Anh Le
 * AdminBusinessDataService
 *  Jan/30/20
 * This class is working with database interacting for admin services
 */
class JobPostingService implements DataAccessInterface
{
    
    // reads all jobs
    public function read()
    {
        // return job DAO method
        $jobPostingDAO = new JobPostingDAO();
        return $jobPostingDAO->readAll();
    }
    //search the job from posting.
    
    // create job portfolio
    public function searchJob($jobPosting)
    {
        // return DAO method
        $jobPostingDAO = new JobPostingDAO();
        return $jobPostingDAO->searchJob($jobPosting);
    }
    public function update($obj)
    {}

    public function changeStatus($obj)
    {}

    public function delete($obj)
    {
        $jobPostingDAO = new JobPostingDAO();
        return $jobPostingDAO->deletePost($obj);
        
    }
    
    // create job post
    public function create($obj)
    {
        $jobPostingDAO = new JobPostingDAO();
        return $jobPostingDAO->create($obj);
        
    }
    
    // view job listing details
    public function view($obj){
        $JobDAO = new JobPostingDAO();
        // return method
        return $JobDAO->viewDetails($obj);
        
    }


  
  
    
    
}