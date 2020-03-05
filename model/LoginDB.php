<?php


namespace Model;

class LoginDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($login)
    {
        $sql = "INSERT INTO users(name, email, password) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $login->Name);
        $statement->bindParam(2, $login->email);
        $statement->bindParam(3, $login->password);
        return $statement->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM users where flag = false";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $logins = [];
        foreach ($result as $row) {
            $login = new Login($row['name'], $row['email'], $row['password']);
            $login->id = $row['id'];
            $logins[] = $login;
        }
        return $logins;
    }

    public function get($id){
        $sql = "SELECT * FROM users WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $login = new Login($row['Name'], $row['email'], $row['password']);
        $login->id = $row['id'];
        return $login;
    }


    public function delete($id){
        $sql = "UPDATE users set flag = '1' WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function update($id, $login)
    {
        $sql = "UPDATE users SET name = ?, email = ?, password = ?, WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $login->Name);
        $statement->bindParam(2, $login->email);
        $statement->bindParam(3, $login->password);
        $statement->bindParam(4, $id);
        return $statement->execute();
    }



}