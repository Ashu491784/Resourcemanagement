<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
        <h2>Branch</h2>
        <a href="<?php BASIC_PATH ?>/branch/create" class="btn btn-primary">Add To Branch</a>
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

    <pre style="display:none"><?php print_r($branch); ?></pre>

    <div class="card  col-md-12 mt-5 mx-auto"">
    <div class=" card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Branch Id</th>
                        <th>Branch Name</th>
                        <th>Branch Location</th>
                        <th>Branch Address</th>
                        <th>Contact Number 01</th>
                        <th>Contact Number 02</th>
                        <th>Contact Person</th>
                        <th>Status</th>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($branch as $bn): ?>
                        <tr>
                            <td><?= htmlspecialchars($bn['branch_id']) ?></td>
                            <td><?= htmlspecialchars($bn['branch_name']) ?></td>
                            <td><?= htmlspecialchars($bn['location']) ?> </td>
                            <td><?= htmlspecialchars($bn['address']) ?></td>
                            <td><?= htmlspecialchars($bn['contactNo01']) ?></td>
                            <td><?= htmlspecialchars($bn['contactNo02']) ?></td>
                            <td><?= htmlspecialchars($bn['contact_person']) ?></td>
                            <td><?= htmlspecialchars($bn['status']) ?></td>
                            <td>
                                <a href="<?= BASIC_PATH ?>/branch/edit/<?= $bn['branch_id'] ?>"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="<?= BASIC_PATH ?>/branch/delete" method="POST" style="display: inline;">
                                    <input type="hidden" name="branch_id" value="<?= $bn['branch_id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are Your Sure')">Delete</button>
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

