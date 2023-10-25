<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $date = $_POST["date"];

        $timestamp = strtotime($date);
        $day = date("l", $timestamp);

        echo"<p>$date är en $day.</p>";

        if ($day == "Friday") {
            echo "<p>Det är fredag! Woohoo!</p>";
    } else {
        echo "<p>Det är inte fredag. Buhu!</p>";
    }
}
    ?>
    
</body>
</html>