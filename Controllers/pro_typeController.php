<?php


namespace Controllers;

use function Couchbase\defaultDecoder;
use Model\Producer_Type;
use Model\ProtypeDB;
use Model\loginConnection;

class Pro_typeController
{
    public $protypeDB;

    public function __construct()
    {
        $connection = new loginConnection();
        $this->protypeDB = new ProtypeDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'add.php';
        } else {
            $id_producer = $_POST['id_producer'];
            $id_type = $_POST['id_type'];
            $amount = $_POST['amount'];
            $protype = new Producer_Type($id_producer, null, $id_type, null, $amount);
            $this->protypeDB->create($protype);
            $message = 'created';
            include 'add.php';
        }
    }
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id1 = $_GET['id1'];
            $id2 = $_GET['id2'];
            $protype = $this->protypeDB->get($id1,$id2);
            include 'edit.php';
        } else {
            $id1 = $_POST['id1'];
            $id2 = $_POST['id2'];
            $id_producer = $_POST['id_producer'];
            $id_type = $_POST['id_type'];
            $protype = new Producer_Type($id_producer, null, $id_type, null, $_POST['amount']);
            $this->protypeDB->update($id1,$id2, $protype);
            header('Location: producer_type.view.php');
        }
    }

    public function index()
    {
        $protypes = $this->protypeDB->getAll();
        include 'list.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id1 = $_GET['id1'];
            $id2 = $_GET['id2'];
            $protype = $this->protypeDB->get($id1,$id2);
            // $protype = $this->protypeDB->get($id2);
            include 'delete.php';
        } else {
            $id1 = $_POST['id1'];
            $id2 = $_POST['id2'];
            $this->protypeDB->delete($id1, $id2);
            header('Location: producer_type.view.php');
        }
    }
    public function backupfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id1 = $_GET['id1'];
            $id2 = $_GET['id2'];
            $protype = $this->protypeDB->get($id1, $id2);
            include 'backuppro_typefile.php';
        } else {
            $id1 = $_POST['id1'];
            $id2 = $_POST['id2'];
            $this->protypeDB->backup_file($id1, $id2);
            header('Location: producer_type.view.php?page=show_backuppro_type');
        }
    }
    public function showfile(){
        $protypes = $this->protypeDB->showfile();
        include 'backuppro_type.view.php';
    }

   
}