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




</head>


<body>
    <?php
    if (isset($_SESSION['user'])) {
        include_once("navbar-logged-in.php");
    } else {
        include_once("navbar.php");
    }
    ?>
    <div class="home-container">




        <div class="home-container2">




            <h2>

                Menu

            </h2>


<?php 
if(isset($_POST['zoekveld'])){
$statement = $connectie->prepare("SELECT * FROM menukaart WHERE naam LIKE ? ");
$statement->execute(['%' . $_POST['zoekveld'] . '%']);
$menuitems = $statement->fetchAll();

}
else{
$statement = $connectie->query("SELECT * FROM menukaart ");
$menuitems = $statement->fetchAll();
}
foreach($menuitems as $menuitem){
    echo '   <div class="menu-box">
    <div class="menu-container1">
    <p class="menu-name">' . $menuitem['naam'] . '</p>';


echo '<p class="menu-description">' . $menuitem['beschrijving'] . '</p>';

echo '<p class="menu-price"> € ' . $menuitem['prijs'] . '</p>
    </div>
    
<div class="menu-container1">

<button class="add">Add</button>

</div>

</div>';
}
?>
 


            <?php
         //   $resultSet = $connectie->query("SELECT * FROM menukaart");
         //   while ($item = $resultSet->Fetch()) {
//
//
         //       echo '   <div class="menu-box">
         //               <div class="menu-container1">
         //               <p class="menu-name">' . $item['naam'] . '</p>';
//
//
         //       echo '<p class="menu-description">' . $item['beschrijving'] . '</p>';
//
         //       echo '<p class="menu-price"> € ' . $item['prijs'] . '</p>
         //               </div>
         //               
         //       <div class="menu-container1">
//
         //       <button class="add">Add</button>
//
         //   </div>
         //   
         //   </div>'; 
           // }
            ?>




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