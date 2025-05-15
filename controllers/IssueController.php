<?php

require_once __DIR__ .'/../models/issueModel.php';
require_once __DIR__ .'/../includes/db.php';

class IssueController{
    private $issueModel;
    private $usercontroll;
    private $employeemodel;

    public function __construct(){
        global $pdo;
        $this->issueModel = new Issue($pdo); 
        $this->usercontroll = new User($pdo);
        $this->employeemodel = new Employee($pdo);
    }

    public function index(){
        $issue = $this->issueModel->getAll();
        require_once __DIR__ .'/../views/issue/index.php';
    }

    public function create(){
        $user = $this->issueModel->getUser();
        $employee = $this->issueModel->getEmployee();
        require_once __DIR__ .'/../views/issue/create.php';
    }

    public function store(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'issue_date' => $_POST['issue_date'],
                'user_user_id' => $_POST['user_id'],
                'employee_employee_id' => $_POST['employee_id'],
                'issue_status' => $_POST['status']
                
            ];
            if($this->issueModel->create($data)){
                $_SESSION['success'] = 'issue save successfull !!';
                header('Location: /issue');
                exit;
            }else{
                $_SESSION['error'] = 'issue save error !!';
                header('Location: ' .BASIC_PATH. '/issue');
                exit;
            }
        }
    }

    public function edit($id){
        $issues = $this->issueModel->getById($id);

        if(!$issues){
            $_SESSION['error'] = 'issue deatils not found !!';
            header('Location: ' .BASIC_PATH. '/issue');
            exit;
        }
        $user = $this->issueModel->getUser();
        $employee = $this->issueModel->getEmployee();

        require_once __DIR__ .'/../views/issue/edit.php';
    }


    public function update($id){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'issue_date' => $_POST['issue_date'],
                'user_user_id' => $_POST['user_id'],
                'employee_employee_id' => $_POST['employee_id'],
                'issue_status' => $_POST['status']
            ];
            if($this->issueModel->update($id,$data)){
                $_SESSION['success'] = 'issue update successfull !!';
                header('Location: /issue');
                exit;
            }else{
                $_SESSION['error'] = 'issue update error !!';
                header('Location: /issue');
                exit;
            }
        }
    }

    public function delete($id){
        if($this->issueModel->delete($id)){
            $_SESSION['success'] = 'issue delete successfull !!';
        }else{
            $_SESSION['error'] = 'issue delete error !!';
        }
        header('Location: /issue');
        exit;
    }
}


?>