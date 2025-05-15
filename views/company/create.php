<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <h3 class="mb-0">Add Company</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo BASIC_PATH ?>/company/store" method="POST">
                    <div class="mb-4">

                        <input type="text" class="form-control " name="comp_id" id="comp_id"
                            placeholder="Enter The Company Id" required>
                    </div>
                    <div class="mb-4">

                        <input type="text" class="form-control " name="comp_name" id="comp_name"
                            placeholder="Enter The Company Name" required>
                    </div>
                    <div class="mb-4">

                        <input type="text" class="form-control " name="address" id="address"
                            placeholder="Enter The address" required>
                    </div>
                    <div class="mb-4">

                        <input type="text" class="form-control " name="email" id="email" placeholder="Enter The Email"
                            required>
                    </div>
                    <div class="mb-4">

                        <input type="text" class="form-control " name="con_1" id="con_1"
                            placeholder="Enter contact number one" required>
                    </div>
                    <div class="mb-4">

                        <input type="text" class="form-control " name="con_2" id="con_2"
                            placeholder="Enter contact number two" required>
                    </div>
                    <div class="mb-4">

                        <input type="text" class="form-control " name="website" id="website"
                            placeholder="Enter The Website" required>
                    </div>
                  
                    <div class="mb-4">
                        <select name="location" id="location"
                            class="form-control form-select- shadow-sm border-dark">
                            <option value="">Select The Location</option>
                            <option value="North">North</option>
                            <option value="South">South</option>
                            <option value="Western">Western</option>
                            <option value="Eastern">Eastern</option>
                            <option value="Uva">Uva</option>
                            <option value="Central">Central</option>
                            <option value="North_Central">North Central</option>
                            <option value="North_Western">North Western</option>
                            <option value="Sabaragamu">Sabaragamu</option>

                        </select>
                    </div>

                    <div class="mb-4">

                        <input type="text" class="form-control " name="status" id="status"
                            placeholder="Enter the status" required>
                    </div>
                    <div class="mb-4 ">
                        <label for="create_date" name="create_date" id="create_date" class=" p-1"> Create Date</label>
                        <input type="date" class="form-control " name="create_date" id="create_date"
                            placeholder="Enter Create Date" required>
                    </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark ">Save Company</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</body>

</html>