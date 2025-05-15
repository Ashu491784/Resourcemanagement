<?php
session_start(); //errors handle krganna display karaganna

error_reporting(E_ALL);
ini_set("display_errors", 1);

//Automatically detect basic path
$basepath = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']); //basicma thiyen path eka replace wenw empty ekakata
define('BASIC_PATH', $basepath);

require_once __DIR__ . "/includes/db.php";
require_once __DIR__ . '/controllers/DashboardController.php';
require_once __DIR__ . '/controllers/Employeecontroller.php';
require_once __DIR__ . '/controllers/BranchController.php';
require_once __DIR__ . '/controllers/UserController.php';
require_once __DIR__ . '/controllers/CategoryController.php';
require_once __DIR__ . '/controllers/IssueController.php';
require_once __DIR__ . '/controllers/JobController.php';
require_once __DIR__ . '/controllers/Damagecontroller.php';
require_once __DIR__ . '/controllers/ResourceController.php';
require_once __DIR__ . '/controllers/inventoryController.php';
require_once __DIR__ . '/controllers/CompanyController.php';
require_once __DIR__ . '/controllers/IssueItemcontroller.php';
require_once __DIR__ . '/controllers/BranchController.php';

try {
    $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //file eke path eka hoyagannw 
    $request = str_replace($basepath, '', $requestUri); //awashya tika witharai filepath eke ganne base path ekat replace wenw
    switch ($request) {
       
            case '/':
                case '/dashboard':
                    $dashboardController = new DashboardController();
                    $dashboardController->index();
                    break;

                 case '/employee':
            $controller = new Employeecontroller();
            $controller->index();
            break;

        case '/employee/creat':
            $controller = new Employeecontroller();
            $controller->create();
            break;

        case '/employee/store':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller = new Employeecontroller();
                $controller->store();
            } else {
                header('location: ' . BASIC_PATH . '/employee');
            }
            break;
        case '/employee/edit':
            $controller = new Employeecontroller();
            $controller->edit($_GET['id']);
            break;
        case (preg_match('/^\/employee\/edit\/(\d+)/', $request, $matches) ? true : false):
            $controller = new Employeecontroller();
            $controller->edit($matches[1]);
            break;
        case (preg_match('/^\/employee\/update\/(\d+)/', $request, $matches) ? true : false):
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller = new Employeecontroller();
                $controller->update($matches[1]);
            } else {
                header('Location: ' . BASIC_PATH . '/employee');
            }
            break;
        case (preg_match('/^\/employee\/delete\/(\d+)/', $request, $matches) ? true : false):
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller = new Employeecontroller();
                $controller->delete($matches[1]);
            } else {
                header('Location: ' . BASIC_PATH . '/employee');
            }
            break;


                 case '/user':
            $controller = new UserController();
            $controller->index();
            break;

            case '/user/create':
            $controller = new UserController();
            $controller->create();
            break;

        case '/user/store':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller = new UserController();
                $controller->store();
            } else {
                header('location: ' . BASIC_PATH . '/user');
            }
            break;
        case '/user/edit':
            $controller = new UserController();
            $controller->edit($_GET['id']);
            break;
        case (preg_match('/^\/user\/edit\/(\d+)/', $request, $matches) ? true : false):
            $controller = new UserController();
            $controller->edit($matches[1]);
            break;
        case (preg_match('/^\/user\/update\/(\d+)/', $request, $matches) ? true : false):
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller = new UserController();
                $controller->update($matches[1]);
            } else {
                header('Location: ' . BASIC_PATH . '/user');
            }
            break;
        case (preg_match('/^\/user\/delete\/(\d+)/', $request, $matches) ? true : false):
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller = new UserController();
                $controller->delete($matches[1]);
            } else {
                header('Location: ' . BASIC_PATH . '/user');
            }
            break;

              case '/categories':
            $controller = new CategoryController();
            $controller->index();
            break;

            case '/categories/create':
            $controller = new CategoryController();
            $controller->create();
            break;

        case '/categories/store':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller = new CategoryController();
                $controller->store();
            } else {
                header('location: ' . BASIC_PATH . '/categories');
            }
            break;
            
        case '/categories/edit':
            $controller = new CategoryController();
            $controller->edit($_GET['id']);
            break;
        case (preg_match('/^\/categories\/edit\/(\d+)/', $request, $matches) ? true : false):
            $controller = new CategoryController();
            $controller->edit($matches[1]);
            break;
        case (preg_match('/^\/categories\/update\/(\d+)/', $request, $matches) ? true : false):
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller = new CategoryController();
                $controller->update($matches[1]);
            } else {
                header('Location: ' . BASIC_PATH . '/categories');
            }
            break;
        case (preg_match('/^\/categories\/delete\/(\d+)/', $request, $matches) ? true : false):
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller = new CategoryController();
                $controller->delete($matches[1]);
            } else {
                header('Location: ' . BASIC_PATH . '/categories');
            }
            break;

           case '/issue':
            $issuecontroll = new IssueController();
            $issuecontroll->index();
            break;

        case '/issue/create':
            $issuecontroll = new IssueController();
            $issuecontroll->create();
            break;

        case '/issue/store':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $issuecontroll = new IssueController();
                $issuecontroll->store();
                break;
            } else {
                header('Location: ' . BASIC_PATH . '/issue');
            }

        case (preg_match('/^\/issue\/edit\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne
            $issuecontroll = new IssueController();
            $issuecontroll->edit($matches[1]);
            break;

        case (preg_match('/^\/issue\/update\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne  
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $issuecontroll = new IssueController();
                $issuecontroll->update($matches[1]);
            } else {
                header('Location: ' . BASIC_PATH . '/issue');
            }
            break;

        case '/issue/delete':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $issuecontroll = new IssueController();
                $issuecontroll->delete($_POST['issue_id']);
            } else {
                header('Location: ' . BASIC_PATH . '/issue');
            }
            break;

             case '/job':
            $jobcontroll = new JobController();
            $jobcontroll->index();
            break;

        case '/job/create':
            $jobcontroll = new JobController();
            $jobcontroll->create();
            break;

        case '/job/store':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $jobcontroll = new JobController();
                $jobcontroll->store();
            } else {
                header('Location: ' . BASIC_PATH . '/job');
            }
            break;

        case (preg_match('/^\/job\/edit\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne
            $jobcontroll = new JobController();
            $jobcontroll->edit($matches[1]);
            break;

        case (preg_match('/^\/job\/update\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne  
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $jobcontroll = new JobController();
                $jobcontroll->update($matches[1]);
            } else {
                header('Location: ' . BASIC_PATH . '/job');
            }
            break;

        case '/job/delete':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $jobcontroll = new JobController();
                $jobcontroll->delete($_POST['job_position_id']);
            } else {
                header('Location: ' . BASIC_PATH . '/job');
            }
            break;

             case '/damage':
            $damagecontroll = new Damagecontroller();
            $damagecontroll->index();
            break;

        case '/damage/create':
            $damagecontroll = new Damagecontroller();
            $damagecontroll->create();
            break;

        case '/damage/store':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $damagecontroll = new Damagecontroller();
                $damagecontroll->store();
                break;
            } else {
                header('Location: ' . BASIC_PATH . '/damage');
            }
            break;

        case (preg_match('/^\/damage\/edit\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne
            $damagecontroll = new Damagecontroller();
            $damagecontroll->edit($matches[1]);
            break;

        case (preg_match('/^\/damage\/update\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne  
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $damagecontroll = new Damagecontroller();
                $damagecontroll->update($matches[1]);
            } else {
                header('Location: ' . BASIC_PATH . '/damage');
            }
            break;

        case '/damage/delete':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $damagecontroll = new Damagecontroller();
                $damagecontroll->delete($_POST['damege_id']);
            } else {
                header('Locatin: ' . BASIC_PATH . '/damage');
            }
            break;

            case '/resource':
            $resourceconroll = new ResourceController();
            $resourceconroll->index();
            break;

        case '/resource/create':
            $resourceconroll = new ResourceController();
            $resourceconroll->create();
            break;

        case '/resource/store':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $resourceconroll = new ResourceController();
                $resourceconroll->store();
                break;
            } else {
                header('Location: ' . BASIC_PATH . '/resource');
            }
            break;

        case (preg_match('/^\/resource\/edit\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne
            $resourceconroll = new ResourceController();
            $resourceconroll->edit($matches[1]);
            break;

        case (preg_match('/^\/resource\/update\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne  
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $resourceconroll = new ResourceController();
                $resourceconroll->update($matches[1]);
            } else {
                header('Location: ' . BASIC_PATH . '/resource');
            }
            break;

        case '/resource/delete':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $resourceconroll = new ResourceController();
                $resourceconroll->delete($_POST['resources_id']);

            } else {
                header('Location: ' . BASIC_PATH . '/resource');

            }
            break;

             case '/inventory':
            $inventorycontroller = new inventoryController();
            $inventorycontroller->index();
            break;

        case '/inventory/create':
            $inventorycontroller = new inventoryController();
            $inventorycontroller->create();
            break;

        case '/inventory/store':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $inventorycontroller = new inventoryController();
                $inventorycontroller->store();
                break;
            } else {
                header('Location: ' . BASIC_PATH . '/inventory');
            }

        case (preg_match('/^\/inventory\/edit\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne
            $inventorycontroller = new inventoryController();
            $inventorycontroller->edit($matches[1]);
            break;

        case (preg_match('/^\/inventory\/update\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne  
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $inventorycontroller = new inventoryController();
                $inventorycontroller->update($matches[1]);
            } else {
                header('Location: ' . BASIC_PATH . '/inventory');
            }
            break;

        case '/inventory/delete':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $inventorycontroller = new inventoryController();
                $inventorycontroller->delete($_POST['inventory_id']);
            } else {
                header('Location: ' . BASIC_PATH . '/inventory');
            }
            break;

             case '/company':
            $companycontroll = new CompanyController();
            $companycontroll->index();
            break;

        case '/company/create':
            $companycontroll = new CompanyController();
            $companycontroll->create();
            break;

        case '/company/store':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $companycontroll = new CompanyController();
                $companycontroll->store();

            } else {
                header('Location: ' . BASIC_PATH . '/company');
            }
            break;

        case (preg_match('/^\/company\/edit\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne
            $companycontroll = new CompanyController();
            $companycontroll->edit($matches[1]);
            break;

        case (preg_match('/^\/company\/update\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne  
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $companycontroll = new CompanyController();
                $companycontroll->update($matches[1]);
            } else {
                header('Location: ' . BASIC_PATH . '/company');
            }
            break;

        case '/company/delete':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $companycontroll = new CompanyController();
                $companycontroll->delete($_POST['company_id']);
            } else {
                header('Locatin: ' . BASIC_PATH . '/company');
            }
            break;

            case '/issueitem':
            $issueitemcontroller = new IssueItemcontroller();
            $issueitemcontroller->index();
            break;

        case '/issueitem/create':
            $issueitemcontroller = new IssueitemController();
            $issueitemcontroller->create();
            break;

        case '/issueitem/store':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $issueitemcontroller = new IssueitemController();
                $issueitemcontroller->store();
                break;
            } else {
                header('Location: ' . BASIC_PATH . '/issueitem');
            }

        case (preg_match('/^\/issueitem\/edit\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne
            $issueitemcontroller = new IssueitemController();
            $issueitemcontroller->edit($matches[1]);
            break;

        case (preg_match('/^\/issueitem\/update\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne  
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $issueitemcontroller = new IssueitemController();
                $issueitemcontroller->update($matches[1]);
            } else {
                header('Location: ' . BASIC_PATH . '/issueitem');
            }
            break;
            case '/issueitem/delete':
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $issueitemcontroller = new IssueitemController();
                    $issueitemcontroller->delete($_POST['issue_item_id']);
                }else{
                    header('Location: ' .BASIC_PATH. '/issueitem');
                } break;

            case '/branch':
            $branchcontroller = new BranchController();
            $branchcontroller->index();
            break;

        case '/branch/create':
            $branchcontroller = new BranchController();
            $branchcontroller->create();
            break;

        case '/branch/store':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $branchcontroller = new BranchController();
                $branchcontroller->store();
            } else {
                header('Location: ' . BASIC_PATH . '/branch');
            }
            break;
        case (preg_match('/^\/branch\/edit\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne
            $branchcontroller = new BranchController();
            $branchcontroller->edit($matches[1]);
            break;

        case (preg_match('/^\/branch\/update\/(\d+)$/', $request, $matches) ? true : false):  //rejes expretion krnne  
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $branchcontroller = new BranchController();
                $branchcontroller->update($matches[1]);
            } else {
                header('Location: ' . BASIC_PATH . '/branch');
            }
            break;

        case '/branch/delete':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $branchcontroller = new BranchController();
                $branchcontroller->delete($_POST['branch_id']);
            } else {
                header('Location: ' . BASIC_PATH . '/branch');
            }
            break;

            
           
           
                }       
                } catch (PDOException $e) {
    die("Database Error:" . $e->getMessage());

} catch (Exception $e) {
    die("Application Error:" . $e->getMessage());
}
?>
