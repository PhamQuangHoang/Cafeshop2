<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title id="title"></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="login.css">
  

</head>
<body>
  
 <?php  session_start();
    include("login_php.php");
?>
    <div class="container">
        <div class="card card-container ">
            <img id="profile-img" class="profile-img-card" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card">Hi !!!!</p>
            <form class="form-signin" method="post" action="">
                <span id="reauth-email" class="reauth-email"></span>
                <div class="user-input"><input type="text" id="inputEmail" name="user_name" class="form-control" placeholder="Email address"
                 value="<?php
                  if(isset($_COOKIE['remembername'])) {
                    echo $con->decryptCookie($_COOKIE['remembername']);
                  }


                ?>" required autofocus></div>


                <div class="password-input"><input type="password" id="inputPassword" name="pass_word" class="form-control" placeholder="Password"
                   value="<?php
                  if(isset($_COOKIE['rememberpass'])) {
                    echo $con->decryptCookie($_COOKIE['rememberpass']);
                  }

                ?>"
                 required></div>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" name="remember-me" value="remember-me"  <?php
                  if(isset($_COOKIE['remembername'])) {
                    echo "checked";
                  }
                     ?> 
                  > Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" name="signin" type="submit">Sign in</button>
            </form>
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
            <a href="regis.php" class="forgot-password">
                Do not have accounts Regis here !!!
            </a>
        </div>
    </div>


