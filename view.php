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
<body style="background-color:#101020;">
    <div style="background-color:#101020; color:#ffffff;" class="container">
        <div style="background-color:#101020;" class="card">
            <div class="card-header">
                <h3>View appliance: <b><?php echo $appliance['name'] ?></b></h3>
            </div>
            <div class="card-body">
                <a class="btn btn-secondary" style="background-color:#555555;" href="update.php?id=<?php echo $appliance['id'] ?>">Update</a>
                <form style="display: inline-block" method="POST" action="delete.php">
                    <input type="hidden" name="id" value="<?php echo $appliance['id'] ?>">
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
            <table class="table" style="color:#fff">
                <tbody>
                <tr>
                    <th>Type:</th>
                    <td><?php echo $appliance['type'] ?></td>
                </tr>
                <tr>
                    <th>ID:</th>
                    <td><?php echo $appliance['id'] ?></td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td><?php echo $appliance['name'] ?></td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td><?php echo $appliance['status'] ?></td>
                </tr>
                <?php if ($appliance['type'] === "tv"): ?>
                <tr>
                    <th>Channel:</th>
                    <td><?php echo $appliance['channel'] ?></td>
                </tr>
                <tr>
                    <th>Volume:</th>
                    <td><?php echo $appliance['volume'] ?></td>
                </tr>
                <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

<nav class="navbar">
  <a href="index.php"><i class="fa fa-fw fa-home"></i></a>
  <a href="light.php"><i class="fa fa-lightbulb-o"></i></a>
  <a href="lock.php"><i class="fa fa-lock"></i></a>
  <a href="tv.php"><i class="fa fa-tv"></i></a>
</nav>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">


<?php include 'partials/footer.php' ?>
