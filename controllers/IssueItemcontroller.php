<?php

require_once __DIR__ . '/../models/issueItemModel.php';
require_once __DIR__ . '/../includes/db.php';

class IssueItemcontroller{
    private $issueItemModel;
    private $inventorymodel;
    private $issueModel;

    public function __construct(){
        global $pdo;

        $this->issueItemModel = new Issueitems($pdo);
        $this->inventorymodel = new Inventory($pdo);
        $this->issueModel = new Issue($pdo);
    }

    public function index(){
        $issueModel = $this->issueItemModel->getAll();
        require_once __DIR__ . '/../views/issueitem/index.php';
    }

    public function create(){
        $inventory = $this->issueItemModel->getInventory();
        $issue = $this->issueItemModel->getIssue();
        require_once __DIR__ . '/../views/issueitem/create.php';
    }

    public function store(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'qty'=>$_POST['quantity'],
                'issue_item_status'=>$_POST['status'],
                'inventory_inventory_id'=>$_POST['inventory_id'],
                'issue_issue_id'=>$_POST['issue_id']
                
                
            ];
            if($this->issueItemModel->create($data)){
                $_SESSION['success'] = 'issue item save successfull !!';
                header('Location: /issueitem');
                exit;
            }else{
                $_SESSION['error'] = 'issue item save error !!';
                header('Location: ' .BASIC_PATH. '/issueitem');
                exit;

            }
        }
    }

    public function edit($id){
        $issueitem = $this->issueItemModel->getById($id);
        if(!$issueitem){
            $_SESSION['error'] = 'issue item is not found !!';
            header('Location: ' .BASIC_PATH. '/issueitem');
            exit;
        }
         $inventory = $this->issueItemModel->getInventory();
        $issue = $this->issueItemModel->getIssue();

        require_once __DIR__ .'/../views/issueitem/edit.php';
    }

    public function update($id){if($_SERVER['REQUEST_METHOD'] === 'POST'){
             $data = [
                'qty'=>$_POST['quantity'],
                'issue_item_status'=>$_POST['status'],
                'inventory_inventory_id'=>$_POST['inventory_id'],
                'issue_issue_id'=>$_POST['issue_id']
                
             ];
             if($this->issueItemModel->update($id,$data)){
                $_SESSION['success'] = 'issue item update successfull !!';
                header('Location: /issueitem');
                exit;
             }else{
                $_SESSION['error'] = 'issue item update error !!';
                header('Location: ' .BASIC_PATH. '/issueitem');
                exit;
             }
        }}

    public function delete($id){
         if($this->issueItemModel->delete($id)){
            $_SESSION['success'] = 'issue item delete successfull !!';
        }else{
            $_SESSION['error'] = 'issue item delete error !!';
        }
        header('Location: /issueitem');
        exit;
    }
}

?>