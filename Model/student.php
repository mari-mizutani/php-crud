<?php

class Student{
    private $conn;

    // Constructor
    public function __construct() {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    // Execute queries SQL
    public function runQuery($sql){
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    //Insert
    public function insert($name, $email){
        try{
            $stmt = $this->conn->prepare("INSERT INTO student (studentName, email) VALUES(:name, :email)");
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //Update
    public function update($name, $email, $id){
        try{
            $stmt = $this->conn->prepare("UPDATE student SET name = :name, email = :email WHERE id = :id");
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }    
    }

    //Delete
    public function delete($id){
        try{
            $stmt = $this->conn->prepare("DELETE FROM student WHERE id = :id");
            $stmt->bindParam($id);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //Redirect URL method
    public function redirect($url){
        header("Location: $url");
    }

}