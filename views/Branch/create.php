<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


<?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?php echo htmlspecialchars($_SESSION['error']);  ?>
    </div>
    <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <div class="container my-5">
    <div class="card shadow-lg border-0 rounded-2 col-md-8 mx-auto bg-white">
        <div class="card-header bg-dark text-white text-center rounded-top-4">
            <h3 class="mb-0">Add Branch</h3>
        </div>
        <div class="card-body">
            <form action="<?php echo BASIC_PATH?>/branch/store" method="POST">
                <div class="mb-4">
                    
                    <input type="text" class="form-control " name="branch_name" id="branch_name" placeholder="Enter branch name" required>
                </div>
                <div class="mb-4">
                    
                    <input type="text" class="form-control " name="location" id="location" placeholder="Enter location" required>
                </div>
                <div class="mb-4">
                   
                    <input type="text" class="form-control " name="address" id="address" placeholder="Enter address" required>
                </div>
                <div class="mb-4">
                    
                    <input type="text" class="form-control " name="contactNo01" id="contactNo01" placeholder="Enter first contact number" required>
                </div>
                <div class="mb-4">
                    
                    <input type="text" class="form-control " name="contactNo02" id="contactNo02" placeholder="Enter second contact number" required>
                </div>
                <div class="mb-4">
                   
                    <input type="text" class="form-control " name="contact_person" id="contact_person" placeholder="Enter  contact person" required>
                </div>
                <div class="mb-4">
                   
                    <input type="text" class="form-control " name="status" id="status" placeholder="Enter  status" required>
                </div>
                <div class="d-grid">
                    <button type="submit"> Save Branch</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>