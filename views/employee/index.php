
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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

<div class="main-container">
 
    <div class="sidebar" id="sidebar">
        <nav class="nav">
            <?php require_once __DIR__. '/../../includes/header.php'; ?>
        </nav>
    </div>

  
    <div class="main-content">
        <button class="btn btn-secondary toggle-btn" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?= htmlspecialchars($_SESSION['success']) ?></div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']) ?></div>
            <?php unset($_SESSION['error']); ?> 
        <?php endif; ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Employee</h2>
            <a href="<?= BASIC_PATH ?>/employee/creat" class="btn btn-primary">Add New Employee</a>
        </div>

        <pre style="display:none"><?php print_r($employee); ?></pre>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Whatsapp No</th>
                                <th>Status</th>
                                <th>Job Position</th>
                                <th>Branch</th>
                                <th>Company</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($employee as $em): ?>
                                <tr>
                                    <td><?= htmlspecialchars($em['employee_id']) ?></td>
                                    <td><?= htmlspecialchars($em['frist_name']) ?></td>
                                    <td><?= htmlspecialchars($em['last_name']) ?></td>
                                    <td><?= htmlspecialchars($em['email']) ?></td>
                                    <td><?= htmlspecialchars($em['contact']) ?></td>
                                    <td><?= htmlspecialchars($em['status']) ?></td>
                                    <td><?= htmlspecialchars($em['job_position_id']) ?></td>
                                    <td><?= htmlspecialchars($em['branch_id']) ?></td>
                                    <td><?= htmlspecialchars($em['company_id']) ?></td>
                                    <td>
                                        <a href="<?= BASIC_PATH ?>/employee/edit/<?= $em['employee_id'] ?>"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="<?= BASIC_PATH ?>/employee/delete/<?= $em['employee_id'] ?>"
                                            method="POST" style="display: inline;">
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
</div>

<script>
 
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('collapsed');
    });
</script>




