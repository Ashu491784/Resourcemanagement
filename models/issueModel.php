<?php

class Issue{
    private $conn;

    public function __construct(PDO $conn){
        $this->conn = $conn;
    }

    public function getAll(){
        try {
            $stmt = $this ->conn->query("SELECT issue.*,user.username,employee.frist_name FROM issue JOIN user ON issue.user_user_id=user.user_id 
        JOIN employee ON issue.employee_employee_id=employee.employee_id WHERE issue.issue_status=1");
        $result = $stmt->fetchAll();
        return $result;
        } catch (PDOException $e) {
            error_log("issue load error !!");
            return [];
        }
    }

    public function getById($id){
       try {
         $stmt = $this->conn->prepare("SELECT issue.*,user.username,employee.frist_name FROM issue JOIN user ON issue.user_user_id=user.user_id 
        JOIN employee ON issue.employee_employee_id=employee.employee_id WHERE issue.issue_id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
       } catch (PDOException $e) {
        error_log("issue id load error !!");
        return [];
       }

    }

    public function create($data){
        $stmt = $this->conn->prepare("INSERT INTO issue(issue.issue_id,issue.issue_date,issue.user_user_id,issue.employee_employee_id,issue.issue_status)
        VALUES (?,?,?,?,?)");
        $stmt -> execute([
            $data['issue_id'],
            $data['issue_date'],
            $data['user_user_id'],
            $data['employee_employee_id'],
            $data['issue_status']
        ]);
    }

    public function update($id,$data){
        $stmt = $this->conn->prepare("UPDATE issue SET issue.issue_date=?,issue.user_user_id=?,issue.employee_employee_id=?,issue.issue_status=? WHERE issue.issue_id=?");
        $stmt -> execute([
             $data['issue_date'],
            $data['user_user_id'],
            $data['employee_employee_id'],
            $data['issue_status'],
            $id
        ]);
    }

    public function delete($id){
        $stmt = $this->conn->prepare("UPDATE issue SET issue.issue_status=0 WHERE issue.issue_id=?");
        $stmt -> execute([$id]);
    }

    public function getUser(){
        $stmt = $this->conn->query("SELECT user.user_id,user.username FROM user ORDER BY user.username");
        return $stmt -> fetchAll();
    }

    public function getEmployee(){
        $stmt = $this->conn->query("SELECT employee.employee_id,employee.frist_name FROM employee ORDER BY employee.frist_name");
        return $stmt->fetchAll();
    }
}


?>