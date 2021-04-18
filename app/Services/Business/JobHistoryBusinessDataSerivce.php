<?php
namespace App\Services\Business;

use App\Services\Data\JobHistoryDAO;

class JobHistoryBusinessDataSerivce implements DataAccessInterface
{

    public function __construct()
    {}
    public function read()
    {
        $jobHistoryDAO = new JobHistoryDAO();
        return $jobHistoryDAO->readAll();
    }

    public function create($obj)
    {}

    public function update($obj)
    {}

    public function changeStatus($obj)
    {}

    public function delete($userId)
    {
        $jobDao = new JobHistoryDAO();
        $isDeleted = $jobDao->delete($userId);
        return $isDeleted;
        
    }

}

