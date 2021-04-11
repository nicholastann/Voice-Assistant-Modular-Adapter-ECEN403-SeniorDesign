<body style="background-color:#101020;">
    <div style="background-color:#101020; color:#ffffff;" class="container">
        <div style="background-color:#101020; class="card">
            <button onclick="window.history.back();" style="background-color:#088292; color:#ffffff;" class="btn btn-sm btn-outline-info">Go Back</button>
            <div class="card-header">
                <h3>Update appliance <b><?php echo $appliance['name'] ?></b> </h3>
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

                    <?php if ($appliance['type'] === "tv"): ?>
                        <div class="form-group">
                            <label>Channel (1 - 1000)</label>
                            <input name="channel" value="<?php echo $appliance['channel'] ?>"
                                class="form-control  <?php echo $errors['channel'] ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?php echo  $errors['channel'] ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Volume (0 - 100)</label>
                            <input name="volume" value="<?php echo $appliance['volume'] ?>"
                                class="form-control  <?php echo $errors['volume'] ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?php echo  $errors['volume'] ?>
                            </div>
                        </div>
                    <?php endif ?>

                    <button class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

<nav class="navbar">
  <a href="index.php"><i class="fa fa-fw fa-home"></i>
  </a><a href="light.php"><i class="fa fa-lightbulb-o"></i></a>
  <a href="lock.php"><i class="fa fa-lock"></i></a>
  <a href=""><i class="fa fa-tv"></i></a>
</nav>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">