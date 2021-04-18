<?php
namespace App\Http\Controllers;

use App\Services\Business\GroupBusinessDataService;
use App\Services\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\Business\GroupMemberBusinessDataService;
use App\Services\Models\GroupMember;
use App\services\data\utility\MyLogger3;
use Carbon\Exceptions\Exception;
/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen
 * GroupController class
 * Jan/22nd/20
 * This class is working as a controller to route for incomming request from clients
 * This is my own work. Reference from https://laravel.com/docs/5.0/validation to validate input
 * */

class GroupController
{
    // Injecting Logging Service
    public function __construct(){
        $this->logger = new MyLogger3();
    }
    
    //Create each group that have the same affinity
    public function CreateGroup(Request $request){
        Log::info("Entering the GroupController CreateGroup()");
        
        //Get the input from the form controls
        $groupName = $request->input('group');
        $description = $request->input('description');
       
        //Initiate GroupBusinessDataService
        $groupBusiness = new GroupBusinessDataService();
        //Initiate a Group instace
        $group = new Group(0, $groupName, $description, 1);
        //Calling business service and redirect to the next page
        if($groupBusiness->create($group)){
            return redirect('getGroupList');
        }
    }
    //Get the group list from the database
    public function GetGroupList(){
        Log::info("Entering the GroupController GetGroupList()");
        //initiate the group business
        $groupBusiness = new GroupBusinessDataService();
        //Get the group that the member has joined in by their user's ID
        try{
            Log::info("getJoinedGroup method within GroupController was executed");
            $data = $groupBusiness->getJoinedGroup(session('userID'));
        }
        catch(Exception $e){
            Log::info("Something went wrong. Check the getJoingedGroup method within the GroupDataService");
        }
        //Return the result in the array
        $groups = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($groups, $row);
        }
        //Get the available group list that the user can join in. Calling the group business read service
        $availableGroups = $groupBusiness->read();
        $availableGroupsData = Array();
        while ($row = mysqli_fetch_assoc($availableGroups)) {
            array_push($availableGroupsData, $row);
        }
        //Put the results of joinedgroup and available groups to the presentation
        return view('group/groupList')->with('groups',$groups)->with('availableGroups', $availableGroupsData);
        
    }
    //Method for the user to join the group
    public function JoinGroup(Request $request){
        Log::info("Entering the GroupController JoinGroup()");
        //Get the data from the input control
        $userId = session('userID');
        $groupId = $request->input('groupID');
        //Initiate an instance of member
        $member = new GroupMember("", $userId, $groupId, "", true);
        //Initiate a group business data service
        $groupBusiness = new GroupMemberBusinessDataService();
        //Calling the create method from group business data service
        try{
            $groupBusiness->create($member);
            Log::info("create method within GroupController was executed");
        }
        catch(Exception $e){
            Log::info("Something went wrong. Check the create method within the GroupDataService");
        }
        
        //redirect the page after join a group
        return redirect('getGroupList');
        
    }
    //Method for leaving the group
    public function LeaveGroup(Request $request){
        Log::info("Entering the GroupController LeaveGroup()");
        //Get the data from the input controls
        $userId = session('userID');
        $groupId = $request->input('groupID');
        //initiate a member object
        $member = new GroupMember("", $userId, $groupId, "", true);
        //initiate a group business
        $groupBusiness = new GroupMemberBusinessDataService();
        //Calling leave group service
        try{
            $groupBusiness->leaveGroup($member);
            Log::info("leaveGroup method within GroupController was executed");
        }
        catch(Exception $e){
            Log::info("Something went wrong. Check the leaveGroup method within the GroupDataService");
        }
        //redirect controller after leave group.
        return redirect('getGroupList');
        
    
    }
    
    public function createGroupView(Request $request){
        Log::info("Entering the GroupController createGroupView()");
        //Get the data from the input controls
        return view('group/group');
        
    }
    
    
}

