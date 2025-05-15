<?php
require_once __DIR__ ."/../models/employeemodel.php";
require_once __DIR__ ."/../includes/db.php";

class Employeecontroller{

  private $employeemodel;
  public function __construct(){
    global $pdo; 
    $this->employeemodel = new Employee($pdo);

    if(!$pdo){
      throw new RuntimeException("Database Connection not found");
    }
  }

  public function index(){
    $employee = $this ->employeemodel -> getAll();
    require_once __DIR__.'/../views/employee/index.php'; 

  }
  public function create(){
    $jobposition = $this->employeemodel->getjobposition();
    $branch = $this->employeemodel->getbranch();
    $company = $this->employeemodel->getcompany();
        require_once __DIR__ . "/../views/employee/creat.php";
  }
public function store(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $employee_id = $_POST['employee_id'];
      $frist_name = $_POST['frist_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $contact = $_POST['contact'];
      $wtsappNo = $_POST['wtsappNo'];
      $status = $_POST['status'];
      $job_position_id = $_POST['job_position_id'];
      $branch_id = $_POST['branch_id'];
      $company_id = $_POST['company_id'];
    } 
    if(empty($frist_name)){ 
      $_SESSION['error'] = 'employee name is required';
      
    }
   if( $this ->employeemodel->create($employee_id,$frist_name, $last_name,
    $email,  $contact, $wtsappNo, $status, $job_position_id,
     $branch_id, $company_id)){ 
    $_SESSION['success'] = 'employee create successfull';
    
    exit;
  
  }else{  
    $_SESSION['error'] = 'failed to create employee';

  }
  }
  public function edit($id){
    $employees = $this->employeemodel->getById($id);
    if(!$employees) {
        $_SESSION['error'] = "employee not found.";
        header("Location: /employee");
        exit;
    }   
require_once __DIR__.'/../views/employee/edit.php';
  }
  public function update($id){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $employee_id = $_POST['employee_id'];
      $frist_name = $_POST['frist_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $contact = $_POST['contact'];
      $wtsappNo = $_POST['wtsappNo'];
      $status = $_POST['status'];
      $job_position_id = $_POST['job_position_id'];
      $branch_id = $_POST['branch_id'];
      $company_id = $_POST['company_id'];

      if(empty($name)){
          $_SESSION['error'] = "employee name is required.";
          header("Location: /employee/edit.php?id=$id");
          exit;
      }
      if($this->employeemodel->update($employee_id, $frist_name, $last_name, $email ,$contact, $wtsappNo, $status, $job_position_id, $branch_id, $company_id )){
          $_SESSION['success'] = "employee updated successfully.";
          header("Location: /categories");
          exit;
  }else{
      $_SESSION['error'] = "Failed to update category.";
      header("Location: /employee/edit.php?id=$id");
      exit;
  }
}else{
  header("Location: /employee");
  exit;
}

  }
  public function delete($id){
    if($this->employeemodel->delete($id)){
      $_SESSION['success'] = "employee deleted successfully.";
  }else{
      $_SESSION['error'] = "Failed to delete employee.";
  }
  header("Location: /employee");
  exit;

  }
}

?>