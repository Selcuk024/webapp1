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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php
  if (isset($_SESSION['user'])) {
    include_once("navbar-logged-in.php");
} else {
    include_once("navbar.php");
}   

$id = $_GET['id'];

if(isset($_POST['wijzig'])){
    $naam = $_POST['naam'];
    $prijs = $_POST['prijs'];
    $beschrijving = $_POST['beschrijving'];
    
    $statement = $connectie->prepare("UPDATE menukaart SET naam = ?, prijs = ?, beschrijving = ? WHERE id = ?");
    
    if ($statement) {
        $statement->execute([$naam, $prijs, $beschrijving, $id]);
    } else {
        // Hier kun je code toevoegen om de fout af te handelen, bijvoorbeeld:
        echo "Er is een fout opgetreden bij het voorbereiden van de update statement";
    }
}

$statement = $connectie->query("SELECT * FROM menukaart WHERE id = $id");
$menuItemm = $statement->fetch();

?>

    <div class="edit-container">
        <form class="edit-form" action="edit.php?id=<?php echo $id ?>" method="POST">
        <p class="edit-text">Wijzig de naam</p>
            <input type="text" class="test5" name="naam" value="<?php echo $menuItemm['naam'] ?>">
            <p class="edit-text">Wijzig de prijs</p>
            <input type="text" class="test5" name="prijs" value="<?php echo $menuItemm['prijs'] ?>">
        <p class="edit-text">Wijzig de beschrijving</p>
            <input type="text" class="test5" name="beschrijving" value="<?php echo $menuItemm['beschrijving'] ?>">
            <button type="submit" action="admin-panel.php" class="edit-submit" name="wijzig" value="wijzig getecht">
                <svg class="edit-svg" width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M38.2855 17.339C38.0218 17.0752 37.6641 16.9271 37.2911 16.9271C36.9182 16.9271 36.5605 17.0752 36.2967 17.339L33.3801 20.2556C33.3712 20.2645 33.3624 20.2735 33.3538 20.2826L17.3391 36.2973C17.0754 36.561 16.9272 36.9187 16.9272 37.2917V41.6667C16.9272 42.4433 17.5568 43.0729 18.3335 43.0729H22.7085C23.0815 43.0729 23.4391 42.9247 23.7029 42.661L39.7445 26.6194C39.7533 26.6105 39.762 26.6016 39.7706 26.5926L42.6605 23.7027C43.2097 23.1535 43.2097 22.2631 42.6605 21.714L38.2855 17.339ZM34.3748 23.2391L36.7611 25.6254L22.126 40.2604H19.7397V37.8741L34.3748 23.2391ZM38.7498 23.6359L39.6774 22.7083L37.2911 20.3221L36.3636 21.2496L38.7498 23.6359Z"
                        fill="black" />
                    <rect x="2" y="2" width="56" height="56" rx="7" stroke="black" stroke-width="4" />
                </svg>
                Wijzig Gerecht
            </button>
        </form>
    </div>
    <?php
    include_once("login.php");

    include_once("register.php");
?>
</body>
<script src="javascript/login.js"></script>

<script src="javascript/confirmpasswoord.js"></script>

<script src="javascript/dropwdown.js"></script>

<script src="javascript/search.js"></script>

<?php
ob_end_flush();
?>

</html>