<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']) ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit Employee</h4>
        <form method="POST" action="<?= BASIC_PATH ?>/user/update/<?= $branch['branch_id'] ?>">
            <div class="mb-3">
                <label for="user_id" class="form-label">User Id*</label>
                <textarea class="form-control" id="user_id" name="user_id"
                    rows="3"><?= htmlspecialchars($user['user_id']) ?></textarea>
            </div>
        <div class="mb-3">
                <label for="username" class="form-label">User Name*</label>
                <textarea class="form-control" id="username" name="username"
                    rows="3"><?= htmlspecialchars($user['username']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password*</label>
                <textarea class="form-control" id="password" name="password"
                    rows="3"><?= htmlspecialchars($user['password']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name*</label>
                <textarea class="form-control" id="full_name" name="full_name"
                    rows="3"><?= htmlspecialchars($user['full_name']) ?></textarea>
            </div>  
            <div class="mb-3">
                <label for="email" class="form-label">Email*</label>
                <textarea class="form-control" id="email" name="email"
                    rows="3"><?= htmlspecialchars($user['email']) ?></textarea>
            </div> 
            <div class="mb-3">
                <label for="role" class="form-label">Role *</label>
                <textarea class="form-control" id="role" name="role"
                    rows="3"><?= htmlspecialchars($user['role']) ?></textarea>
            </div> 
             <div class="mb-3">
                <label for="status" class="form-label">Contact Person *</label>
                <textarea class="form-control" id="status" name="status"
                    rows="3"><?= htmlspecialchars($user['status']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update user</button>
            <a href="<?= BASIC_PATH?>/user" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
