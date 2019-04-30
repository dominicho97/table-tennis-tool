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
    <title>Document</title>
    <link rel="stylesheet" href="reservation.css" />
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


  
    <div class='wrapper'>
  <div>Monday</div>
  <div>Tuesday</div>
  <div>Wednesday</div>  
  <div>Thursday</div>
  <div>Friday</div>
</div>


<!--select boxes-->
<div class='wrapper-options'>
  <select id = "selectbox1" onChange = "changeTime1()">
    <option value="morning">Morning</option>
    <option value="noon">Noon</option>
    <option value="afternoon">Afternoon</option>
  <select>

  <select id = "selectbox2" onChange = "changeTime2()">
    <option value="morning">Morning</option>
    <option value="noon">Noon</option>
    <option value="afternoon">Afternoon</option>
  <select>

  <select id="selectbox3" onChange = "changeTime3()">
    <option value="morning">Morning</option>
    <option value="noon">Noon</option>
    <option value="afternoon">Afternoon</option>
  <select>

  <select id="selectbox4" onChange = "changeTime4()">
    <option value="morning">Morning</option>
    <option value="noon">Noon</option>
    <option value="afternoon">Afternoon</option>
  <select>

 
  <select id="selectbox5" onChange = 'changeTime5()' >
    <option  value = "morning">Morning</option>
    <option  value="noon">Noon</option>
    <option  value="afternoon">Afternoon</option>
  <select>
 
</div>

<!--morning time-->
<div class="time-wrapper1">
    <div class="time-morning1">
    <button>11:00 - 11:05</button>
    <br>
    <button>11:05 - 11:10</button>
    <br>
    <button>11:10 - 11:15</button>
</div>
   <div class="time-morning2">
    <div>11:00 - 11:05</div>
    <br>
    <div>11:05 - 11:10</div>
    <br>
    <div>11:10 - 11:15</div>
</div>
   <div class="time-morning3">
    <div>11:00 - 11:05</div>
    <br>
    <div>11:05 - 11:10</div>
    <br>
    <div>11:10 - 11:15</div>
</div>
<div class="time-morning4">
    <div>11:00 - 11:05</div>
    <br>
    <div>11:05 - 11:10</div>
    <br>
    <div>11:10 - 11:15</div>
</div>
   <div class="time-morning5">
     <button>11:00 - 11:05</button>
     <br>
     <button>11:05 - 11:10</button>
     <br>
     <button>11:10 - 11:15</button>
     <br>
</div>
</div>

 <!--noon times-->

<div class="time-wrapper2">
  <div class="time-noon1" >
    <button>12.30 - 12.40</button>
    <br>
     <button>12:40 - 12:50</button>
     <br>
     <button>12:50 - 13:00</button>
    <br><br>
    <button>13.00 - 13:10</button>
    <br>
     <button>13:10 - 13:20</button>
     <br>
    <button>13:20 - 13:30</button>
  </div>

  <div class="time-noon2">
  <button>12.30 - 12.40</button>
    <br>
     <button>12:40 - 12:50</button>
     <br>
     <button>12:50 - 13:00</button>
    <br><br>
    <button>13.00 - 13:10</button>
    <br>
     <button>13:10 - 13:20</button>
     <br>
    <button>13:20 - 13:30</button>
  </div>

  <div class="time-noon">
  <button>12.30 - 12.40</button>
    <br>
     <button>12:40 - 12:50</button>
     <br>
     <button>12:50 - 13:00</button>
    <br><br>
    <button>13.00 - 13:10</button>
    <br>
     <button>13:10 - 13:20</button>
     <br>
    <button>13:20 - 13:30</button>
   </div>

   <div class="time-noon4">
   <button>12.30 - 12.40</button>
    <br>
     <button>12:40 - 12:50</button>
     <br>
     <button>12:50 - 13:00</button>
    <br><br>
    <button>13.00 - 13:10</button>
    <br>
     <button>13:10 - 13:20</button>
     <br>
    <button>13:20 - 13:30</button>
   </div>

  <div class="time-noon5">
  <button>12.30 - 12.40</button>
    <br>
     <button>12:40 - 12:50</button>
     <br>
     <button>12:50 - 13:00</button>
    <br><br>
    <button>13.00 - 13:10</button>
    <br>
     <button>13:10 - 13:20</button>
     <br>
    <button>13:20 - 13:30</button>
  </div>
</div>

<!--morning time-->
<div class="time-wrapper3">
    <div class="time-afternoon1">
    <div>15:30 - 15:35</div>
    <br>
    <div>15:35 - 15:40</div>
    <br>
    <div>15:40 - 13:45</div>
</div>
   <div class="time-afternoon2">
    <div>15:30 - 15:35</div>
    <br>
    <div>15:35 - 15:40</div>
    <br>
    <div>15:40 - 13:45</div>
</div>
   <div class="time-afternoon3">
    <div>15:30 - 15:35</div>
    <br>
    <div>15:35 - 15:40</div>
    <br>
    <div>15:40 - 13:45</div>
</div>
<div class="time-afternoon4">
    <div>15:30 - 15:35</div>
    <br>
    <div>15:35 - 15:40</div>
    <br>
    <div>15:40 - 13:45</div>
</div>
   <div class="time-afternoon5">
    <div>15:30 - 15:35</div>
    <br>
    <div>15:35 - 15:40</div>
    <br>
    <div>15:40 - 13:45</div>
</div>
</div>

</body>