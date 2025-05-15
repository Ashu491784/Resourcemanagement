<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css"></head>
<body>
 
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </div>
        <?php unset($_SESSION['error']) ?>
        <?php endif?>
    
    <div class="container">
    <div class="card col-6 text-center">
        <div class="card-header">
             <h1 class="card-title">ADD CATEGORY</h1>
    </div>
         <form method="POST" action="<?= BASIC_PATH ?>/categories/store"> 
                <div class="mb-3">
                <label for="category_id" id="category_id">Category ID</label>
                <input type="text" class="form-control" id="category_id" name="category_id">
            </div>
            <div class="mb-3">
                <label for="category_name" id="category">Category name</label>
                <input type="text" class="form-control" id="category_name" name="category_name">
            </div>
            <div class="mb-3">
                        <label for="status" class="form-label">Status :</label>
                        <select class="form-select btn btn-outline-info" id="status" name="status" required>
                            <option value="Active" <?= ($_SESSION['form_data']['status'] ?? '') === 'Active' ? 'selected' : '' ?>>Active</option>
                            <option value="Deactive" <?= ($_SESSION['form_data']['status'] ?? '') === 'Deactive' ? 'selected' : '' ?>>Deactive</option>
                        </select>
                    </div>
            <button type="submit" class="btn btn-primary">Save Category</button>
            <a href="/categories" class="btn btn-danger">Cansel</a>
        </form>
    </div>
    </div>

</body>
</html>