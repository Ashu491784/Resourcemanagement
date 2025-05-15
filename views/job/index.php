<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../../includes/header.php';

?>
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
    <h2>Job Position</h2>
    <a href="<?php BASIC_PATH ?>/job/create" class="btn btn-warning">Add Job</a>
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

 <pre style="display:none"><?php print_r($job) ?></pre>

    <div class="card col-md-12 mt-5 mx-auto">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Job Position Id</th>
                            <th>Position Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($job as $jb): ?>
                            <tr>
                                <td><?= htmlspecialchars($jb['job_position_id']) ?></td>
                                <td><?= htmlspecialchars($jb['position_name']) ?></td>
                                <td><?= htmlspecialchars($jb['status']) ?></td>
                                <td>
                                    <a href="<?= BASIC_PATH ?>/job/edit/<?= $jb['job_position_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="<?= BASIC_PATH ?>/job/delete" method="POST" style="display: inline;">
                                        <input type="hidden" name="job_position_id" value="<?= $jb['job_position_id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger text-white"
                                        onclick="return confirm('Are Your Sure')">Delete</button> </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

