<?php

require_once __DIR__.'/../models/branchmodel.php';
require_once __DIR__.'/../includes/db.php';
class BranchController{
    private $branchmodel;

    public function __construct(){
        global $pdo;
        $this -> branchmodel = new Branches($pdo);
    }

    public function index(){
        $branch = $this->branchmodel->getAll();
        require_once __DIR__.'/../views/Branch/index.php';
    }

    public function create(){
        require_once __DIR__.'/../views/Branch/create.php';
    }

    public function store(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'branch_name' => $_POST['branch_name'],
                'location' => $_POST['location'],
                'address' => $_POST['address'],
                'contactNo01' => $_POST['contactNo01'],
                'contactNo02' => $_POST['contactNo02'],
                'contact_person' => $_POST['contact_person'],
                'status' => $_POST['status']
            ];

            if($this->branchmodel->create($data)){
                $_SESSION['success'] = 'branch create successfull !!!';
                header('Location: /branch');
                exit;
            }else{
                $_SESSION['error'] = 'branch create error !!!';
                header('Location: /branch');
                exit;
            }
        }
    }

    public function edit($id){
        $branch = $this -> branchmodel -> getById($id);
        require_once __DIR__.'/../views/Branch/edit.php';
    }

    public function update($id){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'branch_name' => $_POST['branch_name'],
                'location' => $_POST['location'],
                'address' => $_POST['address'],
                'contactNo01' => $_POST['contactNo01'],
                'contactNo02' => $_POST['contactNo02'],
                'contact_person' => $_POST['contact_person'],
                'status' => $_POST['status']
            ];
            if($this->branchmodel->update($id,$data)){
                $_SESSION['error'] = 'branch update error !!';
                header('Location: ' .BASIC_PATH. '/branch');
                exit;
            }else{
                $_SESSION['success'] = 'branch update Successfull !!';
                header('Location: ' .BASIC_PATH. '/branch');
                exit;
            }
        }
    }

    public function delete($id){
        if($this -> branchmodel -> delete($id)){
            $_SESSION['success'] = 'branch delete successfull !!!';

        }else{
            $_SESSION['error'] = 'branch delete error !!!';
        }
        header('Location: ' .BASIC_PATH. '/branch');

    }
}


?>