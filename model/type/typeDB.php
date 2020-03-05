<?php


namespace Model;

class TypeDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($type)
    {
        $sql = "INSERT INTO type_product(name_type, image) VALUES ('$type->name_type', '$type->image')";
        $statement = $this->connection->prepare($sql);
        return $statement->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM type_product where flag = '0' ORDER BY id ";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $types = [];
        foreach ($result as $row) {
            $type = new type($row['name_type'], $row['image']);
            $type->id = $row['id'];
            $types[] = $type;
        }
        return $types;
    }

    public function get($id){
        $sql = "SELECT * FROM type_product WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $type = new type($row['name_type'], $row['image']);
        $type->id = $row['id'];
        return $type;
    }


    public function delete($id){

      
        $sql1 = "UPDATE type_product set flag = '1' WHERE id = ?";
        $statement1 = $this->connection->prepare($sql1);
        $statement1->bindParam(1, $id);
        $statement1->execute();
         return true;
    }

    public function update($id, $type)
    {
        if ($type->image !== '') {
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql = "UPDATE type_product SET name_type = '$type->name_type', image = '$image' WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(1, $id);
            return $statement->execute();
        } else{
            $sql = "UPDATE type_product SET name_type = '$type->name_type' WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(1, $id);
            return $statement->execute();
        }
    }
    public function backup_file($id)
    {
        $sql = "UPDATE type_product set flag = '0' WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
         return true;
    }
    public function Showfile()
    {
        $sql = "SELECT * FROM type_product where flag = '1' ORDER BY id ";
        $statement = $this->connection->prepare($sql);;
        $statement->execute();
        $result = $statement->fetchAll();
        $types = [];
        foreach ($result as $row) {
            $type = new type($row['name_type'], $row['image']);
            $type->id = $row['id'];
            $types[] = $type;
        }
        return $types;
    }



}