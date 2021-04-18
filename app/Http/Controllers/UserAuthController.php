<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\Business\UserDataService;
use App\Services\Models\User;
use App\services\data\utility\MyLogger3;
use Carbon\Exceptions\Exception;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen
 * UserAuthController class
 * Jan/22nd/20
 * This class is working as a controller to route for incomming request from clients
 * This is my own work. Reference from https://laravel.com/docs/5.0/validation to validate input
 * */

class UserAuthController extends Controller
{
    // Injecting Logging Service
    public function __construct(){
        $this->logger = new MyLogger3();
    }
    
    //userLogin method receives request from the client and validate input data for login feature
    public function userLogin(Request $request){
        Log::info("Entering the loginController userLogin()");
        //Validate email and password
        $request->validate(
            [
                'email'=>'required|email',
                'password'=>'required|min:8|max:20',
            ]);
        //Initiates a userDataService object
        $userDataService = new UserDataService();
        //Initiates a User object
        $user = new User();
        //Set the properties for the user object
        $user->setEmail($request->input('email'));
        $user->setPassword($request->input('password'));
        //Passing the user into the userLogin method for login validation and return login result
        
        try{
            Log::info("userLogin method within UserAuthController was executed");
            $userData = $userDataService->userLogin($user);
            
            $data = mysqli_fetch_assoc($userData);
        }
        catch (Exception $e){
            Log::info("Could not properly login. Check UserDataService Class, userLogin method");
        }
        
        
        if($userData->num_rows!=0){
            Log::info("User exists in the database");
            //$data = mysqli_fetch_assoc($userData);
            $request->session()->put('userID', $data['id']);
            $request->session()->put('userName', $data['firstname']);
            $request->session()->put('email', $data['email']);
            $request->session()->put('id', $data['id']);
            Log::info("Parameters are : ", array("username: " => $request->session()->get('userName'),
                "userID: " => $request->session()->get('userID'), "email: " => $request->session()->get('email')));
            return view('home');
            
        }
        
        else{
            Log::info("User does not exist in the database");
            return view('login');
        }
        
    }
    //userRegister method is validating new user data entry and call the register service
    public function userRegister(Request $request){
        Log::info("Entering the loginController userRegister()");
        //validation rules
        $request->validate(
            [
            'firstName'=>'required|min:1|max:16',
            'lastName'=>'required|min:1|max:16',
            'email'=>'required|email',
            'password'=>'required|min:8|max:20',
            ]);
        //initiates a new instance of UserDataService
        $userDataService = new UserDataService();
        //Imitiate a new user
        $user = new User();
        //Set user's properties
        $user->setFirstName($request->input('firstName'));
        $user->setLastName($request->input('lastName'));
        $user->setEmail($request->input('email'));
        $user->setPassword($request->input('password'));
        //Return the new user register result
        try{
            Log::info("userRegister method within UserAuthController was executed");
            return $userDataService->userRegister($user);
        }
        catch (Exception $e){
            Log::info("Something went wrong. Check the userRegister method within the userDataService");
        }
        
        
        $userDataService->userRegister($user);
    }
    public function UpdateUserProfile(Request $request)
    {
            
//         // initiates a new instance of UserDataService
            $userDataService = new UserDataService();
//         // Imitiate a new user
            $user = new User();
//         // Set user's properties 
            $idNum =  $request->session()->get('id');
            $user->setFirstName($request->input('firstname'));
            $user->setLastName($request->input('lastname'));
            $user->setPhone($request->input('phone'));
            $user->setAddress($request->input('address'));
            $user->setEmail($request->input('email'));
            $user->setDOB($request->input('dob'));
            $user->setCareer($request->input('career'));
            $user->setSkills($request->input('skills'));
            $user->setId($idNum);
            Log::info("UserId currently: " . $idNum);
//          // Return the new user profile result
            $result1 = $userDataService->updateProfile($user);
            
            if($result1){
                return view('/myprofile')->with('userModel', $user);
            }
            else{
                return view('/home');
            }
        
//          $userDataService->userProfile($user);
    }
    
    public function UserProfile(Request $request)
    {
//         Log::info("Entering the loginController userProfile()");
//         return view('myprofile');

        Log::info("UpdateuserProfile method within UserAuthController. User Email: "
            . $request->session()->get('email'));
        // get user email thats signed in
        $email = $request->session()->get('email');
        
        // data service
        $userDataService = new UserDataService();
        //Imitiate a new user
        $user = new User();
        
        $user->setEmail($email);
        
        
        try{
            Log::info("userLogin method within UserAuthController was executed");
            $userData = $userDataService->viewMyProfile($user);
        }
        catch (Exception $e){
            Log::info("Could not properly login. Check UserDataService Class, userLogin method");
        }
        
        $user->setFirstName($userData[1]);
        $user->setLastName($userData[2]);
        $user->setDob($userData[3]);
        $user->setAddress($userData[4]);
        $user->setPhone($userData[5]);
        $user->setEmail($userData[6]);
        $user->setCareer($userData[7]);
        $user->setSkills($userData[8]);
        
        
        
        return view('/myprofile')->with('userModel',$user);
    }
    
    public function logout(Request $request)
    {
        Log::info("Entering the loginController logout()");
        $request->session()->flush();
        return view('login');
    }
    
    
}
