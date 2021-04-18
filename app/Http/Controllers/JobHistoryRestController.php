<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Business\JobHistoryBusinessDataSerivce;
use App\Services\Models\DTO;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen Alex V. Anh
 * JobHistoryRestController class
 *  March 26
 * This class is working as Rest Controller
 * */
class JobHistoryRestController extends Controller
{
    ///
    /// Return all job history posts
    ///
    public function readAllJobHistory(){
        
        // instantiate service
        $jobHistoryDataSerivce = new JobHistoryBusinessDataSerivce();
        // read all jobs
        $data = $jobHistoryDataSerivce->read();
        // fetch all jobs
        $JobHistoryModels = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($JobHistoryModels, $row);
        }
        // create DTO
        $dtoModel = new DTO(-1, "there was an error", $JobHistoryModels);
        // convert to JSON
        $dto = json_encode($dtoModel->getData());
        
        return $dto;
        
        //return view('jobHistory')->with('JobHistoryModels',$JobHistoryModels);
        
    }
    
}
