<?php require_once __DIR__ . '/../../includes/header.php'; ?>

<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-2 col-md-8 mx-auto bg-white">
        <div class="card-header bg-dark text-white text-center rounded-top-4">
            <h3 class="mb-0">Edit Resources</h3>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?php htmlspecialchars($_SESSION['error']) ?></div>
                <?php unset($_SESSION['error']) ?>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <form action="<?php echo BASIC_PATH ?>/resource/update/<?= $resources['resources_id'] ?>" method="POST">
                <div class="mb-4">

                    <input type="text" class="form-control " name="resource_id" id="resource_id"
                        placeholder="Enter Resources Id" value="<?= htmlspecialchars($resources['resources_id']) ?>" required>
                </div>
                <div class="mb-4">

                    <input type="text" class="form-control " name="resources_name" id="resources_name"
                        placeholder="Enter Resources Name" value="<?= htmlspecialchars($resources['resources_name']) ?>" required>
                </div>
                <div class="mb-4">

                    <input type="text" class="form-control " name="description" id="description"
                        placeholder="Enter Description" value="<?= htmlspecialchars($resources['description']) ?>" required>
                </div>

                <div class="mb-4">
                    <select name="category_id" id="category_id" class="form-control form-select- shadow-sm border-dark">
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $c): ?>
                            <option value="<?= $c['category_id'] ?>"
                                <?= $c['category_id'] == $resources['category_category_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($c['category_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <select name="user_id" id="user_id" class="form-control form-select- shadow-sm border-dark">
                        <option value="">Select User</option>
                        <?php foreach ($user as $users): ?>
                            <option value="<?= $users['user_id'] ?>" <?= $users['user_id'] == $resources['user_user_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($users['username']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-dark ">
                        Update Resurces
                    </button>
                    <a href="<?php BASIC_PATH ?>/resource" class="btn btn-secondory">Cancle</a>

            </form>
        </div>
    </div>
</div>

