<?php
$dsn = 'mysql:dbname=menu;host=127.0.0.1';
$user = 'root';
$password = '';
$dsn2 = 'mysql:dbname=login;host=127.0.0.1';


try {
    $connectie = new PDO($dsn, $user, $password);
    $connectie2 = new PDO($dsn2, $user, $password);
    echo "goedzo";
} catch (PDOException $e) {
    echo "verkeerd" . $e;
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
    include_once("navbar.php");
    ?>
       <div class="home-container">




        <div class="home-container2">




            <h2>

                Menu

            </h2>

          

              
                    <?php
                    $resultSet = $connectie->query("SELECT * FROM menukaart");
                    while ($item = $resultSet->Fetch()) {


                        echo '   <div class="menu-box">
                        <div class="menu-container1">
                        <p class="menu-name">' . $item['naam'] . '</p>';


                        echo '<p class="menu-description">' . $item['beschrijving'] . '</p>';

                        echo '<p class="menu-price"> € ' . $item['prijs'] . '</p>
                        </div>
                        
                <div class="menu-container1">

                <button class="add">Add</button>

            </div>
            
            </div>';
                    }
                    ?>
               



        </div>

    </div>

    <div class="overlay" id="divOne">

        <div class="wrapper">

            <h3>Welcome Back</h3>

            <a href="#" class="close">&times;</a>

            <div class="content">

                <div class="container">

                    <?php
                    $mail = isset ($_POST['mail']);
                    $password = isset ($_POST['password']);
                    $stmt = $connectie2->prepare("SELECT * FROM logindata WHERE mail=? AND password=?");
                    $stmt->execute([$mail, $password]);
                    $user = $stmt->fetch();

                    if ($user) {
                        echo 'goed';
                    } else {
                        echo 'fout';
                    }
                    ?>
                    <form action="index.php" method="post">


                        <label>E-Mail</label>

                        <input type="email" name="mail" class="login-text" placeholder="Your Name">

                        <label class="password-class">Password</label>

                        <input type="password" name="password" id="br" class="login-text" placeholder="Your Password">

                        <input type="submit" class="submit" value="Submit">

                    </form>

                </div>



            </div>

        </div>

    </div>

    <div class="overlay" id="register">

        <div class="wrapper">

            <h3>Welcome Back</h3>

            <a href="#" class="close">&times;</a>
                    
            <div class="content">

                <div class="container">
                    <?php
                    $username = isset($_POST['name']) ? $_POST['name'] : '';
                    $email = isset($_POST['email']) ? $_POST['email'] : '';
                    $password2 = isset($_POST['regpassword']) ? $_POST['regpassword'] : '';



                    $sql = "INSERT INTO logindata (name, mail, password) VALUES ('$username', '$email', '$password2')";
                    if ($connectie2->query($sql) === TRUE) {
                        echo "User created successfully";
                    } else {
                        echo "Error: " . implode("", $connectie2->errorinfo());
                    }
                    ?>

                    <form action="index.php" method="post">
                        <label for="name">Name</label>
                        <input name="name" type="name" id="name" class="login-text" placeholder="Your Name">

                        <label>E-Mail</label>
                        <input type="email" name="email" class="login-text" placeholder="Your Email">

                        <label for="password" class="password-class">Password</label>
                        <input type="password" name="regpassword" class="login-text" placeholder="Your Password">

                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" placeholder="Confirm Password" id="confirm_password" required>

                        <input type="submit" class="submit" value="Submit">
                    </form>


                </div>



            </div>

        </div>

    </div>




</body>




<script src="javascript/login.js"></script>

<script src="javascript/confirmpasswoord.js"></script>

<script src="javascript/dropwdown.js"></script>

<script src="javascript/search.js"></script>




</html>