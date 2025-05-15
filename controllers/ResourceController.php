<?php

require_once __DIR__.'/../models/recoursemodel.php';
require_once __DIR__.'/../includes/db.php';

class ResourceController{
    private $recoursemodel;
    private $categorymodel;
    private $useremodel;

    public function __construct(){
        global $pdo;

        $this ->recoursemodel = new Resources($pdo);
        $this -> categorymodel = new categories($pdo);
        $this -> useremodel = new user($pdo);
    }

    public function index(){
        $resource = $this -> recoursemodel -> getAll();
        require_once __DIR__.'/../views/Resource/index.php';
    }

    public function create(){
        $categories = $this -> recoursemodel -> getCategory();
        $user = $this -> recoursemodel -> getUser();
        require_once __DIR__.'/../views/Resource/create.php';
    }

    public function store(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'resources_id' => $_POST['resource_id'],
                'resources_name' => $_POST['resources_name'],
                'description' => $_POST['description'],
                'category_category_id' => $_POST['category_id'],
                'user_user_id' => $_POST['user_id']
            ];

            if($this->recoursemodel->create($data)){
                $_SESSION['success'] = 'resources save successfull !!';
                header('Location :/resource');
                exit;
            }else{
                $_SESSION['error'] = 'resources save error !!';
                header('Location: ' .BASIC_PATH. '/resource');
                exit;
            }
        }
    }

    public function edit($id){
        $resources = $this -> recoursemodel -> getById($id);

        if(!$resources){
            $_SESSION['error'] = 'resource is not found !!';
            header('Location: ' .BASIC_PATH. '/resource');
            exit;
        }
        $categories = $this -> recoursemodel -> getCategory();
        $user = $this -> recoursemodel -> getUser();

        require_once __DIR__.'/../views/Resource/edit.php';
    }

    public function update($id){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'resources_id' => $_POST['resource_id'],
                'resources_name' => $_POST['resources_name'],
                'description' => $_POST['description'],
                'category_category_id' => $_POST['category_id'],
                'user_user_id' => $_POST['user_id']
            ];
            if($this -> recoursemodel -> update($id,$data)){
                $_SESSION['success'] = 'resources update successfull !!';
                header('Location: /resource');
                exit;
            }else{
                $_SESSION['error'] = 'resources update error !!';
                header('Location: /resource');
                exit;
            }
        }
    }

    public function delete($id){
        if($this -> recoursemodel  -> delete($id)){
            $_SESSION['success'] = 'resources delete successfull !!'; 
        }else{
            $_SESSION['error'] = 'resources delete error !!';
        }
        header('Location: /resource');
        exit;
    }
}


?>