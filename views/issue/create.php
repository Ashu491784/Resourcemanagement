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
    
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </div>
        <?php unset($_SESSION['error']) ?>
        <?php endif?>
        
<div class="container">
<div class="card mt-3  border-primary mb-3 col-6">
    <div class="card-body">
        <h4 class="card-title">Add Your Isses</h4>
        <form method="POST" action="<?= BASIC_PATH ?>/issue/store">
            <div class="mb-2">
                <label for="date" class=form-label>Issue Date</label>
                <input type="date" class="form-control" id="issue_date" name="issue_date" required>
            </div>
            <div class="mb-2">
                <label for="user_id" class=form-label>User ID</label>
                <select name="user_user_id" id="user_user_id" class="form-select">
                    <option value="">--Select user--</option>
                    <?php foreach ($user as $us): ?>
                        <option value="<?= $us['user_id'] ?>">
                            <?= htmlspecialchars($us['username']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
             <div class="mb-2">
                <label for="employee_id" class=form-label>Employee ID</label>
                <select name="employee_employee_id" id="employee_employee_id" class="form-select">
                    <option value="">--Select Employee--</option>
                    <?php foreach ($employee as $em): ?>
                        <option value="<?= $em['employee_id'] ?>">
                            <?= htmlspecialchars($em['frist_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
             <div class="mb-3">
                        <label for="status" class="form-label">Status :</label>
                        <select class="form-select btn btn-outline-info" id="status" name="status" required>
                            <option value="Active" <?= ($_SESSION['form_data']['status'] ?? '') === 'Active' ? 'selected' : '' ?>>Active</option>
                            <option value="Deactive" <?= ($_SESSION['form_data']['status'] ?? '') === 'Deactive' ? 'selected' : '' ?>>Deactive</option>
                        </select>
                    </div>
            <button type="submit" class="btn btn-primary">Save issue</button>
            <a href="<?= BASIC_PATH ?>/issue" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

</div>
</div>
    
</body>
</html>