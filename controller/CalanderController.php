<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/CalanderDAO.php';

class CalanderController extends Controller {

  public function index() {
    $bookingDAO = new CalanderDAO();
    $bookings = $bookingDAO->selectAllWithTitle();
    $this->set('bookings', $bookings);
    $this->set('title', 'Calander');


    if(isset($_POST["break_DD_D"])){
      $_SESSION['setDayBreak'][$_POST["day"]] = $_POST["break_DD_D"];
      $cDayArr = explode('-', $_POST["thisDay"]);

      $cjd = cal_to_jd(CAL_GREGORIAN,date($cDayArr[1]),date($cDayArr[2]),date($cDayArr[0]));
      $_SESSION['setDay'] = strtolower(jddayofweek($cjd,1));
    }


    if(isset($_POST["delete"])){

      $bookingToDelete = $bookingDAO->selectBookingById($_POST["deleteTime"]);
      if($bookingToDelete["users_id"] == $_SESSION['name']["id"] || $bookingToDelete["chalenged_user"] == $_SESSION["name"]["id"]){
        $bookingDAO->removeBooking($_POST["deleteTime"]);
      }

      $cDay = explode(' ', $bookingToDelete["booking_time"])[0];
      $cDayArr = explode('-', $cDay);

      $cjd = cal_to_jd(CAL_GREGORIAN,date($cDayArr[1]),date($cDayArr[2]),date($cDayArr[0]));
      $_SESSION['setDay'] = strtolower(jddayofweek($cjd,1));

      header('Location: calander.php');

    }

    if(isset($_POST["book"])){

      $chalanged = NULL;
      if(isset($_POST["chalange"])){

        $chalange = 1;
        $chalanged = $bookingDAO->selectUserByName($_POST["chalanged"])["id"];

        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "becodePP@hotmail.com";
        $to = $chalanged["email"];
        $subject = "You where chalanged at ping pong";
        $message = "Youwhre chalanged by " . $_SESSION['name']['user'] . " to play against him at " . $_POST["date-time"] . " at ping pong.";
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
        echo "The email message was sent.";

      } else {

        $chalange = 0;

      }

      echo $chalanged;

      $cDay = explode(' ', $_POST["date-time"])[0];
      $cDayArr = explode('-', $cDay);

      $cjd = cal_to_jd(CAL_GREGORIAN,date($cDayArr[1]),date($cDayArr[2]),date($cDayArr[0]));
      $_SESSION['setDay'] = strtolower(jddayofweek($cjd,1));

      function checkDay($arr)
      {
        return explode(' ', $_POST["date-time"])[0] == explode(' ', $arr["booking_time"])[0] && $_SESSION['name']["id"] == $arr["users_id"];
      }

      if(sizeof(array_filter($bookings,"checkDay")) == 0){

        $nebookings = $bookingDAO->postBooking($chalange,$chalanged,$_POST["date-time"], $_SESSION['name']["id"]);
        header('Location: calander.php');

      } else {
        echo "<script type='text/javascript'>alert('you already have a booking this day');</script>";
      }

    }


    function bookings($day_bookings,$break,$room,$min_change,$bookingDAO)
    {

         $mins = (strlen(strval($min_change * (10))) == 1 ? "0" . strval($min_change * (10)) : $min_change * (10));

         if(intval($mins) >= 60){
           $min_change -= 6;
           $break["houre"]++;
           $mins = (strlen(strval($min_change * (10))) == 1 ? "0" . strval($min_change * (10)) : $min_change * (10));
         }

         $booked = false;
         $booked_text = NULL;
         $booking_info = NULL;
         $booking_chalanged = NULL;

         foreach($day_bookings as $value){

            if(explode(' ', $value['booking_time'])[1] == $break["houre"] . ":". $mins .":00"){

              $booking = $bookingDAO->selectUserById($value["users_id"]);

              $booked = true;
              $booked_text = $booking;
              $booking_info = $value;

              $value["chalange"] == 0 ? $booking_chalanged = NULL : $booking_chalanged = $bookingDAO->selectUserById($value["chalenged_user"]) ;

              break;

            }else{

              $booked = false;

          }

        }

        // $booked ? $_test="<h1>".$booked_text."</h1>" : $_test="<button>".$booked_text."</button><br>";
        $booked ? $_test=$booked_text : $_test=false;

        // echo $mins;
        return [$_test, $break["houre"] . ":". $mins .":00", $booking_info, $booking_chalanged];
        // echo $_test;

    }


    function deleteEveryBooking()
    {

      $bookingDAO = new CalanderDAO();
      $deleteEverythinig = $bookingDAO->removeAllBooking();
    }

  }

}
