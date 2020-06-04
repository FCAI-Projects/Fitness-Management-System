<?php

namespace PHPMVC\models;

use PHPMVC\LIB\Database;

class IndexModel
{
    private $database;
    public function __construct()
    {
        $this->database=new Database();
        //var_dump($this->database);
    }

    public function login($email, $password) {
        $this->database->query('SELECT * FROM users WHERE email = "' . $email .'" AND password = "' .  $password . '"');
        $this->database->execute();

        if ($this->database->rowCount() == 1) {

            return $this->database->single();
        } else {
            return false;
        }
    }

}