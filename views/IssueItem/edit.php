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
<?php require_once __DIR__ . '/../../includes/header.php'; ?>

<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-2 col-md-8 mx-auto bg-white">
        <div class="card-header bg-dark text-white text-center rounded-top-4">
            <h3 class="mb-0">Edit Issue Item</h3>
            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php htmlspecialchars($_SESSION['error']) ?>
                </div>
                <?php unset($_SESSION['error']) ?>
                <?php endif; ?>
        </div>
        <div class="card-body">
            <form action="<?php BASIC_PATH ?>/issueitem/update/<?= $issueitem['issue_item_id'] ?>" method="POST">

                 <div class="mb-4">

                        <input type="text" class="form-control " name="quantity" id="quantity"
                            placeholder="Enter Quantity" value="<?= htmlspecialchars($issueitem['qty']) ?>" required>
                    </div>

                     <div class="mb-4">

                        <input type="text" class="form-control " name="status" id="status"
                            placeholder="Enter Status" value="<?= htmlspecialchars($issueitem['issue_item_status']) ?>" required>
                    </div>

                    <div class="mb-4">
                        <select name="inventory_id" id="inventory_id" class="form-control form-select- shadow-sm border-dark">
                            <option value="">Select Inventory</option>
                            <?php foreach ($inventory as $inve): ?>
                                <option value="<?= $inve['inventory_id'] ?>"
                                <?= $inve['inventory_id'] == $issueitem['inventory_inventory_id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($inve['inventory_id']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    

                    <div class="mb-4">
                        <select name="issue_id" id="issue_id"
                            class="form-control form-select- shadow-sm border-dark">
                            <option value="">Select Issue</option>
                            <?php foreach ($issue as $issues): ?>
                                <option value="<?= $issues['issue_id'] ?>"
                                <?= $issues['issue_id'] == $issueitem['issue_issue_id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($issues['issue_id']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark ">
                            Update Issu Item
                        </button>
                        <a href="<?php BASIC_PATH ?>/issueitem" class="btn btn-secondory">Cancal</a>

            </form>
        </div>
    </div>
</div>


</body>
</html>