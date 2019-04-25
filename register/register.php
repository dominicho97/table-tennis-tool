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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="register.css" />
    <title>Document</title>
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
          <a href="../login/login.php">Log In</a>
        </li>
        <li>
          <a href="./register.php">Register</a>
        </li>
        <li>
          <a href="../schedule/schedule.php">Schedule</a>
        </li>
        <li>
          <a href="../reservation/reservation.php">Make a reservation!</a>
        </li>
      </ul>
    </div>
    <h2>Register</h2>

    <form action="register.php" method='POST'>
        UserName: <input type="text" name= 'username'><br>
        Email:<input type="email" name= 'email'><br>
        Password:<input type="password" name= 'password'><br>
        Confirm Password: <input type="password" name= 'password2'><br>
        Group: <input type="text" name= 'room'><br>
        <input name= 'register' type="submit" value='Register'> OR <a href='../login/login.php'>Already have an account?</a>

    </form>
</body>
</html>