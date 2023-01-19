<?php
include "connect_db.php";
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form action="" name="register_form" method="POST">
  <div class="mb-3">
    <label for="username" class="form-label">Username:</label>
    <input type="username" class="form-control" id="username" aria-describedby="discription" name="username">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd">
  </div>
  <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>
    
    <?php
    if(isset($_POST["login"])){

        $admin = mysqli_real_escape_string($link,$_POST['username']);
        $password = mysqli_real_escape_string($link,$_POST['pwd']); 
        $_SESSION['username'] = $admin;


        $res=mysqli_query($link, "select *from admin_db where admin_username = '$admin' and admin_password = '$password'");
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $count = mysqli_num_rows($res); 
          
        if($count == 1){ 
            ?> 
            <script>
            window.location.assign("admin_home.php")
            </script>
            <?php  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";
            ?>
            <script>
              window.alert("Login Failed, Invalid username or password")
            </script>
            <?php
            session_destroy();  
        }     
    }
    ?>

</body>
</html>