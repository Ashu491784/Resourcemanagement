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
    



<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']) ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit issue</h4>
        <form method="POST" action="<?= BASIC_PATH ?>/issue/update/<?= $issue['issue_id'] ?>">
            <div class="mb-3">
                <label for="issue_date" class="form-label">Issue Date *</label>
                <input type="date" class="form-control" id="issue_date" name="issue_date"
                            value="<?= htmlspecialchars($_SESSION['form_data']['issue_date'] ?? $issue['issue_date']) ?>"
                            required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">User ID *</label>
                <select name="user_user_id" id="user_user_id" class="form-select">
                    <option value="">--Select User</option>
                    <?php foreach ($user as $us): ?>
                        <option value="<?= $us['user_id']?>">
                            <?= htmlspecialchars($us['username'])?>
                        </option>
                        <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="employee_id" class="form-label">Employee ID *</label>
                <select name="employee_employee_id" id="employee_employee_id" class="form-select">
                    <option value="">--Select User</option>
                    <?php foreach ($employee as $em): ?>
                        <option value="<?= $em['employee_id']?>">
                            <?= htmlspecialchars($em['frist_name'])?>
                        </option>
                        <?php endforeach ?>
                </select>
            </div>
             <div class="mb-3">
                        <label for="status" class="form-label">Status *</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="Active" <?= ($_SESSION['form_data']['status'] ?? $issue['status']) === 'Active' ? 'selected' : '' ?>>Active</option>
                            <option value="Deactive" <?= ($_SESSION['form_data']['status'] ?? $issue['status']) === 'Deactive' ? 'selected' : '' ?>>Deactive</option>
                        </select>
                    </div>
            <button type="submit" class="btn btn-primary">Update Issue</button>
            <a href="<?= BASIC_PATH?>/issue" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
</body>
</html>