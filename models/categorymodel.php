<?php

use LDAP\Result;
class categories{

    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
    public function getAll(){
      try{
       $stmt = $this->conn->query("SELECT * FROM category ORDER BY category_name");
        $result = $stmt -> fetchAll();
        return $result;
      }catch(PDOException $e){
        error_log("Category load error:". $e->getMessage());
        return[];

      }

    }
    public function getById($id){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM category WHERE category_id=?");
            $stmt -> execute([$id]);
            return $stmt -> fetch(PDO::FETCH_ASSOC); //result ek return krnw

        }catch(PDOException $e){
            error_log("Category load error:". $e->getMessage());
            return[];
    
          }
    }

    public function create($category_id,$category_name, $status){
        try{
            $stmt = $this->conn->prepare("INSERT INTO category(category_id ,category_name,`status`) VALUES(?,?,?)");
            $stmt -> execute([$category_id, $category_name, $status]);
        }catch(PDOException $e){
        error_log("Category load error:". $e->getMessage());
        return[];

      }
       }
       
    public function update( $category_name, $status){
        $stmt = $this->conn->prepare("UPDATE category SET  category_name=? , `status`=? WHERE category_id=?");
        $stmt -> execute([$category_name, $status]);
    }

    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM category WHERE category_id=?");
        return $stmt -> execute([$id]); 
    }

    public function exists($id){
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM category WHERE category_id=?");
        $stmt -> execute([$id]);
        return $stmt -> fetchColumn() >0;
    }
}

?>