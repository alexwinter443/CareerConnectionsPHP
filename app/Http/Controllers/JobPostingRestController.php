<?php
namespace App\Http\Controllers;

use App\Services\Business\JobPostingService;
use App\Services\Models\DTO;
use App\Services\Models\JobPostingModel;
use Illuminate\Http\Request;
use App\Services\Models\JobPostingModelDTO;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen Alex V. Anh
 * JobHistoryRestController class
 *  March 26
 * This class is working as Rest Controller
 * */
class JobPostingRestController extends Controller
{
    ///
    /// Create a job posting
    ///
    public function jobPosting(Request $request)
    {
        // Validate title and description
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        // Initiates a userDataService object
        $jobPostingService = new JobPostingService();
        // Initiates a User object
        $jobPosting = new JobPostingModel();
        // Set the properties for the user object
        $jobPosting->setTitle($request->input('title'));
        $jobPosting->setDescription($request->input('description'));
        
        // Return the new job history porfolio result
        $isInsertedSuccess = $jobPostingService->create($jobPosting);
        // check if job posting method was successful
        if ($isInsertedSuccess) {
            //create instance of service
            $jobPostingDataSerivce = new JobPostingService();
            // read all jobs
            $data = $jobPostingDataSerivce->read();
            
            // create empty array
            $JobPostingModels = Array();
            // populate array with data received from service
            while ($row = mysqli_fetch_assoc($data)) {
                array_push($JobPostingModels, $row);
            }
            // return view with all job listings array
            return view('ReadJobPosting')->with('JobPostingModels', $JobPostingModels);
        } else {
            // unsuccessul job creation
            return view('jobposting');
        }
    }
    
    ///
    /// Fetch all jobs from database
    ///
    public function ReadAllJobPosting(){
        
        // instantiate service
        $jobPostingDataSerivce = new JobPostingService();
        $data = $jobPostingDataSerivce->read();
        // fetch all jobs
        $JobPostingModels = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($JobPostingModels, $row);
        }
        // create DTO
        $dtoModel = new DTO(-1, "there was an error", $JobPostingModels);
        // convert to JSON
        $dto = json_encode($dtoModel->getData());
        
        return $dto;
        
        
    }

    ///
    /// Return 1 job post 
    ///
    public function viewJob2($id){

        // get the job ID
        $jobID = $id;
        // create job model
        $jobModel = new JobPostingModel();
        $jobModel->setJobID($jobID);
        
        //create job service
        $jobService = new JobPostingService();
        $data = $jobService->view($jobModel);
        // populate the job model
        $jobModel->setTitle($data[1]);
        $jobModel->setDescription($data[2]);
        $jobModel->setWage($data[3]);
        $jobModel->setLocation($data[4]);
        $jobModel->setRequirements($data[5]);
        $jobModel->setJobType($data[6]);
        // create DTO
        $dtoModel = new DTO(-1, "There was another error", $data);
        // convert to JSON
        $dto = json_encode($dtoModel->getData());
        
        return $dto;
        
    }
    
    ///
    /// Return Job post using search function
    ///
    public function searchJobPosting($search){
        // get request input
        $searchKey = $search;
        // create instance of model
        $jobPosting = new JobPostingModel();
        $jobPosting->setTitle($searchKey);
        // service job
        $jobPostingDataSerivce = new JobPostingService();
        // find job listing using dao
        $data = $jobPostingDataSerivce->searchJob($jobPosting);
        // array for all job listings
        $JobPostingModels = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($JobPostingModels, $row);
        }
        
        $dtoModel = new DTO(-1, "There was another error", $JobPostingModels);
        
        $dto = json_encode($dtoModel->getData());
        
        return $dto;
          
    }
    
    
}
