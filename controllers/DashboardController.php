<?php
class DashboardController
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function index()
    {
        // Get counts for dashboard cards
        // $branchCount = $this->pdo->query("SELECT COUNT(*) FROM branch")->fetchColumn();
        // $categoryCount = $this->pdo->query("SELECT COUNT(*) FROM category")->fetchColumn();
        // $companyCount = $this->pdo->query("SELECT COUNT(*) FROM company")->fetchColumn();
        // $employeeCount = $this->pdo->query("SELECT COUNT(*) FROM employee")->fetchColumn();
        // $issueCount = $this->pdo->query("SELECT COUNT(*) FROM issue")->fetchColumn();
        // $resourceCount = $this->pdo->query("SELECT COUNT(*) FROM resources")->fetchColumn(); 

     
        require_once __DIR__ . '/../views/dashboard.php';
    }
}
?>