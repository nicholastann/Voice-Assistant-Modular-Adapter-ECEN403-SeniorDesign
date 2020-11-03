<?php
include 'partials/header.php';
require __DIR__ . '/appliances/appliances.php';

if (!isset($_GET['id'])) {
    include "partials/not_found.php";
    exit;
}
$applianceId = $_GET['id'];

$appliance = getapplianceById($applianceId);
if (!$appliance) {
    include "partials/not_found.php";
    exit;
}

?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>View appliance: <b><?php echo $appliance['name'] ?></b></h3>
        </div>
        <div class="card-body">
            <a class="btn btn-secondary" href="update.php?id=<?php echo $appliance['id'] ?>">Update</a>
            <form style="display: inline-block" method="POST" action="delete.php">
                <input type="hidden" name="id" value="<?php echo $appliance['id'] ?>">
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
        <table class="table">
            <tbody>
            <tr>
                <th>ID:</th>
                <td><?php echo $appliance['id'] ?></td>
            </tr>
            <tr>
                <th>Name:</th>
                <td><?php echo $appliance['name'] ?></td>
            </tr>
            <tr>
                <th>status:</th>
                <td><?php echo $appliance['status'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>


<?php include 'partials/footer.php' ?>
