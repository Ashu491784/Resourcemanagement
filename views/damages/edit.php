<!DOCTYPE html>
<html lang="en">
<>
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
       

<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-2 col-md-8 mx-auto bg-white">
        <div class="card-header bg-dark text-white text-center rounded-top-4">
            <h3 class="mb-0">Edit Damage</h3>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?php htmlspecialchars($_SESSION['error']) ?></div>
                <?php unset($_SESSION['error']) ?>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <form action="<?php echo BASIC_PATH ?>/damage/update/<?= $damages['damege_id'] ?>" method="POST">
                <div class="mb-4">

                    <input type="text" class="form-control " name="resources_name" id="resources_name"
                        placeholder="Enter Resources Name" value="<?= htmlspecialchars($damages['resources_name']) ?>" required>
                </div>
                <div class="mb-4">

                    <input type="text" class="form-control " name="description" id="description"
                        placeholder="Enter Description" value="<?= htmlspecialchars($damages['description']) ?>" required>
                </div>
                <div class="mb-4">
                    <select name="category_id" id="category_id" class="form-control form-select- shadow-sm border-dark">
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $ca): ?>
                            <option value="<?= $ca['category_id'] ?>"
                                <?= $ca['category_id'] == $damages['category_category_id'] ? 'selected' : '' ?> >
                                <?= htmlspecialchars($ca['category_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4"> 
                    <select name="user_id" id="user_id" class="form-control form-select- shadow-sm border-dark">
                        <option value="">Select User</option>
                        <?php foreach ($user as $users): ?>
                            <option value="<?= $users['user_id'] ?>" 
                            <?= $users['user_id'] == $damages['user_user_id'] ? 'selected' : ''?> >
                                <?= htmlspecialchars($users['username']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-dark ">Update Damage</button>
                    <a href="<?php BASIC_PATH ?>/damage" class="btn btn-secondory">Cancle</a>

            </form>
        </div>
    </div>
</div>


</body>
</html>