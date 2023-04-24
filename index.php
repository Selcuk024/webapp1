<?php
session_start();
ob_start();
$dsn = 'mysql:dbname=menu;host=127.0.0.1';
$user = 'root';
$password = '';
$dsn2 = 'mysql:dbname=login;host=127.0.0.1';


try {
    $connectie = new PDO($dsn, $user, $password);
    $connectie2 = new PDO($dsn2, $user, $password);
} catch (PDOException $e) {
}


?>
<?php


$loggedIn = false;

if (isset($_SESSION['user'])) {
    $loggedIn = true;
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
<?php
  if (isset($_SESSION['user'])) {
    include_once("navbar-logged-in.php");
} else {
    include_once("navbar.php");
}
?>

<div class="home-image-container">
    <div class="demo-content">
        <h2 class="big-name">Cafetaria L.Y.M</h2>
        <p class="mini-text">Voor de verste en lekkerste gerechten!</p>
    </div>
</div>
<div class="home-main-container">
    <p class="home-main-text">Bekijk Onze Menu!</p>
    <p class="home-little-text">Bekijk onze menu en laat je verleiden door onze <br> heerlijke gerechten!</p>
    <a href="menu.php" class="link-to-menu">Bekijk Nu!</a>
</div>
<div class="home-why">
    <img src="media/about-image.png" class="about-image">
    <div class="column">
    <p class="home-main-text">Waarom L.Y.M?</p>
    <p class="home-little-text2">Bij Cafetaria L.Y.M draait het niet <br> 
    alleen om het eten, maar ook om <br> 
    de ervaring. Onze naam staat <br> 
    voor "live your movie" en we 
    <br> willen dat onze gasten zich 
    <br> voelen alsof ze de hoofdrolspeler 
    <br> zijn in hun eigen film wanneer ze 
    <br> bij ons langskomen. Kom bij ons langs 
    <br> en beleef jouw eigen film <br> 
    bij Cafetaria L.Y.M.</p>
    </div>
</div>

<?php
    include_once("login.php");

    include_once("register.php");
?>


</body>
<?php
include_once("footer.php");
?>
<script src="javascript/login.js"></script>

<script src="javascript/confirmpasswoord.js"></script>

<script src="javascript/dropwdown.js"></script>

<script src="javascript/search.js"></script>

<?php
ob_end_flush();
?>
</html>