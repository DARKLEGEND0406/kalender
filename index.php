<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="kontroll.php" type="text/php">
  <title>kalender</title>
</head>
<body>




  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <label for="date">Ange ett datum:</label>
    <input type="date" id="date" name="date" required>
    <input type="submit" value="Kontrollera">

  </form>


  <?php

  function print_calendar($month, $year) {

    $months = array("Januari", "Februari", "Mars", "April", "Maj", "Juni", "Juli", "Augusti", "September", "Oktober", "November", "December");
    $weekdays = array("Måndag", "Tisdag", "Onsdag", "Torsdag", "Fredag", "Lördag", "Söndag");

    $num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $first_day = date("N", mktime(0, 0, 0, $month, 1, $year));


    echo "<table border='1'>";
    echo "<caption>" . $months[$month - 1] . " " . $year . "</caption>";


    echo "<tr>";
    echo "<th>Vecka</th>";
    foreach ($weekdays as $weekday) {
      echo "<th>" . $weekday . "</th>";
    }
    echo "</tr>";

    $current_day = 1;


    while ($current_day <= $num_days) {

      echo "<tr>";

      $week_number = date("W", mktime(0, 0, 0, $month, $current_day, $year));
      echo "<td>" . $week_number . "</td>";


      for ($i = 1; $i <= 7; $i++) {
        
        if (($current_day == 1 && $i < $first_day) || ($current_day > $num_days)) {
          echo "<td></td>";
        }

        else {
          if ($i == 7) {
            echo "<td style='color: red;'>" . $current_day . "</td>";
          }
          else {
            echo "<td>" . $current_day . "</td>";
          }

          $current_day++;
        }
      }

      echo "</tr>";
    }

    echo "</table>";
  }


  if (isset($_GET["date"])) {
    $date = $_GET["date"];
  }
  else {
    $date = date("Y-m-d");
  }

  $year = date("Y", strtotime($date));
  $month = date("m", strtotime($date));

  echo "<h1>Vald datum: " . $date . "</h1>";

  print_calendar($month, $year);

  $prev_month = date("Y-m-d", strtotime("-1 month", strtotime($date)));
  $next_month = date("Y-m-d", strtotime("+1 month", strtotime($date)));

  echo "<a href='?date=" . $prev_month . "'>Föregående månad</a> | ";
  echo "<a href='?date=" . $next_month . "'>Nästa månad</a>";
  ?>

  




</body>
</html>