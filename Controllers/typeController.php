<?php


namespace Controllers;

use function Couchbase\defaultDecoder;
use Model\Type;
use Model\TypeDB;
use Model\loginConnection;

class TypeController
{
    public $typeDB;

    public function __construct()
    {
        $connection = new loginConnection();
        $this->typeDB = new TypeDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'add.php';
        } else {
            $name_type = $_POST['name_type'];
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $type = new Type($name_type, $image);
            $this->typeDB->create($type);
            $message = 'Type created';
            include 'add.php';
        }
    }
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $type = $this->typeDB->get($id);
            include 'edit.php';
        } else {
            $id = $_POST['id'];
            $type = new type($_POST['name_type'], addslashes(file_get_contents($_FILES['image']['tmp_name'])));
            $this->typeDB->update($id, $type);
            header('Location: type.view.php');
        }
    }

    public function index()
    {
        $types = $this->typeDB->getAll();
        include 'list.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $type = $this->typeDB->get($id);
            include 'delete.php';
        } else {
            $id = $_POST['id'];
            $this->typeDB->delete($id);
            header('Location: type.view.php');
        }
    }
    public function backupfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $type = $this->typeDB->get($id);
            include 'backup_file.php';
        } else {
            $id = $_POST['id'];
            $this->typeDB->backup_file($id);
            header('Location: type.view.php?page=show_backup');
        }
    }
    public function showfile(){
        $types = $this->typeDB->showfile();
        include 'backuptype.view.php';
    }

   
}