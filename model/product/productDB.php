<?php


namespace Model;

class ProductDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($pro)
    {
        $sql = "INSERT INTO product(name, type_product, producer, amount, image, price_input) VALUES ('$pro->name', '$pro->type_product', '$pro->producer', '$pro->amount', '$pro->image', '$pro->price_input')";
        $statement = $this->connection->prepare($sql);
        return $statement->execute();
    }

    public function getAll()
    {
        $sql = "SELECT product.id,product.name, type_product.name_type as name_type, producer.name_producer AS producer, product.amount, product.image, product.price_input
        FROM product 
        JOIN producer ON producer.id = product.producer
        JOIN type_product ON type_product.id =product.type_product
        where product.flag = '0'
        ORDER BY product.id ";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $pros = [];
        foreach ($result as $row) {
            $pro = new Product($row['name'], $row['name_type'], $row['producer'], $row['amount'], $row['image'], $row['price_input']);
            $pro->id = $row['id'];
            $pros[] = $pro;
        }
        return $pros;
    }

    public function get($id){
        $sql = "SELECT * FROM product WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $pro = new Product($row['name'], $row['type_product'], $row['producer'], $row['amount'], $row['image'], $row['price_input']);
        $pro->id = $row['id'];
        return $pro;
    }


    public function delete($id){

      
        $sql1 = "UPDATE product set flag = '1' WHERE id = ?";
        $statement1 = $this->connection->prepare($sql1);
        $statement1->bindParam(1, $id);
        $statement1->execute();
         return true;
    }

    public function update($id, $pro)
    {
        if ($pro->image !== '') {
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql = "UPDATE product SET name = '$pro->name', type_product = '$pro->type_product', producer = '$pro->producer', amount = '$pro->amount', image = '$image', price_input = '$pro->price_input' WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(1, $id);
            return $statement->execute();
        } else{
            $sql = "UPDATE product SET name = '$pro->name', type_product = '$pro->type_product', producer = '$pro->producer', amount = '$pro->amount', price_input = '$pro->price_input' WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(1, $id);
            return $statement->execute();
        }
    }
    public function backup_file($id)
    {
        $sql = "UPDATE product set flag = '0' WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
         return true;
    }
    public function Showfile()
    {
        $sql = "SELECT product.id,product.name, type_product.name_type as name_type, producer.name_producer AS producer, product.amount, product.image, product.price_input
        FROM product 
        JOIN producer ON producer.id = product.producer
        JOIN type_product ON type_product.id =product.type_product
        where product.flag = '1'
        ORDER BY product.id ";
        $statement = $this->connection->prepare($sql);;
        $statement->execute();
        $result = $statement->fetchAll();
        $pros = [];
        foreach ($result as $row) {
            $pro = new Product($row['name'], $row['name_type'], $row['producer'], $row['amount'], $row['image'], $row['price_input']);
            $pro->id = $row['id'];
            $pros[] = $pro;
        }
        return $pros;
    }
    



}