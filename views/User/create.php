<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>
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
    /* Sidebar and main content styling */
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
    <div class="container">
        <div class="card col-6 text-center">
            <div class="card-header">
                <h1 class="card-title">ADD User</h1>
            </div>
            <form method="POST" action="<?= BASIC_PATH ?>/user/store"> 
              <div class="mb-3">
                <label for="user_id" id="user">User ID::</label>
                <input type="text" class="form-control" id="user_id" name="user_id">
            </div>
            <div class="mb-3">
                <label for="username" id="user">User Name:</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="address" id="user">password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
             <div class="mb-3">
                <label for="full_name" id="user">full_name:</label>
                <input type="text" class="form-control" id="full_name" name="full_name">
            </div>
             <div class="mb-3">
                <label for="email" id="user">Email:</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>

              <div class="mb-3">
                        <label for="role" class="form-label">Role :</label>
                        <select class="form-select btn btn-outline-info" id="role" name="role" required>
                            <option value="Manager" <?= ($_SESSION['form_data']['role'] ?? '') === 'Manager' ? 'selected' : '' ?>>Manager</option>
                            <option value="Admin" <?= ($_SESSION['form_data']['role'] ?? '') === 'Admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="Supervicer" <?= ($_SESSION['form_data']['role'] ?? '') === 'Supervicer' ? 'selected' : '' ?>>Supervicer</option>
                             <option value="Emploee" <?= ($_SESSION['form_data']['role'] ?? '') === 'Emploee' ? 'selected' : '' ?>>Emploee</option>
                        </select>
                    </div>
          <button type="submit" class="btn btn-primary">Save User</button>
            <a href="/user" class="btn btn-danger">Cansel</a>
        </form>
        </div>
    </div>

</body>
</html>