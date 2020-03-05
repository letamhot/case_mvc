<?php

namespace Model;

class Login
{
    public $Name;
    public $email;
    public $password;


    public function __construct($Name, $email, $password)
    {
        $this->Name = $Name;
        $this->email = $email;
        $this->password = $password;
    }
}