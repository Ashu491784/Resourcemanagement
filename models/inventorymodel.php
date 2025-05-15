<?php

class Inventory{
 
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function getAll(){
       try {
         $stmt = $this->conn->query("SELECT inventory.*,resources.resources_name,`user`.username FROM inventory JOIN resources ON inventory.resources_resources_id=resources.resources_id JOIN `user` ON inventory.user_user_id=`user`.user_id");
        $result = $stmt->fetchAll();
        return $result;
       } catch (PDOException $e) {
        error_log("inventory load error !!".$e->getMessage());
        return [];
       }
    }

    public function getById($id){
            try {
                $stmt = $this->conn->prepare("SELECT inventory.*,resources.resources_name,`user`
                .username FROM inventory JOIN resources ON inventory.resources_resources_id=resources.resources_id JOIN `user` ON inventory.user_user_id=`user`.user_id WHERE inventory.inventory_id=?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("inventory id load error !!".$e->getMessage());
                return[];
            }
    }

    public function create($data){
        $stmt = $this->conn->prepare("INSERT INTO inventory(
                added_date, added_quantity, current_quantity, `image`,
                minimum_threshold, resources_resources_id, user_user_id
                ) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt -> execute([
            $data['added_date'],
            $data['added_quantity'],
            $data['current_quantity'],
            $data['image'],
            $data['minimum_threshold'],
            $data['resources_resources_id'],
            $data['user_user_id']
        ]);
    }

    public function update($id,$data){
        $stmt = $this->conn->prepare("UPDATE inventory SET inventory.added_date=?,inventory.added_quantity=?,inventory.current_quantity=?,inventory.image=?,inventory.minimum_threshold=?,
        inventory.resources_resources_id=?,inventory.user_user_id=? WHERE
         inventory.inventory_id=?");
        $stmt ->execute([
             $data['added_date'],
            $data['added_quantity'],
            $data['current_quantity'],
            $data['image'],
            $data['minimum_threshold'],
            $data['resources_resources_id'],
            $data['user_user_id'],
            $id
        ]);

    }

    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM inventory
         WHERE inventory.inventory_id=?");
        $stmt->execute([$id]);
    }

    public function getResource(){
        $stmt = $this->conn->query("SELECT resources.resources_id,resources.resources_name 
        FROM resources ORDER BY resources.resources_name");
        return $stmt->fetchAll();
    }

    public function getUser(){
        $stmt = $this->conn->query("SELECT `user`.user_id,`user`.username 
        FROM `user` ORDER BY `user`.username");
        return $stmt->fetchAll();
    }
}


?>