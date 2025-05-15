<?php
require_once __DIR__ ."/../models/categorymodel.php";
require_once __DIR__ ."/../includes/db.php";

class CategoryController{

  private $categorymodel;
  public function __construct(){
    global $pdo; 
    $this->categorymodel = new categories($pdo);

    if(!$pdo){
      throw new RuntimeException("Database Connection not found");
    }
  }

  public function index(){
    $categories = $this ->categorymodel -> getAll();
    require_once __DIR__.'/../views/category/index.php'; 

  }
  public function create(){
 require_once __DIR__ ."/../views/category/create.php"; 

  }
  public function store(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $category_id = $_POST['category_id'];
      $category_name = $_POST['category_name'];
      $status = $_POST['status'];
    } 
    if(empty($category_id)){ 
      $_SESSION['error'] = 'category ID is required';  
    }
     if(empty($category_name)){ 
      $_SESSION['error'] = 'category name is required';  
    }

   if( $this ->categorymodel->create($category_id,$category_name, $status)){ 
    $_SESSION['success'] = 'Category create successfull';
   
    exit;
  
  }else{  
    $_SESSION['error'] = 'failed to create Category';
  }
    header('Location: ' . BASIC_PATH . '/categories');
            exit;
  }
  public function edit($id){
    $categories = $this->categorymodel->getById($id);
    if(!$categories) {
        $_SESSION['error'] = "Category not found.";
        header("Location: /categories");
        exit;
    }   
require_once __DIR__.'/../views/category/edit.php';
}

public function update($id){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $category_name = $_POST['category_name'];
      $status = $_POST['status'];

      if(empty($category_name)){
          $_SESSION['error'] = "Category name is required.";
          header("Location: /categories/edit.php?id=$id");
          exit;
      }
      if($this->categorymodel->update( $category_name, $status)){
          $_SESSION['success'] = "Category updated successfully.";
          header("Location: /categories");
          exit;
  }else{
      $_SESSION['error'] = "Failed to update category.";
      header("Location: /categories/edit.php?id=$id");
      exit;
  }
}else{
  header("Location: /categories");
  exit;
}

  }
  public function delete($id){
    if($this->categorymodel->delete($id)){
      $_SESSION['success'] = "Category deleted successfully.";
  }else{
      $_SESSION['error'] = "Failed to delete category.";
  }
  header("Location: /categories");
  exit;

  }
}

?>