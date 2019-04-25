<?php
//allow the conf
define('__CONFIG__', true);
//require the conf
//require_once 'inc/config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
    <link rel="stylesheet" href="login.css" />
</head>
<body>
    

   <div className="nav">
      <ul>
        <li>
          <a className="active" href="../index.php">
            Home
          </a>
        </li>
        <li>
          <a href="./login.php">Log In</a>
        </li>
        <li>
          <a href="../register/register.php">Register</a>
        </li>
        <li>
          <a href="../schedule/schedule.php">Schedule</a>
        </li>
        <li>
          <a href="../reservation/reservation.php">Make a reservation!</a>
        </li>
      </ul>
    </div>


    <div class="login-box">
    <h1>Login</h1>


    
    <form action="login.php"  method='POST'>

    <div class="text-box1">
    <i class="fas fa-user"></i>
        <input type="email" name= 'email' placeholder="Email">
</div>

    <div class="text-box2">
    <i class="fas fa-lock"></i>
       <input type="password" name= 'password' placeholder="Password"><br><br>
</div>
        <input type="submit" value='Log In'  class="btn" name= 'login'> Or <a href='../register/register.php'>Create an account</a>

    </form>
</body>
</html>