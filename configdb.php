<?php

$db_server="localhost";
$db_user="root";
$db_pass = "";
$db_name="socialappusers";

$con = mysqli_connect($db_server,$db_user,$db_pass,$db_name);

if($con){
    ?>
    <script>
        alert("Connection successful")
    </script>
    <?php    
}
else{
    ?>
    <script>
        alert("Connection not successful")
    </script>
    <?php
}

#$db = new PDO('mysql:host=localhost;dbname'.$db_name.';charset=utf8',$db_user,$db_pass);
#$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


?>