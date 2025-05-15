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
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Add Job Positions</h3>
            </div>
            <div class="card-body">
                <form action="<?php BASIC_PATH ?>/job/store" method="POST">
                    <div class="mb-4">

                        <input type="text" class="form-control " name="job_position_id" id="job_position_id"
                            placeholder="Enter Job Position Id" required>
                    </div>
                    <div class="mb-4">

                        <input type="text" class="form-control " name="position_name" id="position_name"
                            placeholder="Enter Position Name" required>
                    </div>
                    <div class="mb-4">

                        <input type="text" class="form-control " name="status" id="status"
                            placeholder="Enter status" required>
                    </div>
                    <div class="d-grid">
                            <button type="submit"> Save Branch</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

 
</body>

</html>