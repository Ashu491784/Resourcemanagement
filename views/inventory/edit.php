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
    <?php include __DIR__.'../../../includes/header.php' ?>
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </div>
        <?php unset($_SESSION['error']) ?>
        <?php endif?>
        <style>
    
    .main-container {
        display: flex;
        min-height: 100vh;
    }
    
    .sidebar {
        width: 250px;
        background:rgb(203, 64, 194);
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

    .card{
        width: 100%;
        max-width: 600px;
        margin: 20px auto;
    }
</style>
<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-2 col-md-8 mx-auto bg-white">
        <div class="ard-header bg-dark text-white text-center rounded-top-4">
            <h3 class="mb-0">Edit Inventory</h3>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php htmlspecialchars($_SESSION['error']) ?>
                </div>
                <?php unset($_SESSION['error']) ?>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <form action="<?php BASIC_PATH ?>/inventory/update/<?= $inventories['inventory_id'] ?>" method="POST">
                <div class="mb-4">

                    <input type="date" class="form-control " name="added_date" id="added_date"
                        placeholder="Enter Added Date" value="<?= htmlspecialchars($inventories['added_date']) ?>" required>
                </div>
                <div class="mb-4">

                    <input type="text" class="form-control " name="added_quantity" id="added_quantity"
                        placeholder="Enter Added Quantity" value="<?= htmlspecialchars($inventories['added_quantity']) ?>" required>
                </div>
                <div class="mb-4">

                    <input type="text" class="form-control " name="current_quantity" id="current_quantity"
                        placeholder="Enter Current Quantity" value="<?= htmlspecialchars($inventories['current_quantity']) ?>" required>
                </div>

                <div class="mb-4">

                        <input type="text" class="form-control " name="emp_email" id="emp_email"
                            placeholder="Enter Employee Email" required>
                    </div>
                <div class="mb-4">
                    <input type="file" name="image" class="form-control" id="image" name="image" value="<?= htmlspecialchars($inventories['image']) ?>">
                    <input type="submit" value="Upload Image">
                </div>

                <div class="mb-4">

                    <input type="text" class="form-control " name="minimum_threshold" id="minimum_threshold"
                        placeholder="Enter Minimum Threshold" value="<?= htmlspecialchars($inventories['minimum_threshold']) ?>" required>
                </div>



                <div class="mb-4">
                    <select name="resources_id" id="resources_id"
                        class="form-control form-select- shadow-sm border-dark">
                        <option value="">Select User</option>
                        <?php foreach ($resources as $resourceses): ?>
                            <option value="<?= $resourceses['resources_id'] ?>"
                            <?= $resourceses['resources_id'] == $inventories['resources_resources_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($resourceses['resources_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <select name="user_id" id="user_id" class="form-control form-select- shadow-sm border-dark">
                        <option value="">Select User</option>
                        <?php foreach ($user as $users): ?>
                            <option value="<?= $users['user_id'] ?>"
                            <?= $users['user_id'] == $inventories['user_user_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($users['username']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-dark ">
                        Update Inventory
                    </button>
                    <a href="<?php BASIC_PATH ?>/inventory" class="btn btn-secondory">Cancal</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>