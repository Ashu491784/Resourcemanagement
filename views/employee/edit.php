

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']) ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit Employee</h4>
        <form method="POST" action="<?= BASIC_PATH ?>/employees/update/<?= $employees['employee_id'] ?>">
            <div class="mb-3">
                <label for="employee_id" class="form-label">Employee ID *</label>
                <textarea class="form-control" id="employee_id" name="employee_id"
                    rows="3"><?= htmlspecialchars($employees['employee_id']) ?></textarea>
            </div>
        <div class="mb-3">
                <label for="frist_name" class="form-label">First Name *</label>
                <textarea class="form-control" id="frist_name" name="frist_name"
                    rows="3"><?= htmlspecialchars($employees['frist_name']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name *</label>
                <textarea class="form-control" id="last_name" name="last_name"
                    rows="3"><?= htmlspecialchars($employees['last_name']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email  *</label>
                <textarea class="form-control" id="email" name="email"
                    rows="3"><?= htmlspecialchars($employees['email']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="job_position_id" class="form-label">Job Possition ID *</label>
                <select name="job_position_id" id="job_position_id" class="form-select">
                    <option value="">--Select Job position</option>
                    <?php foreach ($employees as $employe): ?>
                        <option value="<?= $employe['job_position_id']?>">
                            <?= htmlspecialchars($employe['position_name'])?>
                        </option>
                        <?php endforeach ?>
                </select>
            </div>
              <div class="mb-3">
                <label for="branch_id" class="form-label">Branch ID *</label>
                <select name="branch_id" id="branch_id" class="form-select">
                    <option value="">--Select Branch</option>
                    <?php foreach ($employees as $employe): ?>
                        <option value="<?= $employe['branch_id']?>">
                            <?= htmlspecialchars($employe['branch_name'])?>
                        </option>
                        <?php endforeach ?>
                </select>
            </div>
              <div class="mb-3">
                <label for="company_id" class="form-label">Company ID *</label>
                <select name="company_id" id="company_id" class="form-select">
                    <option value="">--Select company</option>
                    <?php foreach ($employees as $employe): ?>
                        <option value="<?= $employe['company_id']?>">
                            <?= htmlspecialchars($employe['company_name'])?>
                        </option>
                        <?php endforeach ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Employee</button>
            <a href="<?= BASIC_PATH?>/employees" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php';?>