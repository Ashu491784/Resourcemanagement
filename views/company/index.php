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
    <a?php

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
    
    <div class="d-flex justify-content-between align-items-center mb-4 p-4">
        <h2>Company</h2>
        
        <a href="<?php BASIC_PATH ?>/company/create" class="btn btn-warning">Add To Company</a>
    </div>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['success']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['error']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <pre style="display:none"><?php print_r($company); ?></pre>
    <div class="card col-md-12 mt-5 mx-auto center">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Company Id</th>
                            <th>Company Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Contact Number 01</th>
                            <th>Contact Number 02</th>
                            <th>Website</th>
                            <th>Locatin</th>
                            <th>Status</th>
                            <th>Create Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($company as $com): ?>
                            <tr>
                                <td><?= htmlspecialchars($com['company_id']) ?></td>
                                <td><?= htmlspecialchars($com['company_name']) ?></td>
                                <td><?= htmlspecialchars($com['address']) ?></td>
                                <td><?= htmlspecialchars($com['email']) ?></td>
                                <td><?= htmlspecialchars($com['contactNo01']) ?></td>
                                <td><?= htmlspecialchars($com['contactNo02']) ?></td>
                                <td><?= htmlspecialchars($com['website']) ?></td>
                                <td><?= htmlspecialchars($com['location']) ?></td>
                                <td><?= htmlspecialchars($com['status']) ?></td>
                                <td><?= htmlspecialchars($com['create_date']) ?></td>
                                <td>
                                    <a href="<?= BASIC_PATH ?>/company/edit/<?= $com['company_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="<?= BASIC_PATH ?>/company/delete" method="POST"style="display: inline;">
                                        <input type="hidden" name="company_id" value="<?= $com['company_id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger text-white"
                                        onclick="return confirm('Are Your Sure')">Delete</button>
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