<?php
//allow the conf
define('__CONFIG__', true);
//require the conf
//require_once 'inc/config.php';
include ('../classes/DB.php');

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];


  if (DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))){

   if(password_verify($password, DB::query('SELECT password FROM users WHERE email=:email', array(':email'=>$email))[0]['password'])) {
    echo 'Logged in!';
} else {
    echo 'Incorrect Password!';
}
} else {
echo 'User not registered!';

}

}

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


    <div class="login-form">
    <h1>Login</h1>


    
    <form action="login.php"  method='POST'>
 
        <input type="email" name= 'email' placeholder="Email" class="field"><br>
       <input type="password" name= 'password' placeholder="Password" class="field"><br><br>

        <input type="submit" value='Log In'  class="login-btn" name= 'login'>  <a href='../register/register.php'>Create an account</a>

    </form>
</body>
</html>