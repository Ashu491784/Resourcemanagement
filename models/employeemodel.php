<?php

use LDAP\Result;
class Employee{

    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
    public function getAll(){
      try{
       $stmt = $this->conn->query("SELECT * FROM employee ORDER BY frist_name");
        $result = $stmt -> fetchAll();
        return $result;
      }catch(PDOException $e){
        error_log("Employee load error:". $e->getMessage());
        return[];

      }

    }
    public function getById($id){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM employee WHWRE employee_id=?");
            $stmt -> execute([$id]);
            return $stmt -> fetch(PDO::FETCH_ASSOC); //result ek return krnw

        }catch(PDOException $e){
            error_log("Employee load error:". $e->getMessage());
            return[];
    
          }
    }

    public function create($employee_id, $frist_name, $last_name,$email, $contact, $wtsappNo, $status, $job_position_id, $branch_id, $company_id  ){
        try{
            $stmt = $this->conn->prepare("INSERT INTO employee(employee_id, `frist_name`, `last_name`, `email`, `contact`, `wtsappNo`,`status`, `job_position_id`, `branch_id`, `company_id`) VALUES(?,?,?,?,?,?,?,?,?,?)");
            $stmt -> execute([$employee_id, $frist_name, $last_name, 
            $email, $contact, $wtsappNo, $status, $job_position_id, 
            $branch_id, $company_id]);
        }catch(PDOException $e){
        error_log("Employee load error:". $e->getMessage());
        return[];

      }

        }
    

    public function update($employee_id, $frist_name, $last_name, $email, $contact, $wtsappNo, $status, $job_position_id, $branch_id, $company_id){
        $stmt = $this->conn->prepare("UPDATE employee SET employee_id=? frist_name=?, last_name=?  WHERE category_id=?");
        $stmt -> execute([$employee_id, $frist_name, $last_name, $email, $contact,
         $wtsappNo, $status, $job_position_id,
          $branch_id, $company_id]);
    }

    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM employee WHERE employee_id=?");
        return $stmt -> execute([$id]); 
    }

    public function exists($id){
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM employee WHERE employee_id=?");
        $stmt -> execute([$id]);
        return $stmt -> fetchColumn() >0;
    }
      public function getbranch()
    {
        $stmt = $this->conn->query("SELECT job_position_id, position_name FROM job_position 
        ORDER BY position_name");
        return $stmt->fetchAll();
    }
      public function getjobposition()
    {
        $stmt = $this->conn->query("SELECT branch_id, branch_name FROM branch 
        ORDER BY branch_name");
        return $stmt->fetchAll();
    }
      public function getcompany()
    {
        $stmt = $this->conn->query("SELECT company_id, company_name FROM company 
        ORDER BY company_name");
        return $stmt->fetchAll();
    }
}


?>