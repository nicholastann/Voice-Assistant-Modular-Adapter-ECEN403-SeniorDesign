<?php
require 'appliances/appliances.php';

$appliances = getappliances();

include 'partials/header.php';
?>


<div class="container">
    <p>
        <a class="btn btn-success" href="create.php">Create new appliance</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($appliances as $appliance): ?>
            <tr>
                <td><?php echo $appliance['id'] ?></td>
                <td><?php echo $appliance['name'] ?></td>
                <td><?php echo $appliance['status'] ?></td>
                <td>
                    <a href="view.php?id=<?php echo $appliance['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                    <a href="update.php?id=<?php echo $appliance['id'] ?>"
                       class="btn btn-sm btn-outline-secondary">Update</a>
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $appliance['id'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;; ?>
        </tbody>
    </table>
</div>

<?php include 'partials/footer.php' ?>

