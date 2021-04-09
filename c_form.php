<body style="background-color:#101020;">
    <div style="background-color:#101020; color:#ffffff;" class="container">
        <div style="background-color:#101020; class="card">
            <div class="card-header">
                <h3> Create new appliance </h3>
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
                        <label>Status (1 for On/locked, 0 for Off/Unlocked)</label>
                        <input name="status" value="<?php echo $appliance['status'] ?>"
                            class="form-control  <?php echo $errors['status'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?php echo  $errors['status'] ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Type</label>
                            <select name="type" class="form-control" <?php echo $errors['type'] ? 'is-invalid' : '' ?>">>
                                <option>tv</option>
                                <option>lock</option>
                                <option>switch</option>
                            </select>
                        <div class="invalid-feedback">
                            <?php echo  $errors['channel'] ?>
                        </div>
                    </div>

                    <div class="form-group">
                    TV ONLY
                        <label>Channel (1 - 1000)</label>
                        <input name="channel" value="<?php echo $appliance['channel'] ?>"
                            class="form-control  <?php echo $errors['channel'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?php echo  $errors['channel'] ?>
                        </div>
                    </div>

                    <div class="form-group">
                    TV ONLY
                        <label>Volume (0 - 100)</label>
                        <input name="volume" value="<?php echo $appliance['volume'] ?>"
                            class="form-control  <?php echo $errors['volume'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?php echo  $errors['volume'] ?>
                        </div>
                    </div>

                    <button class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>