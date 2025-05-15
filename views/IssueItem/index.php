<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php
error_log(E_ALL);
ini_set('display_errors',1);


?>

<?php include __DIR__.'../../../includes/header.php' ?>
<div class="container">
    <style>
    /* Sidebar and main content styling */
    .main-container {
        display: flex;
        min-height: 100vh;
    }
    
    .sidebar {
        width: 250px;
   
        padding: 20px;
        transition: all 0.3s;
        height: 100vh;
        position: fixed;
        overflow-y: auto;
    }
    
    .sidebar.collapsed {
        width: 60px;
    }
    
    .sidebar.collapsed .nav-link-text {
        display: none;
    }
    
    .main-content {
        flex: 1;
        margin-left: 250px;
        padding: 20px;
        transition: all 0.3s;
    }
    
    .sidebar.collapsed + .main-content {
        margin-left: 60px;
    }
    
    .toggle-btn {
        position: fixed;
        left: 10px;
        top: 10px;
        z-index: 1000;
    }
</style>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4 p-4">
        <h1>Issue</h1>
        <a href="<?php BASIC_PATH ?>/issueitem/create" class="btn btn-warning">Add Issue Item</a>
    </div>
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['success']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['success']) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_SESSION['error']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['error']) ?>
            <?php endif; ?>

            <pre style="display:none"><?php print_r($issueitem); ?></pre>

            <div class="card col-md-12 mt-5 mx-auto">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                <th>Issue Item Id</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Inventory Id</th>
                                <th>Issue Id</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($issueitem as $ist): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($ist['issue_item_id']) ?></td>
                                        <td><?= htmlspecialchars($ist['qty']) ?></td>
                                        <td><?= htmlspecialchars($ist['issue_item_status']) ?></td>
                                        <td><?=htmlspecialchars($ist['inventory_inventory_id']) ?></td>
                                        <td><?= htmlspecialchars($ist['issue_issue_id']) ?></td>
                                        <td>
                                            <a href="<?php BASIC_PATH ?>/issueitem/edit/<?= $ist['issue_item_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="<?php BASIC_PATH ?>/issueitem/delete" method="POST" style="display: inline;">
                                                <input type="hidden" name="issue_item_id" value="<?= $ist['issue_item_id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-danger text-white"
                                                onclick="return confirm('Are You Sure')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

</div>


</body>
</html>