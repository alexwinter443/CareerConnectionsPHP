<?php
namespace App\Http\Controllers;
use App\Services\Business\AdminBusinessDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\services\data\utility\MyLogger3;
use Carbon\Exceptions\Exception;

class AdminManagementController extends Controller
{
   
    // Injecting Logging Service
    public function __construct(){
        $this->logger = new MyLogger3();
    }
    
    public function readAllUsers(){
        Log::info("Entering the AdminManagementController readAllUsers()");
        $adminManagement = new AdminBusinessDataService();
        try {          
            $data = $adminManagement->read();
            Log::info("read method within GroupController was executed");
            
        } catch (Exception $e) {
            Log::info("Something went wrong. Check the read method within the AdminManagementService");
        }
        $users = Array();
        while ($row = mysqli_fetch_assoc($data)) {
           array_push($users, $row);
        }
        return view('internals/adminUsers')->with('users',$users);
    }
    
    public function ChangeUserStatus(Request $request){
        Log::info("Entering the AdminManagementController ChangeUserStatus()");
        $userId = $request->input('userId');
        $adminManagement = new AdminBusinessDataService();
        $adminManagement->ChangeStatus($userId);
        
        $adminManagement = new AdminBusinessDataService();
        try {    
            $data = $adminManagement->read();
            Log::info("getJoinedGroup method within GroupController was executed");
            
        } catch (Exception $e) {
            Log::info("Something went wrong. Check the read method within the AdminBusinessDataService");
            
        }
        $data = $adminManagement->read();
        $users = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($users, $row);
        }
        return view('internals/adminUsers')->with('users',$users);
    }
    
    public function DeleteUser(Request $request){
        Log::info("Entering the AdminManagementController DeleteUser()");
        
        $userId = $request->input('userId');
        $adminManagement = new AdminBusinessDataService();
        try {
            $adminManagement->delete($userId);
            Log::info("delete method within GroupController was executed");
            
        } catch (Exception $e) {
            Log::info("Something went wrong. Check the delete method within the AdminBusinessDataService");
        }
        
        $adminManagement = new AdminBusinessDataService();
        $data = $adminManagement->read();
        $users = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($users, $row);
        }
        return view('internals/adminUsers')->with('users',$users);
    }
    
    public function adminViewGroups(){
        Log::info("Entering the AdminManagementController adminViewGroups()");
        $adminManagement = new AdminBusinessDataService();
        try {
            $data = $adminManagement->getAllGroup();
            Log::info("getAllGroup method within GroupController was executed");
        } catch (Exception $e) {
            Log::info("Something went wrong. Check the getAllGroup method within the AdminBusinessDataService");
        }
        $groups = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($groups, $row);
        }
        return view('group/adminViewGroup')->with('groups',$groups);
    }
    
    public function deactivaGroup(Request $request){
        Log::info("Entering the AdminManagementController deactivateGroup()");
        $groupId = $request->input('groupID');
        $adminManagement = new AdminBusinessDataService();
        try {
            $adminManagement->deactiveGroup($groupId);
            Log::info("deactiveGroup method within GroupController was executed");
        } catch (Exception $e) {
            Log::info("Something went wrong. Check the deactiveGroup method within the AdminBusinessDataService");
        }
        
        $data = $adminManagement->getAllGroup();
        $groups = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($groups, $row);
        }
        return redirect('adminViewGroup');
    }
    
    public function deleteGroup(Request $request){
        Log::info("Entering the AdminManagementController deleteGroup()");
        $groupId = $request->input('groupID');
        $adminManagement = new AdminBusinessDataService();
        
        try {
            $adminManagement->deleteGroup($groupId);
            Log::info("deactiveGroup method within GroupController was executed");
        } catch (Exception $e) {
            Log::info("Something went wrong. Check the deactiveGroup method within the AdminBusinessDataService");
        }
              
        return redirect('adminViewGroup');
        
    }
    
    
}
