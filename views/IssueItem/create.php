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
                <h3 class="mb-0">Add Issue Item</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo BASIC_PATH ?>/issueitem/store" method="POST">
                    <div class="mb-4">

                        <input type="text" class="form-control " name="quantity" id="quantity"
                            placeholder="Enter Quantity" required>
                    </div>

                     <div class="mb-4">

                        <input type="text" class="form-control " name="status" id="status"
                            placeholder="Enter Status" required>
                    </div>

                    <div class="mb-4">
                        <select name="inventory_id" id="inventory_id" class="form-control form-select- shadow-sm border-dark">
                            <option value="">Select Inventory</option>
                            <?php foreach ($inventory as $inve): ?>
                                <option value="<?= $inve['inventory_id'] ?>">
                                    <?= htmlspecialchars($inve['inventory_id']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    

                    <div class="mb-4">
                        <select name="issue_id" id="issue_id"
                            class="form-control form-select- shadow-sm border-dark">
                            <option value="">Select Issue</option>
                            <?php foreach ($issue as $issues): ?>
                                <option value="<?= $issues['issue_id'] ?>">
                                    <?= htmlspecialchars($issues['issue_id']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark ">
                            Save Issu Item
                        </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>