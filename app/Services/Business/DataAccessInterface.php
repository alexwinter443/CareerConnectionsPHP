<?php
namespace App\Services\Business;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen
 * DataAccessInterface
 *  Jan/30/20
 * This class is an interface for CRUD
 * */
interface DataAccessInterface
{
    public function create($obj);
    public function read();
    public function update($obj);
    public function delete($obj);
    public function changeStatus($obj);
}

