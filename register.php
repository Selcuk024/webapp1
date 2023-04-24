<div class="overlay" id="register">

<div class="wrapper">

    <h3>Welcome Back</h3>

    <a href="#" class="close">&times;</a>

    <div class="content">

        <div class="container">
            <?php

            if (isset($_POST['register-submit'])) {

                $username = isset($_POST['name']) ? $_POST['name'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $password2 = isset($_POST['regpassword']) ? $_POST['regpassword'] : '';



                $sql = "INSERT INTO logindata (name, mail, password) VALUES ('$username', '$email', '$password2')";
                if ($connectie2->query($sql) === TRUE) {
                    echo "User created successfully";
                } else {
                    echo "Error: " . implode("", $connectie2->errorinfo());
                }
            }
            echo '<script>
            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
            </script>';

            ?>

            <form class="form" action="index.php" method="post">
                <label for="name">Name</label>
                <input name="name" type="name" id="name" class="login-text" placeholder="Your Name">

                <label>E-Mail</label>
                <input type="email" name="email" class="login-text" placeholder="Your Email">

                <label for="password" class="password-class">Password</label>
                <input type="password" name="regpassword" class="login-text" placeholder="Your Password">

                <label for="confirm_password">Confirm Password</label>
                <input type="password" placeholder="Confirm Password" id="confirm_password" required>

                <input type="submit" name="register-submit" class="submit" value="Submit">
            </form>


        </div>



    </div>

</div>

</div>