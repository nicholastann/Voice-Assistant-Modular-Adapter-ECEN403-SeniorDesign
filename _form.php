<body style="background-color:#101020;">
    <div style="background-color:#101020; color:#ffffff;" class="container">
        <div style="background-color:#101020; class="card">
            <div class="card-header">
                <h3>
                    <?php if ($appliance['id']): ?>
                        Update appliance <b><?php echo $appliance['name'] ?></b>
                    <?php else: ?>
                        Create new appliance
                    <?php endif ?>
                </h3>
            </div>
            <div class="card-body">

                <form method="POST" enctype="multipart/form-data"
                    action="">
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" value="<?php echo $appliance['name'] ?>"
                            class="form-control <?php echo $errors['name'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?php echo  $errors['name'] ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input name="status" value="<?php echo $appliance['status'] ?>"
                            class="form-control  <?php echo $errors['status'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?php echo  $errors['status'] ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Channel</label>
                        <input name="channel" value="<?php echo $appliance['channel'] ?>"
                            class="form-control  <?php echo $errors['channel'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?php echo  $errors['channel'] ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Volume</label>
                        <input name="volume" value="<?php echo $appliance['volume'] ?>"
                            class="form-control  <?php echo $errors['volume'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?php echo  $errors['volume'] ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>URL</label>
                        <input name="url" value="<?php echo $appliance['url'] ?>"
                            class="form-control  <?php echo $errors['url'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?php echo  $errors['url'] ?>
                        </div>
                    </div>


                    <button class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>