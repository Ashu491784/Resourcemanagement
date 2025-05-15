<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    

<div class="container my-5">
    <div class="card border-success mb-3 shadow-lg  rounded-2 col-md-8 mx-auto bg-white">
        <div class="card-header bg-info text-white text-center rounded-top-4">
            <h3 class="mb-0">Edit Branch</h3>
            <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?php htmlspecialchars($_SESSION['error']) ?></div>
            <?php unset($_SESSION['error']) ?>
        <?php endif; ?>
        </div>
        <div class="card-body">
            <form action="<?php echo BASIC_PATH ?>/branch/update/<?= $branch['branch_id'] ?>" method="POST">
            <div class="mb-3">
                    <input type="text" class="form-control" name="branch_name" id="branch_name"
                        placeholder="Enter Branch Name" value="<?= htmlspecialchars($branch['branch_name']) ?>"
                        required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="location" id="location"
                        placeholder="Enter  Location" value="<?= htmlspecialchars($branch['location']) ?>"
                        required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address"
                        value="<?= htmlspecialchars($branch['address']) ?>" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="contactNo01" id="contactNo01"
                        placeholder="Enter first Contact Number"
                        value="<?= htmlspecialchars($branch['contactNo01']) ?>" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="contactNo02" id="contactNo02"
                        placeholder="Enter second Contact Number"
                        value="<?= htmlspecialchars($branch['contactNo02']) ?>" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="contact_person" id="contact_person"
                        placeholder="Enter Contact Person"
                        value="<?= htmlspecialchars($branch['contact_person']) ?>" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="status" id="status" placeholder="Enter  status"
                        value="<?= htmlspecialchars($branch['status']) ?>" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">update</button>
                    <a href="<?php BASIC_PATH ?>/branch" class="btn btn-success mt-3">Cancle</a>
                </div>
            </form>
        </div>
    </div>
</div>




</body>
</html>