<?php

require_once __DIR__.'/../models/JobModel.php';
require_once __DIR__.'/../includes/db.php';

class JobController{
    private $JobModel;

   public function __construct(){
    global $pdo;

    $this->JobModel= new JobPosition($pdo);

   }
   public function index(){
    $job = $this->JobModel->getAll();
    require_once __DIR__.'/../views/job/index.php';
   }

   public function create(){
    require_once __DIR__.'/../views/job/create.php';
}

   public function store(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data =[
            'job_position_id' => $_POST['job_position_id'],
            'position_name' => $_POST['position_name'],
            'status' => $_POST['status']
        ];
        if($this->JobModel->create($data)){
            $_SESSION['success'] = 'job save successfull !!';
            header('Location: /job');
            exit;
        }else{
            $_SESSION['error'] = 'job save error !!';
            header('Location: /job');
            exit;
        }
    }
   }

   public function edit($id){
    $job = $this -> JobModel -> getById($id);     
    require_once __DIR__.'/../views/job/edit.php';

   }

   public function update($id){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data = [
            'job_position_id' => $_POST['job_position_id'],
            'position_name' => $_POST['position_name'],
            'status' => $_POST['status']
        ];
        if($this->JobModel->update($id,$data)){
            $_SESSION['error'] = 'job update error !!';
            header('Location : /job');
            exit;

        }else{
            $_SESSION['success'] = 'job  update successfull !!!';
            header('Location: /job');
            exit;
        }
    }
   }

   public function delete($id){
    if($this->JobModel->delete($id)){
        $_SESSION['success'] = 'job delete successfull !!';

    }else{
        $_SESSION['error'] = 'job delete error !!';
    }
    header('Location: ' .BASIC_PATH. '/job');
   }
}

?>