
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
 <?php include __DIR__.'../../../includes/header.php' ?>

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
            <a href="<?= BASIC_PATH ?>/user/create" class="btn btn-primary">Add New User</a>
        </div>

        <pre style="display:none"><?php print_r($user); ?></pre>

        <div class="card col-12">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>User Name</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Role</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($user as $us): ?>
                                <tr>
                                    <td><?= htmlspecialchars($us['user_id']) ?></td>
                                    <td><?= htmlspecialchars($us['username']) ?></td>
                                    <td><?= htmlspecialchars($us['full_name']) ?></td>
                                    <td><?= htmlspecialchars($us['email']) ?></td>
                                    <td><?= htmlspecialchars($us['role']) ?></td>
                                   
                                    <td>
                                        <a href="<?= BASIC_PATH ?>/user/edit/<?= $us['user_id'] ?>"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="<?= BASIC_PATH ?>/user/delete/<?= $us['user_id'] ?>"
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




