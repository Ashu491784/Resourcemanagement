<?php

class Damege{
    private $pdo;

    public function __construct(PDO $conn){
        $this -> pdo = $conn;
    }

    public function getAll(){
       try {
        $stmt = $this->pdo->query("SELECT dameges.*,category.category_name,`user`.username FROM dameges JOIN category ON dameges.category_category_id=category.category_id
        JOIN `user` ON dameges.user_user_id=`user`.user_id");
        $result = $stmt -> fetchAll();
        return $result;
       } catch (PDOException $e) {
        error_log("dameges loard error".$e->getMessage());
       }
    }

    public function getById($id){
       try {
        $stmt = $this->pdo->prepare("SELECT dameges.*,category.category_name,`user`.username FROM dameges JOIN category ON dameges.category_category_id=category.category_id
        JOIN `user` ON dameges.user_user_id=`user`.user_id WHERE dameges.damege_id=?");
        $stmt ->execute([$id]);
        return $stmt->fetch();
       } catch (PDOException $e) {
        error_log("dameges id loard error".$e->getMessage());

       }
    }

    public function create($data){
        $stmt = $this -> pdo ->prepare("INSERT INTO dameges(dameges.resources_name,dameges.`description`,dameges.category_category_id,dameges.user_user_id)
        VALUES(?,?,?,?) ");
        $stmt -> execute([
            // $data['damege_id'],
            $data['resources_name'],
            $data['description'],
            $data['category_category_id'],
            $data['user_user_id']
        ]);

    }

    public  function update($id,$data){
        $stmt = $this->pdo->prepare("UPDATE dameges SET dameges.resources_name=?,dameges.`description`=?,dameges.category_category_id=?,dameges.user_user_id=?
        WHERE dameges.damege_id=?");
        $stmt -> execute([
            $data['resources_name'],
            $data['description'],
            $data['category_category_id'],
            $data['user_user_id'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this -> pdo -> prepare("DELETE FROM dameges WHERE dameges.damege_id=?");
        $stmt -> execute([$id]);
    }

    public function getCategory(){
        $stmt = $this -> pdo -> query("SELECT category.category_id,category.category_name FROM category ORDER BY category.category_name");
        return $stmt -> fetchAll();
    }

    public function getUser(){
        $stmt = $this -> pdo -> query("SELECT `user`.user_id,`user`.username FROM `user` ORDER BY `user`.username");
        return $stmt -> fetchAll();
    }
}

?>