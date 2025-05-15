<?php
require_once __DIR__.'/../models/damagemodel.php';
require_once __DIR__.'/../includes/db.php';

class Damagecontroller{
    private $damagemodel;
    private $categorymodel;
    private $useremodel;

    public function __construct(){
        global $pdo;

        $this -> damagemodel = new Damege($pdo);
        $this -> categorymodel = new categories($pdo);
        $this -> useremodel = new user($pdo);
    }

    public function index(){
        $damage = $this -> damagemodel -> getAll();
        require_once __DIR__.'/../views/damages/index.php';
    }

    public function create(){
        $categories = $this -> damagemodel -> getCategory();
        $user = $this -> damagemodel -> getUser();
        require_once __DIR__.'/../views/damages/create.php';
    }

    public function store(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'resources_name' => $_POST['resources_name'],
                'description' => $_POST['description'],
                'category_category_id' => $_POST['category_id'],
                'user_user_id' => $_POST['user_id']
            ];
            if($this -> damagemodel -> create($data)){
                $_SESSION['success'] = 'damages save successfull !!!';
                header('Location: /damage');
                exit;

            }else{
                $_SESSION['error'] = 'damages save error';
                header('Location: ' .BASIC_PATH. '/damage');
                exit;
            }
        }
    }

    public function edit($id){
        $damages = $this->damagemodel->getById($id);

        if(!$damages){
            $_SESSION['error'] = 'damage not found';
            header('Location: ' .BASIC_PATH. '/damage');
            exit;

        }
        $categories = $this -> damagemodel -> getCategory();
        $user = $this -> damagemodel -> getUser();

        require_once __DIR__.'/../views/damages/edit.php';
    }

    public function update($id){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'resources_name' => $_POST['resources_name'],
                'description' => $_POST['description'],
                'category_category_id' => $_POST['category_id'],
                'user_user_id' => $_POST['user_id']
            ];
            if($this->damagemodel->update($id,$data)){
                $_SESSION['success'] = 'damage update successfull !!!';
                header('Location: /damage');
                exit;
            }else{
                $_SESSION['error'] = 'damages update error';
                header('Location: /damage');
                exit;
            }
        }
    }

    public function delete($id){
        if($this->damagemodel->delete($id)){
            $_SESSION['sucess'] = 'damages delete successfull !!!';
        }else{
            $_SESSION['error'] = 'damages delete error !!!';
        }
        header('Location: /damage');
        exit;
    }
}

?>