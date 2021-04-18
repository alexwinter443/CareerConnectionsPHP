<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Models\User;
use App\Services\Business\UserDataService;
use App\Services\Models\DTO;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen Alex V. Anh
 * UserProfileRestController
 *  March 26
 * This class is working as Rest Controller
 * */
class UserProfileRestController extends Controller
{
    ///
    /// Return User profile as API format
    ///
    public function viewProfile($id)
    {
        // get the userID
        $userID = $id;
        // create user model
        $userModel = new User();
        $userModel->setId($userID);
        
        // create user service
        $userService = new UserDataService();
        $data = $userService->viewProfile($userModel);
        
        // populate the user model
        $userModel->setFirstName($data[1]);
        $userModel->setLastName($data[2]);
        $userModel->setDob($data[3]);
        $userModel->setAddress($data[4]);
        $userModel->setPhone($data[5]);
        $userModel->setEmail($data[6]);
        $userModel->setCareer($data[7]);
        $userModel->setSkills($data[8]);
        
        // get DTO
        $dtoModel = new DTO(-1, "there was an error", $data);
        // convert to JSON
        $dto = json_encode($dtoModel->getData());
        // return json
        return $dto;
        
        //return view('viewprofile')->with('userModel', $userModel);
        
        
    }
}
