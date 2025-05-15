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
<body
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </div>
        <?php unset($_SESSION['error']) ?>
        <?php endif?>
        

<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-2 col-md-8 mx-auto bg-white">
        <div class="card-header bg-dark text-white text-center rounded-top-4">
            <h3 class="mb-0">Edit Campany</h3>
            <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?php htmlspecialchars($_SESSION['error']) ?></div>
            <?php unset($_SESSION['error']) ?>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <form action="<?php echo BASIC_PATH?>/company/update/<?= $companies['company_id'] ?>" method="POST">
                
                <div class="mb-4">
                    
                    <input type="text" class="form-control " name="comp_name" id="comp_name" placeholder="Enter The Company Name"
                    value="<?= htmlspecialchars($companies['company_name']) ?>" required>
                </div>
                <div class="mb-4">
                   
                    <input type="text" class="form-control " name="address" id="address" placeholder="Enter The address"
                    value="<?= htmlspecialchars($companies['address']) ?>" required>
                </div>
                <div class="mb-4">
                   
                   <input type="text" class="form-control " name="email" id="email" placeholder="Enter The Email"
                   value="<?= htmlspecialchars($companies['email']) ?>" required>
               </div>
                <div class="mb-4">
                    
                    <input type="text" class="form-control " name="con_1" id="con_1" placeholder="Enter contact number one"
                    value="<?= htmlspecialchars($companies['contactNo01']) ?>" required>
                </div>
                <div class="mb-4">
                    
                    <input type="text" class="form-control " name="con_2" id="con_2" placeholder="Enter contact number two"
                    value="<?= htmlspecialchars($companies['contactNo02']) ?>" required>
                </div>
                <div class="mb-4">
                   
                    <input type="text" class="form-control " name="website" id="website" placeholder="Enter The Website"
                    value="<?= htmlspecialchars($companies['website']) ?>" required>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4 ">
                    <input type="text" class="form-control mb-0" name="website" id="website" value="<?= htmlspecialchars($companies['location']) ?>" disabled="true">
                    <select name="location" id="location" class="form-control form-select shadow-sm border-dark" value="<?= htmlspecialchars($companies['location']) ?>">
                        <option value="">Select The Location</option>
                            <option value="North">South Province</option>
                            <option value="South">Noth Province</option>
                            <option value="Western">Uva Province</option>
                            <option value="Eastern">Eastern Province</option>
                            <option value="Uva">Western Province</option>
                            <option value="Central">Central Province</option>
                            <option value="North_Central">North Central Province</option>
                            <option value="North_Western">North Western Province</option>
                            <option value="Sabaragamu">Sabaragamu Province</option>

                    </select>
                </div>
                <div class="mb-4">
                   
                   <input type="text" class="form-control " name="status" id="status" placeholder="Enter the status"
                   value="<?= htmlspecialchars($companies['status']) ?>" required>
               </div>
               <div class="mb-4 ">
                   <label for="create_date" name="create_date" id="create_date" class=" p-1" > Create Date</label>
                   <input type="date" class="form-control " name="create_date" id="create_date" placeholder="Enter Create Date"
                   value="<?= htmlspecialchars($companies['create_date']) ?>" required>
               </div>
               
                <div class="d-grid">
                    <button type="submit" class="btn btn-dark ">
                        Edit Company
                    </button>
                    <a href="<?php BASIC_PATH ?>/company" class="btn btn-secondory">Cancle</a>
                </div>
            </form>
        </div>
    </div>
</div>   
</body>
</html>