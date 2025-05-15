<?php
require_once __DIR__ ."/../models/useremodel.php";
require_once __DIR__ ."/../includes/db.php";

class UserController{

  private $useremodel;
  public function __construct(){
    global $pdo; //connection eka gatta
    $this->useremodel = new user($pdo);

    if(!$pdo){
      throw new RuntimeException("Database Connection not found");
    }
  }

  public function index(){
    $user = $this ->useremodel -> getAll();
    require_once __DIR__.'/../views/User/index.php'; 

  }
  public function create(){
 require_once __DIR__ ."/../views/User/create.php"; 

  }
  public function store(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_id' => ($_POST['user_id']),
                'username' => trim($_POST['username']),
                'password' => $_POST['password'],
                'full_name' => trim($_POST['full_name']),
                'email' => trim($_POST['email']),
                'role' => $_POST['role']
            ];

          
            $errors = $this->validateUserData($data);

            if (empty($errors)) {
                if ($this->useremodel->creat($data)) {
                    $_SESSION['success'] = 'User created successfully';
                    header('Location: ' . BASIC_PATH . '/user');
                    exit;
                } else {
                    $_SESSION['error'] = 'Failed to create user';
                }
            } else {
                $_SESSION['form_errors'] = $errors;
                $_SESSION['form_data'] = $data;
            }

            header('Location: ' . BASIC_PATH . '/user/create');
            exit;
        }
  }
  public function edit($id){
    $user = $this->useremodel->getById($id);
    if(!$user) {
        $_SESSION['error'] = "user not found.";
        header("Location: /user");
        exit;
    }   
require_once __DIR__.'/../views/User/edit.php';
  }
  public function update($id){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $user_id = $_POST['user_id'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $full_name = $_POST['full_name'];
      $email = $_POST['email'];
      $role = $_POST['role'];
     

      if(empty($name)){
          $_SESSION['error'] = "user name is required.";
          header("Location: /user/edit.php?id=$id");
          exit;
      }
      if($this->useremodel->update($user_id, $username, $password,
       $full_name, $email, $role)){
          $_SESSION['success'] = "user updated successfully.";
          header("Location: /user");
          exit;
  }else{
      $_SESSION['error'] = "Failed to update User.";
      header("Location: /user/edit.php?id=$id");
      exit;
  }
}else{
  header("Location: /user");
  exit;
}

  }
  public function delete($id){
    if($this->useremodel->delete($id)){
      $_SESSION['success'] = "user deleted successfully.";
  }else{
      $_SESSION['error'] = "Failed to delete user.";
  }
  header("Location: /user");
  exit;

  }

   private function validateUserData($data, $userId = null)
    {
        $errors = [];

        if (empty($data['user_id'])){
          $errors['user_id'] = 'User id required';
        }

        if (empty($data['username'])) {
            $errors['username'] = 'Username is required';
        }

        if (empty($data['full_name'])) {
            $errors['full_name'] = 'Full name is required';
        }

        if (empty($data['email'])) {
            $errors['email'] = 'Email is required';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        }

        if (!isset($data['role']) || !in_array($data['role'], ['Manager', 'Admin', 'Supervicer', 'Emploee'])) {
            $errors['role'] = 'Invalid role selected';
        }


        if ((!$userId || isset($data['password'])) && empty($data['password'])) {
            $errors['password'] = 'Password is required';
        } elseif (isset($data['password']) && strlen($data['password']) < 6) {
            $errors['password'] = 'Password must be at least 6 characters';
        }

        return $errors;
    }
}

?>