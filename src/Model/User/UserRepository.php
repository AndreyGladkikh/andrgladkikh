<?php


namespace App\Model\User;


use AndrGladkikh\Database\Database;

class UserRepository
{
    /**
     * @var Database
     */
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function get()
    {
        $this->database->getConnection();
    }
}