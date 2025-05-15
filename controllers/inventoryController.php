<?php

require_once __DIR__.'/../models/inventorymodel.php';
require_once __DIR__.'/../includes/db.php';
class inventoryController{
    private $inventorymodel;
    private $recoursemodel;
    private $useremodel;

    public function __construct(){
        global $pdo;
        $this ->inventorymodel = new Inventory($pdo);
        $this->recoursemodel = new Resources($pdo);
        $this->useremodel = new user($pdo);
    }

    public function index(){
        $inventory = $this->inventorymodel->getAll();
        require_once __DIR__.'/../views/inventory/index.php';
    }

    public function create(){
        $resources = $this->inventorymodel->getResource();
        $user = $this->inventorymodel->getUser();

        require_once __DIR__.'/../views/inventory/create.php';
    }

    public function store(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'added_date'=>$_POST['added_date'],
                'added_quantity'=>$_POST['added_quantity'],
                'current_quantity'=>$_POST['current_quantity'],
                'image'=>$_POST['image'],
                'minimum_threshold'=>$_POST['minimum_threshold'],
                'resources_resources_id'=>$_POST['resources_id'],   
                'user_user_id' => $_POST['user_id']
               
            ];
            if($this->inventorymodel->create($data)){
                $_SESSION['success'] = 'inventory save successfull !!';
                header('Location: /inventory');
                exit;
            }else{
                $_SESSION['error'] = 'inventory save error !!';
                header('Location: ' .BASIC_PATH. '/inventory');
                exit;

            }
        }
    }

    public function edit($id){
        $inventories = $this->inventorymodel->getById($id);
        if(!$inventories){
            $_SESSION['error'] = 'inventory is not found !!';
            header('Location: ' .BASIC_PATH. '/inventory');
            exit;
        }
        $resources = $this->inventorymodel->getResource();
        $user = $this->inventorymodel->getUser();

        require_once __DIR__.'/../views/inventory/edit.php';
    }

    public function update($id){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
             $data = [
               'added_date'=>$_POST['added_date'],
                'added_quantity'=>$_POST['added_quantity'],
                'current_quantity'=>$_POST['current_quantity'],
                'image'=>$_POST['image'],
                'minimum_threshold'=>$_POST['minimum_threshold'],
                'resources_resources_id'=>$_POST['resources_id'],
                'user_user_id'=>$_POST['user_id']
             ];
             if($this->inventorymodel->update($id,$data)){
                $_SESSION['success'] = 'inventory update successfull !!';
                header('Location: /inventory');
                exit;
             }else{
                $_SESSION['error'] = 'inventory update error !!';
                header('Location: ' .BASIC_PATH. '/inventory');
                exit;
             }
        }
    }

    public function delete($id){
        if($this->inventorymodel->delete($id)){
            $_SESSION['success'] = 'inventory delete successfull !!';
        }else{
            $_SESSION['error'] = 'inventory delete error !!';
        }
        header('Location: /inventory');
        exit;
    }
}

?>