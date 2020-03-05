<?php

namespace Model;

use PDO;
use PDOException;

class LoginConnection
{
    public const DB_SERVER = 'localhost';
    public const DB_USERNAME = 'root';
    public const DB_PASSWORD = '';
    public const DB_NAME = 'c12';

    public function __construct()
    {
    }

    public function connect()
    {
        try{
            return new PDO("mysql:host=".self::DB_SERVER .";dbname=".self::DB_NAME .";charset=utf8", self::DB_USERNAME, self::DB_PASSWORD);
        } catch(PDOException $e){
            die("ERROR: Could not connect. " . $e->getMessage());
        }
    }
}