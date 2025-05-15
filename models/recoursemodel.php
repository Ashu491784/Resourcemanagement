<?php

class Resources{
    private $conn;

    public function __construct(PDO $conn){
        $this->conn = $conn;
    }

    public function getAll(){
       try {
        $stmt = $this -> conn -> query("SELECT resources.*,category.category_name,`user`.username
         FROM resources JOIN category ON resources.category_category_id=category.category_id 
        JOIN `user` ON resources.user_user_id = `user`.user_id");
        $result = $stmt -> fetchAll();
        return $result;
       } catch (PDOException $e) {
        error_log("resources load error ".$e->getMessage());
       }
    }

    public function getById($id){
        try {
        $stmt = $this -> conn -> prepare("SELECT resources.*,category.category_name,`user`.username
         FROM resources JOIN category ON resources.category_category_id=category.category_id 
        JOIN `user` ON resources.user_user_id = `user`.user_id WHERE resources.resources_id=?");
        $stmt -> execute([$id]);
        return $stmt -> fetch();
        } catch (PDOException $e) {
            error_log("resources id load error ".$e->getMessage());
        }
    }

    public function create($data){
        $stmt = $this -> conn -> prepare("INSERT INTO resources
         (resources.resources_id,resources.resources_name,resources.`description`,resources.category_category_id,
        resources.user_user_id) VALUES (?,?,?,?,?)");
        $stmt -> execute([
            $data['resources_id'],
            $data['resources_name'],
            $data['description'],
            $data['category_category_id'],
            $data['user_user_id']
            
        ]);
    }

    public function update($id,$data){
        $stmt = $this -> conn -> prepare("UPDATE resources SET resources.resources_name=?,resources.`description`=?,resources.category_category_id=?,resources.user_user_id=? 
        WHERE resources.resources_id=?");
        $stmt -> execute([
            $data['resources_name'],
            $data['description'],
            $data['category_category_id'],
            $data['user_user_id'],
            $id
        ]);
    }

    public function delete($id){
        $stmt = $this -> conn -> prepare("DELETE FROM resources 
        WHERE resources.resources_id=?");
        $stmt -> execute([$id]);
    }
        public function getCategory(){
        $stmt = $this -> conn -> query("SELECT category.category_id,category.category_name 
        FROM category ORDER BY category.category_name");
        return $stmt -> fetchAll();
    }

    public function getUser(){
        $stmt = $this -> conn -> query("SELECT `user`.user_id,`user`.username 
        FROM `user` ORDER BY `user`.username");
        return $stmt -> fetchAll();
    }
}

?>