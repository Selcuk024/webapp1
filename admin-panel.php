<?php
session_start();
ob_start();
$dsn = 'mysql:dbname=menu;host=127.0.0.1';
$user = 'root';
$password = '';
$dsn2 = 'mysql:dbname=login;host=127.0.0.1';
$dsn3 = 'mysql:dbname=menu;host=127.0.0.1';

try {
    $connectie = new PDO($dsn, $user, $password);
    $connectie2 = new PDO($dsn2, $user, $password);
    $connectieMenu = new PDO($dsn3, $user, $password);
    echo "goedzo";
} catch (PDOException $e) {
    echo "verkeerd" . $e;
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
    <div class="container-admin-panel">
        <div class="test1">
            <h2 class="main-text">Admin Panel</h2>
            <div class="container3">
                <p class="table-info-name">Name</p>
                <p class="table-info">Description</p>
                <p class="table-info-price">Price</p>
            </div>

            <?php

            $resultSet = $connectie->query("SELECT * FROM menukaart");
            while ($item = $resultSet->Fetch()) {


                echo ' <div class="row">
                    <p class="admin-name">' . $item['naam'] . '</p>

                    <p class="admin-description">' . $item['beschrijving'] . '</p>

                    <p class="admin-price">€ ' . $item['prijs'] . '</p>
                    <a class="edit" href="edit.php?id=' . $item['id'] . '">
                    <svg class="edit2" width="60" height="60" viewBox="0 0 60 60" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M38.2855 17.339C38.0218 17.0752 37.6641 16.9271 37.2911 16.9271C36.9182 16.9271 36.5605 17.0752 36.2967 17.339L33.3801 20.2556C33.3712 20.2645 33.3624 20.2735 33.3538 20.2826L17.3391 36.2973C17.0754 36.561 16.9272 36.9187 16.9272 37.2917V41.6667C16.9272 42.4433 17.5568 43.0729 18.3335 43.0729H22.7085C23.0815 43.0729 23.4391 42.9247 23.7029 42.661L39.7445 26.6194C39.7533 26.6105 39.762 26.6016 39.7706 26.5926L42.6605 23.7027C43.2097 23.1535 43.2097 22.2631 42.6605 21.714L38.2855 17.339ZM34.3748 23.2391L36.7611 25.6254L22.126 40.2604H19.7397V37.8741L34.3748 23.2391ZM38.7498 23.6359L39.6774 22.7083L37.2911 20.3221L36.3636 21.2496L38.7498 23.6359Z"
                        fill="black" />
                    <rect x="2" y="2" width="56" height="56" rx="7" stroke="black" stroke-width="4" />
                </svg> 
                </a>
                <form action="delete.php" method="post">
                <input type="hidden" name="id" value="' . $item['id'] . '">
                <button class="del" type="submit">
                <svg class="del1" width="60" height="60" viewBox="0 0 60 60" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.5002 0.833336H47.5002C53.9435 0.833336 59.1668 6.05668 59.1668 12.5V47.5C59.1668 53.9433 53.9435 59.1667 47.5002 59.1667H12.5002C6.05684 59.1667 0.833496 53.9433 0.833496 47.5V12.5C0.833496 6.05668 6.05684 0.833336 12.5002 0.833336ZM52.6561 52.656C54.0236 51.2885 54.7918 49.4339 54.7918 47.5V12.5C54.7918 10.5661 54.0236 8.71147 52.6561 7.34402C51.2887 5.97656 49.434 5.20834 47.5002 5.20834H12.5002C8.47309 5.20834 5.2085 8.47293 5.2085 12.5V47.5C5.2085 49.4339 5.97672 51.2885 7.34418 52.656C8.71163 54.0234 10.5663 54.7917 12.5002 54.7917H47.5002C49.434 54.7917 51.2887 54.0234 52.6561 52.656Z"
                        fill="black" />
                    <path
                        d="M42.3668 27.8125H17.6335C16.4254 27.8125 15.446 28.7919 15.446 30C15.446 31.2081 16.4254 32.1875 17.6335 32.1875H42.3668C43.575 32.1875 44.5543 31.2081 44.5543 30C44.5543 28.7919 43.575 27.8125 42.3668 27.8125Z"
                        fill="black" />
                </svg>
                </button>
                </form>
                
            </div>';
            }
            ?>
            <a href="#add">
                <div class="admin-add">
                    <svg class="plus" width="46" height="45" viewBox="0 0 46 45" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11.4999 3.75H34.4999C38.7341 3.75 42.1666 7.10786 42.1666 11.25V33.75C42.1666 37.8921 38.7341 41.25 34.4999 41.25H11.4999C7.26574 41.25 3.83325 37.8921 3.83325 33.75V11.25C3.83325 7.10786 7.26574 3.75 11.4999 3.75ZM37.7662 36.9452C38.6324 36.0978 39.1191 34.9484 39.1191 33.75V11.25C39.1191 10.0516 38.6324 8.90219 37.7662 8.05476C36.8999 7.20733 35.725 6.73125 34.4999 6.73125H11.4999C8.94883 6.73125 6.88075 8.75436 6.88075 11.25V33.75C6.88075 34.9484 7.36741 36.0978 8.23368 36.9452C9.09994 37.7927 10.2748 38.2687 11.4999 38.2687H34.4999C35.725 38.2687 36.8999 37.7927 37.7662 36.9452Z"
                            fill="black" />
                        <path
                            d="M30.6666 21.0938H24.4374V15C24.4374 14.2233 23.7938 13.5938 22.9999 13.5938C22.206 13.5938 21.5624 14.2233 21.5624 15V21.0938H15.3333C14.5393 21.0938 13.8958 21.7233 13.8958 22.5C13.8958 23.2767 14.5393 23.9062 15.3333 23.9062H21.5624V30C21.5624 30.7766 22.206 31.4062 22.9999 31.4062C23.7938 31.4062 24.4374 30.7766 24.4374 30V23.9062H30.6666C31.4605 23.9062 32.1041 23.2767 32.1041 22.5C32.1041 21.7233 31.4605 21.0938 30.6666 21.0938Z"
                            fill="black" />
                    </svg>
                    <p class="add-name">Add A New Dish</p>
                </div>
            </a>
        </div>
    </div>


    <div class="overlay" id="add">

        <div class="wrapper">

            <h3>Add A New Dish</h3>

            <a href="#" class="close">&times;</a>

            <div class="content">

                <div class="container">
                    <?php
                    if (isset($_POST['send'])) {
                        $dishname = $_POST['dish-name'];
                        $description = $_POST['description'];
                        $price = $_POST['price'];

                        $stmt = $connectie->prepare("INSERT INTO menukaart (naam, beschrijving, prijs) VALUES (?, ?, ?)");

                        if ($stmt->execute([$dishname, $description, $price])) {
                            echo "Dish added successfully";
                            header("refresh:0");
                        } else {
                            echo "Error: " . implode("", $stmt->errorinfo());
                        }
                    }


                    ?>
                    <form class="form" action="admin-panel.php" method="post">
                        <label for="name">Dish Name</label>
                        <input name="dish-name" type="text" id="name" class="login-text" placeholder="Dish Name">

                        <label>Description</label>
                        <input type="text" name="description" class="login-text" placeholder="Description">

                        <label class="password-class">Price</label>
                        <input type="number" name="price" class="login-text" placeholder="Price">

                        <input type="submit" name="send" class="submit-dish" value="Submit">
                    </form>


                </div>



            </div>

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

<script src="javascript/delete.js"></script>

<?php
ob_end_flush();
?>

</html>