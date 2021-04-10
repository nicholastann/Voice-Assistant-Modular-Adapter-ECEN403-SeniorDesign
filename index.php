<?php
require 'appliances/appliances.php';

$appliances = getappliances();

include 'partials/header.php';
?>
<h1 style="color:white; text-align:center;">Voice Assistant Modular Adapter</h1>
<body style="background-color:#101020;">
    <div class="container">   
    <br>
        <p style="color:white; text-align:center;">
        Appliances are grouped by appliance type. To view and edit appliances use the navigation icons below. 
        </p>

        <br>
        
        <p style="color:white; text-align:center;">
        Voice Assistant Modular Adapter (VAMA) is a device that can be added onto various home appliances to make them act similar to smart appliances. 
        The advantage is you can keep your old appliances and control them with Alexa, through a web interface, or through traditional physical methods.
        This server acts as the central hub for storing information and communicating data between Alexa, the user, and the appliances.
        </p>

        <br>

        <p style="color:white; text-align:center;"> 
        You can watch our demo video if you'd like to learn more. 
        </p>

        <div align="center"> <iframe  style="width: 100%;" height="315" src="https://www.youtube.com/embed/l-owCyHujms" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </div>
    </div>
</body>
<nav class="navbar">
  <a class="active" href=""><i class="fa fa-fw fa-home"></i></a>
  <a href="light.php"><i class="fa fa-lightbulb-o"></i></a>
  <a href="lock.php"><i class="fa fa-lock"></i></a>
  <a href="tv.php"><i class="fa fa-tv"></i></a>
</nav>

<?php include 'partials/footer.php' ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">