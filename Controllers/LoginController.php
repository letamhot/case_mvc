<?php


namespace Controllers;

use function Couchbase\defaultDecoder;
use Model\login;
use Model\LoginDB;
use Model\loginConnection;

class LoginController
{
    public $loginDB;

    public function __construct()
    {
        $connection = new loginConnection();
        $this->loginDB = new LoginDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'add.php';
        } else {
            $Name = $_POST['Name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $login = new Login($Name, $email, $password);
            $this->loginDB->create($login);
            $message = 'Login created';
            include 'add.php';
        }
    }

    public function index()
    {
        $logins = $this->loginDB->getAll();
        include 'list.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $login = $this->loginDB->get($id);
            include 'delete.php';
        } else {
            $id = $_POST['id'];
            $this->loginDB->delete($id);
            header('Location: index.php');
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $login = $this->loginDB->get($id);
            include 'edit.php';
        } else {
            $id = $_POST['id'];
            $login = new Login($_POST['Name'], $_POST['email'], $_POST['password']);
            $this->loginDB->update($id, $login);
            header('Location: index.php');
        }
    }
}