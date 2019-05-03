
<?php

$bookingDAO = new CalanderDAO();
$user_room = $bookingDAO->selectRoomById($_SESSION["name"]["room"]);
$arr = $bookingDAO->selectAllUsers();
$thisWeakBookings = 0;


$breaks = [
1 => ["amount"=>3,"duration"=>.5,"houre"=>11,"pauze"=>"Morning"],
2 => ["amount"=>6,"duration"=>1,"houre"=>12,"pauze"=>"Noon"],
3 => ["amount"=>3,"duration"=>.5,"houre"=>15,"pauze"=>"Afternoon"]
];
$room = ["Morning"=>intval(explode(':', $user_room['pauze_1'])[1])/10,"Noon"=>intval(explode(':', $user_room['pauze_2'])[1])/10,"Afternoon"=>intval(explode(':', $user_room['pauze_3'])[1])/10];
$weak = [1=>"monday", 2=>"tuesday", 3=>"wednesday", 4=>"thursday", 5=>"friday"];

class Filter{

  function __construct($day)
  {
    $this->day = $day;
  }

   function arrayfilter($array)
  {
    return explode(' ', $array['booking_time'])[0] == $this->day;
  }

}

?>

<div id="container">

<!--- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - DAY BUTTONS -->

<div class="dayButtons">
  <ul>
    <li><div class="mondayBtn dayBtn">M</div></li>
    <li><div class="tuesdayBtn dayBtn">T</div></li>
    <li><div class="wednesdayBtn dayBtn">W</div></li>
    <li><div class="thursdayBtn dayBtn">T</div></li>
    <li><div class="fridayBtn dayBtn">F</div></li>
  </ul>
</div> <!-- end of DayButtons -->

<br>
<br>


<!-- chalange? -->

<div id="book-box" class="overlay">

  <form id="deleteForm" method="post">

    <h3>CHALLENGE?</h3>
    <input class="checkbox" type="checkbox" name="chalange" id="chalange" value="">

    <br>
    <br>

    <div class="autocomplete">

      <div class="target">
        <h5>Who do you want to challenge?</h5>
        <input type="text" name="chalanged" id="chalanged" value="">
      </div>

    </div>

    <input type="hidden" name="date-time" id="date-time" value="2019-04-24 13:20:00 ">

    <input type="submit" name="book" id="book" value="BOOK ME">

  </form>

</div>

<main class="weak">






<!-- MAKE EVERY DAY OF THE WEAK -->
  <?php foreach ($weak as $key => $day):
  $jd = cal_to_jd(CAL_GREGORIAN,date("m"),date("d"),date("Y"));
  $this_day = explode('-', date("Y-m-d"));
  // print_r($this_day);
  $lastDayOfM = explode('-', date("Y-m-t", strtotime($this_day[0]."-".$this_day[1]."-".$this_day[2])))[2];

  if($this_day[2]-(jddayofweek($jd,0)-$key) > $lastDayOfM){
    $thisday = $this_day[0]."-".("0" . ($this_day[1]+1))."-".("0" . (0-(jddayofweek($jd,0)-$key)));
  } else if($this_day[2]-(jddayofweek($jd,0)-$key) < 1) {
    $lastMonth = explode('-', date('Y-m-d', strtotime('last day of previous month')));
    $lastMonthLastDay = jddayofweek(cal_to_jd(CAL_GREGORIAN,date($lastMonth[1]),date($lastMonth[2]),date($lastMonth[0])),0);
    $thisday = $lastMonth[0]."-".($lastMonth[1])."-".($lastMonth[2]-($lastMonthLastDay-$key));
  } else {
    $added0 = "0";
    strlen(strval($this_day[2]-($added0 . jddayofweek($jd,0)-$key))) == 1 ? $added0 = "0" : $added0 = "";
    $thisday = $this_day[0]."-".$this_day[1]."-".($added0 . ($this_day[2]-(jddayofweek($jd,0)-$key)));
  }

  ?>

    <div class="day <?php echo $day ?>" id=<?php echo $day ?>>

      <?php $day_bookings = (array_filter($bookings, array(new Filter($thisday), "arrayfilter"))); ?>

      <?php $setDayBreak = $_SESSION['setDayBreak'][$day] ?? "morning" ?>

      <div class="<?php echo $day ?>Block Block">

      <form id="break_DD<?php echo $day ?>" method="post">

        <input type="hidden" name="day" value=<?php echo $day ?>>
        <input type="hidden" name="thisDay" value=<?php echo $thisday ?>>

        <select class="<?php echo $day ?>Breaks" name="break_DD_D" form="break_DD<?php echo $day ?>" onchange="this.form.submit()">
          <option class="morning" value="morning" <?php echo $setDayBreak == "morning" ? "selected" : NULL;  ?>>Morning</option>
          <option class="noon" value="noon" <?php echo $setDayBreak == "noon" ? "selected" : NULL; ?>>Noon</option>
          <option class="afternoon" value="afternoon" <?php echo $setDayBreak == "afternoon" ? "selected" : NULL; ?>>Afternoon</option>
        </select>

      </form>


      <!-- MAKE EVERY BREAK OF THE DAY -->

      <?php foreach ($breaks as $break):
        $bookingDAO = new CalanderDAO();
        ?>

        <div class="<?php echo $day . $break["pauze"] ?>">


          <!-- MAKE EVERY BOOKINGIN BREAK -->

        <?php
        for ($i=0; $i < $break["amount"] ; $i++):
          $min_change = $room[$break["pauze"]] + ($i*$break["duration"]);
          $timeInfo = bookings($day_bookings,$break, $room, $min_change, $bookingDAO);
          $booking = $timeInfo[0];
          $time = $timeInfo[1];
          $booking_info = $timeInfo[2];
          $booking_chalanged = $timeInfo[3];
          if($booking == false): ?>

              <button data="<?php echo $thisday . " " . $time?>" type="button" name="pickDate" class="pickDate"> <?php echo $time?> </button>
              <br>

          <?php else: $thisWeakBookings++ ?>


            <?php if ($booking_info["chalange"] == 1 && $booking_info["chalenged_user"] >= 1):

               $book_text = $booking["userName"] . " VS " . $booking_chalanged["userName"] . $time;

             else:

               $book_text = $booking["userName"] . $time;

             endif; ?>

            <form method="post">

              <h1><?php echo $book_text ?></h1>
              <?php if ($booking["id"] == $_SESSION["name"]["id"] || $booking_chalanged["id"] == $_SESSION["name"]["id"]): ?>

                <input type="hidden" name="deleteTime" value="<?php echo $booking_info["id"] ?>">

                <input type="submit" name="delete" value="X">

              <?php endif; ?>

            </form>

          <?php endif; ?>

        <?php endfor; ?>

        <hr>

        </div>

      <?php endforeach; ?>

      </div>

    </div>

  <?php endforeach; ?>
  <?php if(end($bookings)["booking_time"] < date('Y-m-d', strtotime('monday this week')) && sizeof($bookings) != 0){

    deleteEveryBooking();

  } ?>

</main>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/script.js"></script>

<script>

  let pickedTime;

  $(".pickDate").click(function() {
    console.log($(this).attr("data"));
    pickedTime = $(this);
    $("#book-box").css("display", "block");
    $("#date-time").attr("value", $(this).attr("data"));
  });

  <?php $_setDay = $_SESSION['setDay'] ?? "nope"; ?>

  if("<?php echo $_setDay ?>" == "nope"){
    $(".day").css("display", "none");
    $(".dayBtn").removeClass('activeButton');
    $(".<?php echo strtolower(jddayofweek($jd,1)) ?>").css("display", "block");
    $(".<?php echo strtolower(jddayofweek($jd,1)) ?>Btn").addClass('activeButton');
    console.log("<?php echo strtolower(jddayofweek($jd,1)) ?>Block");
  } else {
    $(".day").css("display", "none");
    $(".dayBtn").removeClass('activeButton');
    $(".<?php echo $_setDay ?>").css("display", "block");
    $(".<?php echo $_setDay ?>Btn").addClass('activeButton');
    console.log("<?php echo strtolower(jddayofweek($jd,1)) ?>Block");
  }

  $("#book").click(function(evt) {
    pickedTime.text("BOOKED");
    $("#book-box").css("display", "none");
    // evt.preventDefault();
  })

  let countries = <?php echo json_encode($arr) ?>;
  console.log(countries);

  function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].userName.substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].userName.substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].userName.substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i].userName + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
}

autocomplete(document.getElementById("chalanged"), countries);

</script>
