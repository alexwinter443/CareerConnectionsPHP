<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
Route::get('/', function () {
    return view('/login');
});
// Router to show the login page
Route::get('/login', function () {
    return view('login');
});
// Router to call the userLogin business in the controller.
Route::post('/login', 'UserAuthController@userLogin');
// Router for showing register form
Route::get('/register', function () {

    return view('register');
});
// Router for register post business in the controller
Route::post('/register', 'UserAuthController@userRegister');

Route::get('about-us', function () {
    return view('about');
});
Route::get('contact-us', function () {
    return view('contact');
});

Route::get('home', function () {
    return view('home');
});
Route::get('admin', 'AdminManagementController@readAllUsers');

// Router for register post business in the controller
Route::post('/changeStatus', 'AdminManagementController@ChangeUserStatus');

// Router for register post business in the controller
Route::post('/deleteUser', 'AdminManagementController@DeleteUser');

// ----- My Profile Routes ------
Route::get('myprofile', 'UserAuthController@UserProfile');

Route::post('myprofile', 'UserAuthController@UpdateUserProfile');
                        
// Route::get('readAllJobHistory', function () {
//     return view('jobHistory');
// });

Route::get('readAllJobHistory', 'JobHistoryController@readAllJobHistory');

// Rest Controller
Route::get('readAllJobHistory1', 'JobHistoryRestController@readAllJobHistory');
 

Route::post('deleteHistory', 'JobHistoryController@deleteHistory');

Route::post('deletePost', 'JobPostingController@deletePost');
 
 //Group features:
 Route::get('createGroup', function () {
     return view('group/group');
 });
 //Admin View Group
Route::get('adminViewGroup', 'AdminManagementController@adminViewGroups');
Route::post('createGroup', 'GroupController@createGroupView');
 //Get Groups
Route::get('getGroupList', 'GroupController@GetGroupList');
Route::post('addGroup', 'GroupController@CreateGroup');
Route::post('changeStatusGroup', 'AdminManagementController@deactivaGroup');
Route::post('deleteGroup', 'AdminManagementController@deleteGroup');
Route::post('joinGroup', 'GroupController@JoinGroup');
Route::post('leaveGroup', 'GroupController@LeaveGroup');
 
 
 
 
 // Router for job posting and search job
Route::get('/jobposting', function () {
    return view('jobposting');
});

Route::post('createJobPosting', 'JobPostingController@jobPosting');

//Route::post('createJobPosting/', 'JobPostingController@jobPosting');
  
Route::get('readJobPosting', 'JobPostingController@readAllJobPosting');

Route::get('/searchjob', function () {
    return view('searchjob');
});
Route::post('/searchJob', 'JobPostingController@searchJobPosting');

// REST CONTROLLER
Route::get('/searchJobRest/{search}', 'JobPostingRestController@searchJobPosting');


Route::post('viewJob', 'JobPostingController@viewJob');

// REST CONTROLLER
Route::get('viewJobRest/{id}', 'JobPostingRestController@viewJob2');

// REST CONTROLLER
Route::get('jobPostingRest', 'JobPostingRestController@ReadAllJobPosting');

Route::get('viewProfile/{id}', 'UserProfileRestController@viewProfile');

Route::get('logout', 'UserAuthController@logout');


// -------- Email Routes --------------
Route::get('email', function(){
   return view('email'); 
});

Route::post('sendEmail', 'MailController@sendEmail');



