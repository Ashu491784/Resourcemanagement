<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Damages</title>
</head>

<body>

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </div>
        <?php unset($_SESSION['error']) ?>
        <?php endif?>
       

    <div class="container my-5">
        <div class="card shadow-lg border-0 rounded-2 col-md-8 mx-auto bg-white">
            <div class="card-header bg-dark text-white text-center rounded-top-4">
                <h3 class="mb-0">Add Damages</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo BASIC_PATH ?>/damage/store" method="POST">
                    <div class="mb-4">

                        <input type="text" class="form-control " name="resources_name" id="resources_name"
                            placeholder="Enter Resources Name" required>
                    </div>
                    <div class="mb-4">

                        <input type="text" class="form-control " name="description" id="description"
                            placeholder="Enter Description" required>
                    </div>
                    <div class="mb-4">
                        <select name="category_id" id="category_id" class="form-control form-select- shadow-sm border-dark">
                            <option value="">Select Category</option>
                            <?php foreach($categories as $ca): ?>
                                <option value="<?= $ca['category_id'] ?>">
                                    <?= htmlspecialchars($ca['category_name']) ?>
                                </option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <select name="user_id" id="user_id" class="form-control form-select- shadow-sm border-dark">
                            <option value="">Select User</option>
                            <?php foreach($user as $users): ?>
                                <option value="<?= $users['user_id'] ?>">
                                    <?= htmlspecialchars($users['username'])  ?>
                                </option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Save Damage</button>

                </form>
            </div>
        </div>
    </div>

</body>

</html>