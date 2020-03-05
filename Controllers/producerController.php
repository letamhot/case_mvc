<?php


namespace Controllers;

use function Couchbase\defaultDecoder;
use Model\producer;
use Model\producerDB;
use Model\loginConnection;

class ProducerController
{
    public $proDB;

    public function __construct()
    {
        $connection = new loginConnection();
        $this->proDB = new producerDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'add.php';
        } else {
            // $id = $_POST['id'];
            $name_producer = $_POST['name_producer'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $tax_code = $_POST['tax_code'];
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $producer = new Producer($name_producer, $address, $phone, $tax_code, $image);

            $this->proDB->create($producer);
            $message = 'Shoes created';
            include 'add.php';
        }
    }
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $producer = $this->proDB->get($id);
            include 'edit.php';
        } else {
            $id = $_POST['id'];
            $producer = new Producer($_POST['name_producer'],$_POST['address'], $_POST['phone'], $_POST['tax_code'], addslashes(file_get_contents($_FILES['image']['tmp_name'])));
            $this->proDB->update($id, $producer);
            header('Location: producer.view.php');
        }
    }

    public function index()
    {
        $producers = $this->proDB->getAll();
        include 'list.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $producer = $this->proDB->get($id);
            include 'delete.php';
        } else {
            $id = $_POST['id'];
            $this->proDB->delete($id);
            header('Location: producer.view.php');
        }
    }
    public function backupfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $producer = $this->proDB->get($id);
            include 'backup_file.php';
        } else {
            $id = $_POST['id'];
            $this->proDB->backup_file($id);
            header('Location: producer.view.php?page=show_backup');
        }
    }
    public function showfile(){
        $producers = $this->proDB->showfile();
        include 'backupproducer.view.php';
    }

   
}