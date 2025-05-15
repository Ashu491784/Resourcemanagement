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
      

    <div class="container my-5">
        <div class="card shadow-lg border-0 rounded-2 col-md-8 mx-auto bg-white">
            <div class="card-header bg-dark text-white text-center rounded-top-4">
                <h3 class="mb-0">Add Inventory</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo BASIC_PATH ?>/inventory/store" method="POST">
                    <div class="mb-4">

                        <input type="date" class="form-control " name="added_date" id="added_date"
                            placeholder="Enter Added Date" required>
                    </div>
                    <div class="mb-4">

                        <input type="text" class="form-control " name="added_quantity" id="added_quantity"
                            placeholder="Enter Added Quantity" required>
                    </div>
                    <div class="mb-4">

                        <input type="text" class="form-control " name="current_quantity" id="current_quantity"
                            placeholder="Enter Current Quantity" required>
                    </div>

                    <div class="mb-4">

                        <input type="text" class="form-control " name="emp_email" id="emp_email"
                            placeholder="Enter Employee Email" required>
                    </div>
                    <div class="mb-4">
                        <input type="file" name="image" class="form-control" id="image" name="image">
                        <input type="submit" value="Upload Image">
                    </div>

                    <div class="mb-4">

                        <input type="text" class="form-control " name="minimum_threshold" id="minimum_threshold"
                            placeholder="Enter Minimum Threshold" required>
                    </div>

                    

                    <div class="mb-4">
                        <select name="resources_id" id="resources_id" class="form-control form-select- shadow-sm border-dark">
                            <option value="">Select Resource</option>
                            <?php foreach($resources as $resourceses): ?>
                                <option value="<?= $resourceses['resources_id'] ?>">
                                    <?= htmlspecialchars($resourceses['resources_name'])  ?>
                                </option>
                                <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <select name="user_id" id="user_id" class="form-control form-select- shadow-sm border-dark">
                            <option value="">Select User</option>
                            <?php foreach($user as $us): ?>
                                <option value="<?= $us['user_id'] ?>">
                                    <?= htmlspecialchars($us['username'])  ?>
                                </option>
                                <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark "> Save Inventory</button>
                </form>
            </div>
        </div>
    </div>

 

</body>

</html>