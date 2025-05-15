<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
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
        <h1>ADD Employees</h1>
        <form method="POST" action="<?= BASIC_PATH ?>/employee/store"> 
              <div class="mb-3">
                <label for="employee_id" id="employees">Employee ID:</label>
                <input type="text" class="form-control" id="employee_id" name="employee_id">
            </div>
            <div class="mb-3">
                <label for="frist_name" id="employees">First name:</label>
                <input type="text" class="form-control" id="frist_name" name="frist_name">
            </div>
            <div class="mb-3">
                <label for="last_name" id="employees">Last name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>
             <div class="mb-3">
                <label for="email" id="employees">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
             <div class="mb-3">
                <label for="contact" id="employees">Contact:</label>
                <input type="number" class="form-control" id="contact" name="contact">
            </div>
             <div class="mb-3">
                <label for="wtsappNo" id="employees">Whatsapp No:</label>
                <input type="number" class="form-control" id="wtsappNo" name="wtsappNo">
            </div>
            <div class="mb-3">
                <label for="Description" id="description" class="form-label">Description</label>
                <textarea class="form-control"  id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-2">
                <label for="job_position_id" class=form-label>Job position ID</label>
                <select name="job_position_id" id="job_position_id" class="form-select">
                    <option value="">--Select Job position--</option>
                    <?php foreach ($employees as $employe): ?>
                        <option value="<?= $employe['category_id'] ?>">
                            <?= htmlspecialchars($employe['position_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
             <div class="mb-2">
                <label for="branch_id" class=form-label>Branch ID</label>
                <select name="branch_id" id="branch_id" class="form-select">
                    <option value="">--Select branch--</option>
                    <?php foreach ($employees as $employe): ?>
                        <option value="<?= $employe['branch_id'] ?>">
                            <?= htmlspecialchars($employe['branch_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
             <div class="mb-2">
                <label for="company_id" class=form-label>Company ID</label>
                <select name="company_id" id="company_id" class="form-select">
                    <option value="">--Select Company--</option>
                    <?php foreach ($employees as $employe): ?>
                        <option value="<?= $employe['company_id'] ?>">
                            <?= htmlspecialchars($employe['company_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Category</button>
            <a href="/employees" class="btn btn-danger">Cansel</a>
        </form>
    </div>
    <?php include __DIR__.'../../../includes/footer.php' ?>
</body>
</html>