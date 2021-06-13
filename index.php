<?php
require_once('configdb.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
    </head>

    <body>
        <?php
            if(isset($_POST['logr'])){
                $email = $_POST['email'];
                $password = $_POST['pass'];
                
                $pass = password_hash($password,PASSWORD_BCRYPT);
                $query = "select * from socialapp_register_users where email='$email' and ppassword = '$pass' ";
                $result = mysqli_query($con,$query);
                if(mysqli_num_rows($result)==1){
                    session_start();
                    $_SESSION['socialappusers'] = 'true';
                    header('location:welcome.php');
                }
                else{
                    echo 'Wrong Username or Password';
                }


            }
        ?>
        <div class="container">
            <h1>Welcome to socialapp</h1>
        <form action="welcome.php" method="GET"><div class="form-group">
            <label for = "email">Email : </label>
            <input class="form-control" type="email" name="email" placeholder = "abc@gmail.com" class="email" required></div>
            <div class="form-group">
            <label for="password">Password : </label>
            <input type="password"  name = "pass" class="form-control" class="password" required>
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <button class="btn btn-default" name="logr">Login</button> 
            <p><a href="#">forgot password</a></p>
            <div class="btn btn-default"><a href = "index.php">Login</a></div> or <div class="btn btn-default"><a href = "signup.php">Signup</a></div>
        </div></form>
        </div>
    </body>

</html>
