<?php

class Issueitems{
    private $conn;

    public function __construct($conn){

        $this->conn = $conn;
    }

    public function getAll(){
        try {
         $stmt = $this->conn->query("SELECT issue_item.*,inventory.inventory_id,issue.issue_id FROM issue_item JOIN inventory ON issue_item.inventory_inventory_id=inventory.inventory_id
        JOIN issue ON issue_item.issue_issue_id=issue.issue_id");
        $result = $stmt->fetchAll();
        return $result;
       } catch (PDOException $e) {
        error_log("issue item load error !!".$e->getMessage());
        return [];
       }
    }

    public function getById($id){
         try {
            $stmt = $this->conn->prepare("SELECT issue_item.*,inventory.inventory_id,issue.issue_id FROM issue_item JOIN inventory ON issue_item.inventory_inventory_id=inventory.inventory_id
        JOIN issue ON issue_item.issue_issue_id=issue.issue_id WHERE issue_item.issue_item_id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("issue item id load error !!".$e->getMessage());
            return[];
        }
    }

    public function create($data){
         $stmt = $this->conn->prepare("INSERT INTO issue_item(issue_item.qty,issue_item.issue_item_status,issue_item.inventory_inventory_id,
         issue_item.issue_issue_id) VALUES (?,?,?,?)");
        return $stmt -> execute([
            $data['qty'],
            $data['issue_item_status'],
            $data['inventory_inventory_id'],
            $data['issue_issue_id']
           
        ]);
    }

    public function update($id,$data){
        $stmt = $this->conn->prepare("UPDATE issue_item SET issue_item.qty=?,issue_item.issue_item_status=?,issue_item.inventory_inventory_id=?,issue_item.issue_issue_id=?
        WHERE issue_item.issue_item_id=?");
        $stmt ->execute([
             $data['qty'],
            $data['issue_item_status'],
            $data['inventory_inventory_id'],
            $data['issue_issue_id'],
            $id
        ]);
    }

    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM issue_item WHERE issue_item.issue_item_id=?");
        $stmt->execute([$id]);
    }

    public function getInventory(){
        $stmt = $this->conn->query("SELECT inventory.inventory_id FROM inventory ORDER BY inventory.inventory_id");
        return $stmt->fetchAll();
    
    }

    public function getIssue(){
        $stmt = $this->conn->query("SELECT issue.issue_id FROM issue ORDER BY issue.issue_id");
        return $stmt->fetchAll();
    }
}

?>