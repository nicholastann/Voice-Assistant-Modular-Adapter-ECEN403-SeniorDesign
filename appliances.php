<?php
session_start();
$machine_id = $_GET['appliance_id'];

if (isset($_POST['form_submit'])) {//Form was submitted
    (isset($_POST['machine_state'])) ? $status = 1 : $status = 0;
    //Update DB
    $db = new PDO('mysql:host=localhost;dbname=testing;charset=utf8mb4', 'root', '');
    $update = $db->prepare("UPDATE `appliances` SET `status` = ? WHERE `appliance_id` = ? LIMIT 1;");
    $update->execute([$status, $machine_id]);
} else {//Page was loaded
    $status = $_SESSION['status'];
}
if ($status) {//status = 1 (on)
    $status_str = "on";
    $checked_status = "checked";
} else {
    $status_str = "off";
    $checked_status = "";
}
?>






<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Voice Assistant Modular Adapter</title>
	<link rel="shortcut icon" href="favicon.ico">
	<!-- demo styles -->
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<!-- menu styles -->
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<link rel="stylesheet" type="text/css" href="css/switch.css" />
	<script src="js/modernizr-custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function () {
            $.ajax({
                type: "GET",
                url: "status.php",
                data: {"appliance_id": <?php echo $machine_id;?>},
                success: function (data) {
                    console.log(data)
                }
            });
        });
    </script>
</head>

<body>
		<header class="bp-header cf">
			<div class="bp-header__main">
				<span class="bp-header__present">VAMA</span>
				<h1 class="bp-header__title">Appliance Menu</h1>
			</div>
		</header>

		<div class="w3-container">
			<table class="w3-table w3-blue">
			  <tr>
				<td>
					

				<form method="post">
                <fieldset> 
					
					<div class="toggle-wrapper">
						<div class="toggle normal1"><input id="normal" name='machine_state' type="checkbox" /><label class="toggle-item" for="normal1"></label></div>
						<div class="name">Appliance 1</div>
					</div>
                </fieldset>
                <input type="submit" name="submit" value="Update"/>
            </form>

				</td>
				<td>
					<div class="toggle-wrapper">
						<div class="toggle normal2"><input id="normal2" type="checkbox" /><label class="toggle-item" for="normal2"></label></div>
						<div class="name">Appliance 2</div>
					</div>
				</td>
			  </tr>
			  <tr>
				<td>
					<div class="toggle-wrapper">
						<div class="toggle normal3"><input id="normal3" type="checkbox" /><label class="toggle-item" for="normal3"></label></div>
						<div class="name">Appliance 3</div>
					</div>
				</td>
				<td>
					<div class="toggle-wrapper">
						<div class="toggle normal4"><input id="normal4" type="checkbox" /><label class="toggle-item" for="normal4"></label></div>
						<div class="name">Appliance 4</div>
					</div>
				</td>
			  </tr>
			  <tr>
				<td>
					<div class="toggle-wrapper">
						<div class="toggle normal5"><input id="normal5" type="checkbox" /><label class="toggle-item" for="normal5"></label></div>
						<div class="name">Appliance 5</div>
					</div>
				</td>
				<td>
					<div class="toggle-wrapper">
						<div class="toggle normal6"><input id="normal6" type="checkbox" /><label class="toggle-item" for="normal6"></label></div>
						<div class="name">Appliance 6</div>
					</div>
				</td>
			  </tr>
			  <tr>
			  <td>
					<div class="toggle-wrapper">
						<div class="toggle normal7"><input id="normal7" type="checkbox" /><label class="toggle-item" for="normal7"></label></div>
						<div class="name">Appliance 7</div>
					</div>
				</td>
				<td>
					<div class="toggle-wrapper">
						<div class="toggle normal8"><input id="normal8" type="checkbox" /><label class="toggle-item" for="normal8"></label></div>
						<div class="name">New</div>
					</div>
				</td>
			  </tr>
			</table>
		  </div>

	<div class="navbar">
		<a href="appliances.php" class="active">Appliances</a>
		<a href="stats.php">Statistics</a>
		<a href="settings.php">Settings</a>
	  </div>

	<script src="js/classie.js"></script>
	<script src="js/dummydata.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
