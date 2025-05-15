<?php

class Branches{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
    
    public function getAll(){
       try {
        $stmt = $this -> conn -> query("SELECT * FROM branch");
        $result = $stmt -> fetchAll();
        return $result;
       } catch (PDOException $e) {
        error_log("branch loard error".$e->getMessage());
        return [];
       }
    }

    public function getById($id){
        try {
        $stmt = $this -> conn -> prepare("SELECT * FROM branch WHERE branch.branch_id = ?");
        $stmt -> execute([$id]);
        return $stmt -> fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("branch id loard error ".$e->getMessage());
            return [];  
        }
    }

    public function create($data){
        $stmt = $this -> conn -> prepare("INSERT INTO branch(branch.branch_name,branch.location,branch.address,branch.contactNo01,
        branch.contactNo02,
        branch.contact_person,branch.`status`) VALUES(?,?,?,?,?,?,?)");
        return $stmt ->execute([
            $data['branch_name'],
            $data['location'],
            $data['address'],
            $data['contactNo01'],
            $data['contactNo02'],
            $data['contact_person'],
            $data['status']
        ]);
    }

    public function update($id,$data){
        $stmt = $this -> conn -> prepare("UPDATE branch SET branch.branch_name=?,branch.location=?,branch.address=?,branch.contactNo01=?,branch.contactNo02=?,
         branch.contact_person=?,branch.`status`=?
          WHERE branch.branch_id=?");
        $stmt ->execute([
            $data['branch_name'],
            $data['location'],
            $data['address'],
            $data['contactNo01'],
            $data['contactNo02'],
            $data['contact_person'],
            $data['status'],
            $id
        ]);
    }

    public function delete($id){
        $stmt = $this -> conn -> prepare("DELETE FROM branch
         WHERE branch.branch_id =? ");
        return $stmt -> execute([$id]);
    }

    public function exite($id){
        $stmt = $this -> conn -> prepare("SELECT COUNT(*) FROM branch 
        WHERE branch.branch_id = ? ");
        $stmt -> execute([$id]);
        return $stmt->fetchColoum() > 0;
    }
}


?>