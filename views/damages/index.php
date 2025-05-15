<?php
error_log(E_ALL);
ini_set('display_errors',1);

require_once __DIR__.'/../../includes/header.php'?>

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
        <h1>Damages</h1>
        <a href="<?php BASIC_PATH ?>/damage/create" class="btn btn-warning">Add Damage</a>
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

            <pre style="display:none"><?php print_r($damage); ?></pre>

            <div class="card col-md-12 mt-5 mx-auto">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                <th>Damage Id</th>
                                <th>Resources Name</th>
                                <th>Description</th>
                                <th>Category Id</th>
                                <th>User Id</th>
                                <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($damage as $dm): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($dm['damege_id']) ?></td>
                                        <td><?= htmlspecialchars($dm['resources_name']) ?></td>
                                        <td><?= htmlspecialchars($dm['description']) ?></td>
                                        <td><?= htmlspecialchars($dm['category_category_id']) ?></td>
                                        <td><?= htmlspecialchars($dm['user_user_id']) ?></td>
                                        <td>
                                            <a href="<?php BASIC_PATH ?>/damage/edit/<?= $dm['damege_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="<?php BASIC_PATH ?>/damage/delete" method="POST" style="display: inline;">
                                                <input type="hidden" name="damege_id" value="<?= $dm['damege_id'] ?>">
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

