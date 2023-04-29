<?php
   $query = "SELECT DISTINCT orderDay FROM orders";
   $result = $connection->query($query);
   echo "Provide the Day </br>";
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="Day" value = "';
        echo $row["orderDay"];
        echo '">' . $row["orderDay"] . "<br>";
       }

   $query = "SELECT DISTINCT orderMonth FROM orders";
   $result = $connection->query($query); 
   echo "Provide the Month </br>";
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="Month" value = "';
        echo $row["orderMonth"];
        echo '">' . $row["orderMonth"] . "<br>";
       }

    $query = "SELECT DISTINCT orderYear FROM orders";
    $result = $connection->query($query);
    echo "Provide the Year </br>";
    while ($row = $result->fetch()) {
        echo '<input type="radio" name="Year" value = "';
        echo $row["orderYear"];
        echo '">' . $row["orderYear"] . "<br>";
        }
?>