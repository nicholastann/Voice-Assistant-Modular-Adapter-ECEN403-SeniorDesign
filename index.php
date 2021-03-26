<?php
require 'appliances/appliances.php';

$appliances = getappliances();

include 'partials/header.php';
?>

<body style="background-color:#101020;">
    <h1 style="color:white; text-align:center;">VAMA Appliance Dashboard</h1>
    <div class="container">
    <h2 style="color:white; text-align:center;">TVs</h2>
        <table class="table" style="color:#fff">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Channel</th>
                <th>Volume</th>
                <th>Test Number</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($appliances as $appliance): ?>
                <?php if ($appliance["type"] === "tv"): ?>
                    <tr>
                        <td><?php echo $appliance['id'] ?></td>
                        <td><?php echo $appliance['name'] ?></td>
                        <td><?php echo $appliance['status'] ?></td>
                        <td><?php echo $appliance['channel'] ?></td>
                        <td><?php echo $appliance['volume'] ?></td>
                        <td><?php echo $appliance['TestNumber'] ?></td>
                        <td>
                            <a href="view.php?id=<?php echo $appliance['id'] ?>" style="background-color:#088292; color:#ffffff;" class="btn btn-sm btn-outline-info">View</a>
                            <a href="update.php?id=<?php echo $appliance['id'] ?>" class="btn btn-sm btn-outline-secondary" style="background-color:#555555; color:#ffffff;">Update</a>
                            <form method="POST" action="delete.php">
                                <input type="hidden" name="id" value="<?php echo $appliance['id'] ?>">
                                <button style="background-color:#dc3545; color:#ffffff;" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endif ?>
            <?php endforeach;; ?>
            </tbody>

            <table class="table" style="color:#fff">
            <h2 style="color:white; text-align:center;">Locks</h2>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Test Number</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($appliances as $appliance): ?>
                <?php if ($appliance["type"] === "lock"): ?>
                    <tr>
                        <td><?php echo $appliance['id'] ?></td>
                        <td><?php echo $appliance['name'] ?></td>
                        <td><?php echo $appliance['status'] ?></td>
                        <td><?php echo $appliance['TestNumber'] ?></td>
                        <td>
                            <a href="view.php?id=<?php echo $appliance['id'] ?>" style="background-color:#088292; color:#ffffff;" class="btn btn-sm btn-outline-info">View</a>
                            <a href="update.php?id=<?php echo $appliance['id'] ?>" class="btn btn-sm btn-outline-secondary" style="background-color:#555555; color:#ffffff;">Update</a>
                            <form method="POST" action="delete.php">
                                <input type="hidden" name="id" value="<?php echo $appliance['id'] ?>">
                                <button style="background-color:#dc3545; color:#ffffff;" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endif ?>
            <?php endforeach;; ?>
            </tbody>

            <table class="table" style="color:#fff">
            <h2 style="color:white; text-align:center;">Light Switches</h2>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Test Number</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($appliances as $appliance): ?>
                <?php if ($appliance["type"] === "switch"): ?>
                    <tr>
                        <td><?php echo $appliance['id'] ?></td>
                        <td><?php echo $appliance['name'] ?></td>
                        <td><?php echo $appliance['status'] ?></td>
                        <td><?php echo $appliance['TestNumber'] ?></td>
                        <td>
                            <a href="view.php?id=<?php echo $appliance['id'] ?>" style="background-color:#088292; color:#ffffff;" class="btn btn-sm btn-outline-info">View</a>
                            <a href="update.php?id=<?php echo $appliance['id'] ?>" class="btn btn-sm btn-outline-secondary" style="background-color:#555555; color:#ffffff;">Update</a>
                            <form method="POST" action="delete.php">
                                <input type="hidden" name="id" value="<?php echo $appliance['id'] ?>">
                                <button style="background-color:#dc3545; color:#ffffff;" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endif ?>
            <?php endforeach;; ?>
            </tbody>



        </table>
        <p>
            <a class="btn btn-success" style="background-color:#228732;" href="create.php">Create new appliance</a>
        </p>
    </div>
</body>

<?php include 'partials/footer.php' ?>



<style type="text/css">
form {
    display: inline;
}
</style>