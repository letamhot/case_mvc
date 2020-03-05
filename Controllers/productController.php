<?php


namespace Controllers;

use function Couchbase\defaultDecoder;
use Model\product;
use Model\ProductDB;
use Model\loginConnection;

class ProductController
{
    public $proDB;

    public function __construct()
    {
        $connection = new loginConnection();
        $this->proDB = new ProductDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'add.php';
        } else {
            $name = $_POST['name'];
            $type_product = $_POST['type'];
            $producer = $_POST['producer'];
            $amount = $_POST['amount'];
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $price_input = $_POST['price_input'];
            $pro = new product($name, $type_product, $producer, $amount, $image, $price_input);
            $this->proDB->create($pro);
            $message = 'Shoes created';
            include 'add.php';
        }
    }
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $pro = $this->proDB->get($id);
            include 'edit.php';
        } else {
            $id = $_POST['id'];
            $pro = new Product( $_POST['name'], $_POST['type'], $_POST['producer'], $_POST['amount'], addslashes(file_get_contents($_FILES['image']['tmp_name'])), $_POST['price_input']);
            $this->proDB->update($id, $pro);
            header('Location: index.php');
        }
    }

    public function index()
    {
        $pros = $this->proDB->getAll();
        include 'list_product.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $pro = $this->proDB->get($id);
            include 'delete.php';
        } else {
            $id = $_POST['id'];
            $this->proDB->delete($id);
            header('Location: index.php');
        }
    }
    public function backupfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $pro = $this->proDB->get($id);
            include 'backup_file.php';
        } else {
            $id = $_POST['id'];
            $this->proDB->backup_file($id);
            header('Location: index.php?page=show_backup');
        }
    }
    public function showfile(){
        $pros = $this->proDB->Showfile();
        include 'backup.view.php';
    }

   
}