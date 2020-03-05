<?php


namespace Model;

class ProtypeDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($protype)
    {
        $sql = "INSERT INTO producer_type(id_producer, id_type, amount) VALUES ('$protype->id_producer', '$protype->id_type', '$protype->amount')";
        $statement = $this->connection->prepare($sql);
        // $statement->bindParam(1, $protype->id_producer);
        // $statement->bindParam(2, $protype->id_type);
        return $statement->execute();
        $protype->id_producer = $this->connection->lastInsertId();
        $protype->id_type = $this->connection->lastInsertId();


    }

    public function getAll()
    {
        $sql = "SELECT producer_type.id_producer, producer.name_producer as producer, producer_type.id_type, type_product.name_type as type, producer_type.amount 
        FROM producer_type 
        JOIN type_product ON type_product.id = producer_type.id_type
        JOIN producer ON producer.id = producer_type.id_producer
        WHERE producer_type.flag = '0'
        ORDER BY producer_type.id_producer ASC";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $protypes = [];
        foreach ($result as $row) {
            $protype = new Producer_Type($row['id_producer'], $row['producer'],$row['id_type'], $row['type'], $row['amount']  );
            // $protype->id = $row['id'];
            $protypes[] = $protype;
        }
        return $protypes;
    }

    public function get($id1, $id2){
        $sql = "SELECT * FROM producer_type WHERE id_producer = ? and id_type = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id1);
        $statement->bindParam(2, $id2);
        $statement->execute();
        $row = $statement->fetch();
        $protype = new Producer_Type($row['id_producer'], null, $row['id_type'], null, $row['amount']);
        $protype->id1 = $row['id_producer'];
        $protype->id2 = $row['id_type'];
        $protype->amount = $row['amount'];
        return $protype;
    }


    public function delete($id1, $id2){

      
        $sql1 = "UPDATE producer_type set flag = '1' WHERE id_producer = ? and id_type = ?";
        $statement1 = $this->connection->prepare($sql1);
        $statement1->bindParam(1, $id1);
        $statement1->bindParam(2, $id2);
        $statement1->execute();
         return true;
    }

    public function update($id1,$id2, $protype)
    {
       
            $sql = "UPDATE producer_type SET id_producer = ?, id_type = ?, amount = ? WHERE id_producer = ? and id_type = ?";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(1, $protype->id_producer);
            $statement->bindParam(2, $protype->id_type);
            $statement->bindParam(3, $protype->amount);
            $statement->bindParam(4, $id1);
            $statement->bindParam(5, $id2);
            return $statement->execute();
            $protype->id_producer = $this->connection->lastInsertId();
            $protype->id_type = $this->connection->lastInsertId();
    }
    public function backup_file($id1,$id2)
    {
        $sql = "UPDATE producer_type set flag = '0' WHERE id_producer = ? and id_type = ?";
        $statement = $this->connection->prepare($sql);

        $statement->bindParam(1, $id1);
        $statement->bindParam(2, $id2);
        $statement->execute();
         return true;
    }
    public function Showfile()
    {
        $sql = "SELECT producer_type.id_producer, producer.name_producer as producer, producer_type.id_type, type_product.name_type as type, producer_type.amount 
        FROM producer_type 
        JOIN type_product ON type_product.id = producer_type.id_type
        JOIN producer ON producer.id = producer_type.id_producer
        WHERE producer_type.flag = '1'
        ORDER BY producer_type.id_producer ASC";
        $statement = $this->connection->prepare($sql);;
        $statement->execute();
        $result = $statement->fetchAll();
        $protypes = [];
        foreach ($result as $row) {
            $protype = new Producer_Type($row['id_producer'], $row['producer'],$row['id_type'], $row['type'], $row['amount']  );
            // $protype->id = $row['id'];
            $protypes[] = $protype;
        }
        return $protypes;
    }



}