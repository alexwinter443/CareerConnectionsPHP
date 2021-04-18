<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\Business\JobPostingService;
use App\Services\Models\JobPostingModel;
use App\services\data\utility\MyLogger3;
use Carbon\Exceptions\Exception;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen - Anh Le - Alex Vergara
 * JobHistoryController class
 * March 14 2021
 * This class is working as a controller to route for incomming request from clients
 */
class JobPostingController extends Controller
{
    // Injecting Logging Service
    public function __construct(){
        $this->logger = new MyLogger3();
    }
    
    // Anh
    // create a job post method
    public function jobPosting(Request $request)
    {
        Log::info("Entering the JobPostingController jobPosting()");
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
            Log::info("Successfully created a job posting");
            //create instance of service
            $jobPostingDataSerivce = new JobPostingService();
            // read all jobs 
            try{
                Log::info("read method within JobPostingController was executed");
                $data = $jobPostingDataSerivce->read();
            }
            catch (Exception $e){
                Log::info("Something went wrong. Check Read() Method within JobPostingDAO");
            }
            // create empty array
            $JobPostingModels = Array();
            // populate array with data received from service
            while ($row = mysqli_fetch_assoc($data)) {
                array_push($JobPostingModels, $row);
            }
            // return view with all job listings array
            return view('ReadJobPosting')->with('JobPostingModels', $JobPostingModels);
        } else {
            Log::info("Could NOT create a job posting");
            // unsuccessul job creation
            return view('jobposting');
        }
    }

    // read all jobs method
    // API Completed
    public function readAllJobPosting(Request $request)
    {
        Log::info("Entering the JobPostingController readAllJobPosting()");
        // service job
        $jobPostingDataSerivce = new JobPostingService();
        try{
            Log::info("read method within JobPostingController was executed");
            $data = $jobPostingDataSerivce->read();
        }
        catch (Exception $e){
            Log::info("Check Read Method within JobPostingDAO. Something went wrong");
        }
        // array for all job listings
        $JobPostingModels = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($JobPostingModels, $row);
        }
        return view('ReadJobPosting')->with('JobPostingModels', $JobPostingModels);
    }
    
    
    
    
    //The method to search the job listing using the keyword,
    //Receive the keyword from the request, passes to the business.
    // convert to API using /search?
    public function searchJobPosting(Request $request){
        Log::info("Entering the JobPostingController searchJobPosting()");
        // get request input
        $searchKey = $request->input("search");
        // create instance of model
        $jobPosting = new JobPostingModel();
        $jobPosting->setTitle($searchKey);
        // service job
        $jobPostingDataSerivce = new JobPostingService();
        // find job listing using dao
        try{
            Log::info("searchJob method within JobPostingController was executed");
            $data = $jobPostingDataSerivce->searchJob($jobPosting);
        }
        catch (Exception $e){
            Log::info("Check searchJob method within jobpostingDAO. Something went wrong.");
        }
        // array for all job listings
        $JobPostingModels = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($JobPostingModels, $row);
        }
        return view('ReadJobPosting')->with('JobPostingModels', $JobPostingModels);
        
    }
    
    // Alex
    // this will display the job details
    // convert to API
    // /JobID
    public function viewJob(Request $request){
        Log::info("Entering the JobPostingController viewJob()");
        // get the job ID
        $jobID = $request->input('jobID');
        // create job model
        $jobModel = new JobPostingModel();
        $jobModel->setJobID($jobID);
        
        //create job service
        $jobService = new JobPostingService();
        try{
            Log::info("View method within JobPostingController was executed");
            $data = $jobService->view($jobModel);
        }
        catch(Exception $e){
            Log::info("Something went wrong with the view method. Check view method within JobpostingDAO");
        }
        // populate the job model
        $jobModel->setTitle($data[1]);
        $jobModel->setDescription($data[2]);
        $jobModel->setWage($data[3]);
        $jobModel->setLocation($data[4]);
        $jobModel->setRequirements($data[5]);
        $jobModel->setJobType($data[6]);
        // return view with job  
        return view('viewJob')->with('jobModel', $jobModel);
        
        
        
    }
    public function viewJob2($id){
        Log::info("Entering the JobPostingController viewJob2()");
        // get the job ID
        $jobID = $id;
        // create job model
        $jobModel = new JobPostingModel();
        $jobModel->setJobID($jobID);
        
        //create job service
        $jobService = new JobPostingService();
        try{
            Log::info("View method within JobPostingController was executed");
            $data = $jobService->view($jobModel);
        }
        catch(Exception $e){
            Log::info("Something went wrong with the JobPostingService view method");
        }
        // populate the job model
        $jobModel->setTitle($data[1]);
        $jobModel->setDescription($data[2]);
        $jobModel->setWage($data[3]);
        $jobModel->setLocation($data[4]);
        $jobModel->setRequirements($data[5]);
        $jobModel->setJobType($data[6]);
        // return view with job
        return view('viewJob')->with('jobModel', $jobModel);
        
        
        
    }
    
    
    public function deletePost(Request $request){
        Log::info("Entering the JobPostingController deletePost()");
        // get the job ID
        $jobID = $request->input('jobID');
        // create job model
        $jobModel = new JobPostingModel();
        $jobModel->setJobID($jobID);
        
        //create job service
        $jobService = new JobPostingService();
        try{
            Log::info("View method within JobPostingController was executed");
            $jobService->delete($jobModel);
        }
        catch(Exception $e){
            Log::info("Something went wrong with the JobPostingService view method");
        }
        // return view with job
        $data = $jobService->read();
        
        $JobPostingModels = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($JobPostingModels, $row);
        }
        return view('ReadJobPosting')->with('JobPostingModels', $JobPostingModels);
        
        
        
    }
}
    