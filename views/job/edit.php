

<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-2 col-md-8 mx-auto bg-white">
        <div class="card-header bg-dark text-white text-center rounded-top-4">
            <h3 class="mb-0">Edit Job Posistion</h3>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?php htmlspecialchars($_SESSION['error']) ?></div>
                <?php unset($_SESSION['error']) ?>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <form action="<?php echo BASIC_PATH ?>/job/update/<?= $job['job_position_id'] ?>" method="POST">
                <div class="mb-4">

                    <input type="text" class="form-control " name="job_position_id" id="job_position_id"
                        placeholder="Enter Job Position Id" value="<?= htmlspecialchars($job['job_position_id']) ?>"
                        required>
                </div>
                <div class="mb-4">

                    <input type="text" class="form-control " name="position_name" id="position_name"
                        placeholder="Enter job Position Name" value="<?= htmlspecialchars($job['position_name']) ?>"
                        required>
                </div>
                <div class="mb-4">

                    <input type="text" class="form-control " name="status" id="status" placeholder="Enter status"
                        value="<?= htmlspecialchars($job['status']) ?>" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-dark ">
                        Edit Branch
                    </button>
                    <a href="<?php BASIC_PATH ?>/job" class="btn btn-secondory">Cancle</a>

                </div>
            </form>
        </div>
    </div>
</div>


