<!DOCTYPE html>
<?php
	require 'conn.php';
	session_start();
 
	if(!ISSET($_SESSION['user'])){
		header('location:index.php');
	}
?>
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


 

    <nav>

        <img src="media/logo1.png" class="logo">

        <h1 class="name">

            Cafetarie L.Y.M

        </h1>

        <div class="nav-container">

            <div id="searchbox">


 

                <input type="text" placeholder="Search">

                <svg id="search-logo" width="84" height="84" viewBox="0 0 84 84" fill="none"

                    xmlns="http://www.w3.org/2000/svg">

                    <path

                        d="M48.9944 47.0057C48.4452 46.4565 47.5548 46.4565 47.0056 47.0057C46.4565 47.5548 46.4565 48.4452 47.0056 48.9944L48.9944 47.0057ZM59.0056 60.9944C59.5548 61.5436 60.4452 61.5436 60.9944 60.9944C61.5435 60.4452 61.5435 59.5548 60.9944 59.0057L59.0056 60.9944ZM38 50.5938C31.0447 50.5938 25.4063 44.9554 25.4063 38H22.5938C22.5938 46.5087 29.4914 53.4063 38 53.4063V50.5938ZM50.5938 38C50.5938 44.9554 44.9553 50.5938 38 50.5938V53.4063C46.5086 53.4063 53.4063 46.5087 53.4063 38H50.5938ZM38 25.4063C44.9553 25.4063 50.5938 31.0447 50.5938 38H53.4063C53.4063 29.4914 46.5086 22.5938 38 22.5938V25.4063ZM38 22.5938C29.4914 22.5938 22.5938 29.4914 22.5938 38H25.4063C25.4063 31.0447 31.0447 25.4063 38 25.4063V22.5938ZM47.0056 48.9944L59.0056 60.9944L60.9944 59.0057L48.9944 47.0057L47.0056 48.9944Z"

                        fill="white" />

                    <rect x="1" y="1" width="82" height="82" rx="8" stroke="white" stroke-width="2" />

                </svg>



 

            </div>

            <svg class="shop-logo" width="84" height="84" viewBox="0 0 84 84" fill="none"

                xmlns="http://www.w3.org/2000/svg">

                <path

                    d="M24 22.5938C23.2234 22.5938 22.5938 23.2234 22.5938 24C22.5938 24.7767 23.2234 25.4063 24 25.4063L24 22.5938ZM29 24L30.3643 23.659C30.2078 23.0329 29.6453 22.5938 29 22.5938L29 24ZM56 51.4063C56.7767 51.4063 57.4063 50.7767 57.4063 50C57.4063 49.2234 56.7767 48.5938 56 48.5938V51.4063ZM60 28L61.3643 28.3411C61.4693 27.921 61.3749 27.4759 61.1084 27.1346C60.8419 26.7933 60.4331 26.5938 60 26.5938V28ZM56 44V45.4063C56.6453 45.4063 57.2078 44.9671 57.3643 44.3411L56 44ZM24 25.4063L29 25.4063L29 22.5938L24 22.5938L24 25.4063ZM27.6358 24.3411L28.6358 28.3411L31.3643 27.659L30.3643 23.659L27.6358 24.3411ZM28.6358 28.3411L32.6358 44.3411L35.3643 43.659L31.3643 27.659L28.6358 28.3411ZM34 42.5938H33V45.4063H34V42.5938ZM33 51.4063H56V48.5938H33V51.4063ZM28.5938 47C28.5938 49.4335 30.5665 51.4063 33 51.4063V48.5938C32.1198 48.5938 31.4063 47.8802 31.4063 47H28.5938ZM33 42.5938C30.5665 42.5938 28.5938 44.5665 28.5938 47H31.4063C31.4063 46.1198 32.1198 45.4063 33 45.4063V42.5938ZM30 29.4063H60V26.5938H30V29.4063ZM58.6358 27.659L54.6358 43.659L57.3643 44.3411L61.3643 28.3411L58.6358 27.659ZM56 42.5938H34V45.4063H56V42.5938ZM54.5938 58C54.5938 58.3279 54.3279 58.5938 54 58.5938V61.4063C55.8812 61.4063 57.4063 59.8812 57.4063 58H54.5938ZM54 58.5938C53.6721 58.5938 53.4063 58.3279 53.4063 58H50.5938C50.5938 59.8812 52.1188 61.4063 54 61.4063V58.5938ZM53.4063 58C53.4063 57.6721 53.6721 57.4063 54 57.4063V54.5938C52.1188 54.5938 50.5938 56.1188 50.5938 58H53.4063ZM54 57.4063C54.3279 57.4063 54.5938 57.6721 54.5938 58H57.4063C57.4063 56.1188 55.8812 54.5938 54 54.5938V57.4063ZM34.5938 58C34.5938 58.3279 34.3279 58.5938 34 58.5938V61.4063C35.8812 61.4063 37.4063 59.8812 37.4063 58H34.5938ZM34 58.5938C33.6721 58.5938 33.4063 58.3279 33.4063 58H30.5938C30.5938 59.8812 32.1188 61.4063 34 61.4063V58.5938ZM33.4063 58C33.4063 57.6721 33.6721 57.4063 34 57.4063V54.5938C32.1188 54.5938 30.5938 56.1188 30.5938 58H33.4063ZM34 57.4063C34.3279 57.4063 34.5938 57.6721 34.5938 58H37.4063C37.4063 56.1188 35.8812 54.5938 34 54.5938V57.4063Z"

                    fill="white" />

                <rect x="1" y="1" width="82" height="82" rx="8" stroke="white" stroke-width="2" />

            </svg>

            <div class="dropdown">

                <svg onclick="myFunction()" class="profile-logo" width="84" height="84" viewBox="0 0 84 84" fill="none"

                    xmlns="http://www.w3.org/2000/svg">

                    <path fill-rule="evenodd" clip-rule="evenodd"

                        d="M35.4064 32C35.4064 28.3584 38.3585 25.4063 42.0001 25.4063C45.6418 25.4063 48.5939 28.3584 48.5939 32C48.5939 35.6417 45.6418 38.5938 42.0001 38.5938C38.3585 38.5938 35.4064 35.6417 35.4064 32ZM42.0001 22.5938C36.8052 22.5938 32.5939 26.8051 32.5939 32C32.5939 37.195 36.8052 41.4063 42.0001 41.4063C47.195 41.4063 51.4064 37.195 51.4064 32C51.4064 26.8051 47.195 22.5938 42.0001 22.5938ZM29.406 54.6667C29.406 51.7276 31.7199 49.4063 34.4998 49.4063H49.4998C52.2796 49.4063 54.5935 51.7276 54.5935 54.6667V56.5938H29.406V54.6667ZM34.4998 46.5938C30.0999 46.5938 26.5935 50.2419 26.5935 54.6667V58C26.5935 58.7767 27.2231 59.4063 27.9998 59.4063H55.9998C56.7764 59.4063 57.406 58.7767 57.406 58V54.6667C57.406 50.2419 53.8996 46.5938 49.4998 46.5938H34.4998Z"

                        fill="white" />

                    <rect x="1" y="1" width="82" height="82" rx="8" stroke="white" stroke-width="2" />

                </svg>

                <div id="myDropdown" class="dropdown-content">

                    <a href="#divOne" id="login1">Login</a>

                    <a href="#register">Register</a>


 

                </div>

            </div>


 

        </div>


 

    </nav>

    <div class="home-container">


 

        <div class="home-container2">


 

            <h2>

                Menu

            </h2>

            <div class="menu-box">

                <div class="menu-container1">

                    <p class="menu-name">Kapsalon</p>

                    <p class="menu-description">A dish of fries covered with döner, fresh salad and melted cheese</p>

                    <p class="menu-price">€ 6.30</p>

                </div>

                <div class="menu-container1">

                    <button class="add">Add</button>

                </div>

            </div>

            <div class="menu-box">

                <div class="menu-container1">

                    <p class="menu-name">Kapsalon</p>

                    <p class="menu-description">A dish of fries covered with döner, fresh salad and melted cheese</p>

                    <p class="menu-price">€ 6.30</p>

                </div>

                <div class="menu-container1">

                    <button class="add">Add</button>

                </div>

            </div>

            <div class="menu-box">

                <div class="menu-container1">

                    <p class="menu-name">Kapsalon</p>

                    <p class="menu-description">A dish of fries covered with döner, fresh salad and melted cheese</p>

                    <p class="menu-price">€ 6.30</p>

                </div>

                <div class="menu-container1">

                    <button class="add">Add</button>

                </div>

            </div>


 

        </div>

    </div>

    <div class="overlay" id="divOne">

        <div class="wrapper">

            <h3>Welcome Back</h3>

            <a href="#" class="close">&times;</a>

            <div class="content">

                <div class="container">

                    <form>

                        <label>E-Mail</label>

                        <input type="email" class="login-text" placeholder="Your Name">

                        <label for="login-text" class="password-class" >Password</label>

                        <input type="password" id="br" class="login-text" placeholder="Your Password">

                        <input type="submit"class="submit" value="Submit">

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

                    <form>

                        <label for="name">Name</label>

                        <input type="name" id="name" class="login-text" placeholder="Your Name">

                        <label>E-Mail</label>

                        <input type="email" class="login-text" placeholder="Your Name">

                        <label for="login-text" class="password-class" >Password</label>

                        <input type="password" id="password" class="login-text" placeholder="Your Password">

                        <label for="confirm_password">repeat password</label>

                        <input type="password" placeholder="Confirm Password" id="confirm_password" required>

                        <input type="submit"class="submit" value="Submit">

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