<?php
require 'appliances/appliances.php';

$appliances = getappliances();

include 'partials/header.php';
?>

<body style="background-color:#101020;">
    <div class="container">
        <p>
            <a class="btn btn-success" href="create.php">Create new appliance</a>
        </p>

        <table class="table" style="color:#fff">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>status</th>
                <th>channel</th>
                <th>volume</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($appliances as $appliance): ?>
                <tr>
                    <td><?php echo $appliance['id'] ?></td>
                    <td><?php echo $appliance['name'] ?></td>
                    <td><?php echo $appliance['status'] ?></td>
                    <td><?php echo $appliance['channel'] ?></td>
                    <td><?php echo $appliance['volume'] ?></td>
                    <td>
                        <a href="view.php?id=<?php echo $appliance['id'] ?>" style="background-color:#1092a8; color:#ffffff;" class="btn btn-sm btn-outline-info">View</a>
                        <a href="update.php?id=<?php echo $appliance['id'] ?>"
                        class="btn btn-sm btn-outline-secondary" style="background-color:#555555; color:#ffffff;">Update</a>
                        <form method="POST" action="delete.php">
                            <input type="hidden" name="id" value="<?php echo $appliance['id'] ?>">
                            <button style="background-color:#dc3545; color:#ffffff;" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach;; ?>
            </tbody>
        </table>
    </div>
</body>

<?php include 'partials/footer.php' ?>



