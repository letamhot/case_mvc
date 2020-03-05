<?php


namespace Model;

class ProducerDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($producer)
    {
        $sql = "INSERT INTO producer(name_producer, address, phone, tax_code, image) VALUES ('$producer->name_producer', '$producer->address', '$producer->phone', '$producer->tax_code', '$producer->image')";
        $statement = $this->connection->prepare($sql);
        return $statement->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM producer where flag = '0' ORDER BY id ";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $producers = [];
        foreach ($result as $row) {
            $producer = new Producer($row['name_producer'], $row['address'], $row['phone'], $row['tax_code'], $row['image']);
            $producer->id = $row['id'];
            $producers[] = $producer;
        }
        return $producers;
    }

    public function get($id){
        $sql = "SELECT * FROM producer WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $producer = new Producer($row['name_producer'], $row['address'], $row['phone'], $row['tax_code'], $row['image']);
        $producer->id = $row['id'];
        return $producer;
    }


    public function delete($id){

      
        $sql1 = "UPDATE producer set flag = '1' WHERE id = ?";
        $statement1 = $this->connection->prepare($sql1);
        $statement1->bindParam(1, $id);
        $statement1->execute();
         return true;
    }

    public function update($id, $producer)
    {
        if ($producer->image !== '') {
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql = "UPDATE producer SET name_producer = '$producer->name_producer', address = '$producer->address', phone = '$producer->phone', tax_code = '$producer->tax_code', image = '$image' WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(1, $id);
            return $statement->execute();
        } else{
            $sql = "UPDATE producer SET name_producer = '$producer->name_producer', address = '$producer->address', phone = '$producer->phone', tax_code = '$producer->tax_code' WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(1, $id);
            return $statement->execute();
        }
    }
    public function backup_file($id)
    {
        $sql = "UPDATE producer set flag = '0' WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
         return true;
    }
    public function Showfile()
    {
        $sql = "SELECT producer.id, producer.name_producer, producer.address, producer.phone, producer.tax_code, producer.image
        FROM producer
        where flag = '1'
        ORDER BY producer.id ";
        $statement = $this->connection->prepare($sql);;
        $statement->execute();
        $result = $statement->fetchAll();
        $producers = [];
        foreach ($result as $row) {
            $producer = new Producer($row['name_producer'], $row['address'], $row['phone'], $row['tax_code'], $row['image']);
            $producer->id = $row['id'];
            $producers[] = $producer;
        }
        return $producers;
    }



}