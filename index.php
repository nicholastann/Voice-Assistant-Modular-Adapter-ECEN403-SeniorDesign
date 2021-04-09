<?php
require 'appliances/appliances.php';

$appliances = getappliances();

include 'partials/header.php';
?>

<body style="background-color:#101020;">
    <div class="container">

            <table class="table" style="color:#fff">
            <h1 style="color:white; text-align:center;">Locks</h1>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($appliances as $appliance): ?>
                <?php if ($appliance["type"] === "lock"): ?>
                    <tr>
                        <td><?php echo $appliance['id'] ?></td>
                        <td><?php echo $appliance['name'] ?></td>
                        <td>
                            <?php if ($appliance["status"] === "1"): ?> Locked   <?php endif ?>
                            <?php if ($appliance['status'] === "0"): ?> Unlocked <?php endif ?>
                        </td>
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

            <table class="table" style="color:#fff">
            <h1 style="color:white; text-align:center;">Light Switches</h1>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($appliances as $appliance): ?>
                <?php if ($appliance["type"] === "switch"): ?>
                    <tr>
                        <td><?php echo $appliance['id'] ?></td>
                        <td><?php echo $appliance['name'] ?></td>
                        <td>
                            <?php if ($appliance['status'] === '1'): ?> On   <?php endif ?>
                            <?php if ($appliance['status'] === '0'): ?> Off  <?php endif ?>
                        </td>
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

        <table class="table" style="color:#fff">
            <h1 style="color:white; text-align:center;">TVs</h1>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Channel</th>
                <th>Volume</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($appliances as $appliance): ?>
                <?php if ($appliance["type"] === "tv"): ?>
                    <tr>
                        <td><?php echo $appliance['id'] ?></td>
                        <td><?php echo $appliance['name'] ?></td>
                        <td>
                            <?php if ($appliance['status'] === '1'): ?> On   <?php endif ?>
                            <?php if ($appliance['status'] === '0'): ?> Off  <?php endif ?>
                        </td>
                        <td><?php echo $appliance['channel'] ?></td>
                        <td><?php echo $appliance['volume'] ?></td>
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