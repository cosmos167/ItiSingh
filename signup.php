// This page registers the user for the app and saves the user info in database
// If the user is already presents then its alerta that the email is already registered

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
        <div>
            <?php
            if(isset($_POST['regstr'])){
                $full_name = $_POST['full_name'];
                $username  = $_POST['username'];
                $email     = $_POST['email'];
                $password  = $_POST['password'];
                
                $pass = password_hash($password,PASSWORD_BCRYPT);
                $emailque = "select * from socialapp_register_users where email='$email' ";
                $query = mysqli_query($con,$emailque);
                $emailcount = mysqli_num_rows($query);
                if($emailcount>0){
                    ?>
                        <script>
                            alert("Email already exists")
                        </script>
                    <?php
                }
                else{
                    $sql = "INSERT INTO socialapp_register_users(Full_Name,Username,Email,ppassword) VALUES('$full_name','$username','$email' ,'$pass')";
                    $isql = mysqli_query($con,$sql);
                    if($isql){
                        ?>
                        <script>
                            alert("Congrats.Now you are Registered.")
                        </script>
                        <?php    
                    }
                    else{
                        ?>
                        <script>
                            alert("Registeration not successful")
                        </script>
                        <?php
                    }
                    
                }
                
            }
            ?>
        </div>
        <div class = "container">
        <h1>Signup</h1>
        <h3>Please fill following details to signup...</h3><hr>
        <form action="signup.php" method="post"><div class="form-group">
            <label>Full Name : </label>
            <input type="text" name="full_name" required><br><br>
            <label>Username : </label>
            <input type="text" name="username" required><br><br>
            <label>Email : </label>
            <input type="email" name="email" required><br><br>
            <label>Password : </label>
            <input type="password" name="password" required><br><br>
            <button class="btn btn-default" name="regstr">Signup</button>
            or
            <button class="btn btn-default"><a href="index.php">Login</a></button>
        </div></form>
        </div>
    </body>
</html>
