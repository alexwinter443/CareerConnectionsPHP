<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\Business\JobHistoryBusinessDataSerivce;
use App\services\data\utility\MyLogger3;
use Carbon\Exceptions\Exception;

class JobHistoryController extends Controller
{

    // Injecting Logging Service
    public function __construct()
    {
        $this->logger = new MyLogger3();
    }

    public function readAllJobHistory(Request $request)
    {
        Log::info("Entering the JobHistoryController deleteHistory()");

        Log::info("This is the session username: " . $request->session()->get('userName'));
        $jobHistoryDataSerivce = new JobHistoryBusinessDataSerivce();
        try {
            Log::info("Read method within JobHisttoryController was executed");
            $data = $jobHistoryDataSerivce->read();
        } catch (Exception $e) {
            Log::info("Something kwent wrong with the read method within the JobHistoryDAO");
        }
        $JobHistoryModels = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($JobHistoryModels, $row);
        }
        return view('jobHistory')->with('JobHistoryModels', $JobHistoryModels);
    }

    public function deleteHistory(Request $request)
    {
        Log::info("Entering the JobHistoryController deleteHistory()");

        $JobService = new JobHistoryBusinessDataSerivce();
        // $job = new JobHistoryModel();

        $jobID = $request->input('jobID');

        try {
            Log::info("Delete Method within JobHistoryController was executed.");
            $isDeleted = $JobService->delete($jobID);
        } catch (Exception $e) {
            Log::info("Delete method not functioning.");
        }

        if ($isDeleted) {
            $jobHistoryDataSerivce = new JobHistoryBusinessDataSerivce();
            $data = $jobHistoryDataSerivce->read();

            $JobHistoryModels = Array();
            while ($row = mysqli_fetch_assoc($data)) {
                array_push($JobHistoryModels, $row);
            }
            return view('jobHistory')->with('JobHistoryModels',$JobHistoryModels);
                
            }
            else{
                echo "unable to delete . Check php code";
            }
            
        }
}
