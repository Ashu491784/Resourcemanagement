<?php

require_once __DIR__.'/../models/companymodel.php';
require_once __DIR__.'/../includes/db.php';

class CompanyController{
    private$companymodel;

    public function __construct(){
        global $pdo;
        $this -> companymodel  = new Company($pdo);
    }
    public function index(){
       $company = $this -> companymodel -> getAll();
        require_once __DIR__.'/../views/company/index.php';
    }

    public function create(){
        require_once __DIR__.'/../views/company/create.php';
    }

    public function store(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'company_id' => $_POST['comp_id'],
                'company_name' => $_POST['comp_name'],
                'address' => $_POST['address'],
                'email' => $_POST['email'],
                'contactNo01' => $_POST['con_1'],
                'contactNo02' => $_POST['con_2'],
                'website' => $_POST['website'],
                'location' => $_POST['location'],
                'status' => $_POST['status'],
                'create_date' => $_POST['create_date']
            ];
            if($this->companymodel->create($data)){
                $_SESSION['success'] = 'company save successfull !!';
                header('Location: /company');
                exit;
            }else{
                $_SESSION['error'] = 'company save error !!';
                header('Location: /company');
                exit;
            }
        }
    }

    public function edit($id){
       $companies=  $this->companymodel->getById($id);
        require_once __DIR__.'/../views/company/edit.php';
    }

    public function update($id){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'company_name' => $_POST['comp_name'],
                'address' => $_POST['address'],
                'email' => $_POST['email'],
                'contactNo01' => $_POST['con_1'],
                'contactNo02' => $_POST['con_2'],
                'website' => $_POST['website'],
                'location' => $_POST['location'],
                'status' => $_POST['status'],
                'create_date' => $_POST['create_date']
            ];
            if($this->companymodel->updatee($id,$data)){
                $_SESSION['error'] = 'company update error !!';
                header('Location: ' .BASIC_PATH. '/company');
                exit;
            }else{
                $_SESSION['success'] = 'company update successfull !!';
                header('Location: ' .BASIC_PATH. '/company');
                exit;
            }
        }
    }

    public function delete($id){
        if($this->companymodel->delete($id)){
            $_SESSION['success'] = 'company delete successfull !!';

        }else{
            $_SESSION['error'] = 'company delete error !!';
        }
        header('Location: ' .BASIC_PATH. '/company');
    }
}

?>