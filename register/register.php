<?php
//allow the conf
define('__CONFIG__', true);
//require the conf
//require_once 'inc/config.php';
include('../classes/DB.php');
if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  
  if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))){

    if (strlen($username) >= 3 && strlen($username) <= 32){

      if (preg_match('/[a-zA-Z0-9_]+/', $username)){

        if (strlen($password) >= 6 && strlen($password) <= 60){

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

  DB::query('INSERT INTO users VALUES (\'\', :username, :email, :password,:password2)', array(':username'=>$username, ':email'=>$email, ':password'=>password_hash($password,PASSWORD_BCRYPT ),':password2'=> password_hash($password2, PASSWORD_BCRYPT)));
  echo "Success!";

        } else {
          echo 'invalid email';
        }

      } else{
        echo 'invalid password!';
      }
      } else {
        echo 'Invalid username';
      }

} else {
  echo 'Invalid username!';
}

  } else{
    echo 'User already exists!';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="register.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
   
  <div class="signup-form">
    <form action="register.php" method='POST'>
    <h1>Register</h1>
        <input type="text" name= 'username' placeholder="Username " class="field">
       <br>
        <input type="email" name= 'email'placeholder="Email"class="field"><br>
        <input type="password" name= 'password'placeholder="Password"class="field"><br>
       <input type="password" name= 'password2'placeholder= "Confirm password" class="field"><br>
      <!--  <input type="text" name= 'room'placeholder="Group"class="field"><br>-->
        <input name= 'register' type="submit"  class="signup-btn" value='Register'>  <a href='../login/login.php'>Already have an account?</a>
    </form>
</div>
</body>
</html>