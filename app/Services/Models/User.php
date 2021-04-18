<?php

namespace App\Services\Models;
/**
 *  CST-256 Database Application Programming 3
 * @author Vien Nguyen
 * Jan/22nd/20
 * This is User class which will be used for register and login.
 */
class User{
    //Users' properties
    private $id;
    private $firstName;
    private $lastName;
    private $dob;
    private $gender;
    private $address;
    private $phone;
    private $email;
    private $password;
    private $signupDate;
    private $majorId;
    private $career;
    private $skills;
    

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param mixed $skills
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    /**
     * @return mixed
     */
    public function getCareer()
    {
        return $this->career;
    }

    /**
     * @param mixed $career
     */
    public function setCareer($career)
    {
        $this->career = $career;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    function __construct(){
        
    }
        
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getSignupDate()
    {
        return $this->signupDate;
    }

    /**
     * @return mixed
     */
    public function getMajorId()
    {
        return $this->majorId;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $signupDate
     */
    public function setSignupDate($signupDate)
    {
        $this->signupDate = $signupDate;
    }

    /**
     * @param mixed $majorId
     */
    public function setMajorId($majorId)
    {
        $this->majorId = $majorId;
    }

    
}