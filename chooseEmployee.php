<?php
    echo "Choose an employee:</br>";
    $query = "SELECT DISTINCT firstName, lastName FROM manager";
    $result = $connection->query($query);
    echo "Managers:</br>";
    while ($row = $result->fetch()) {
        $value = $row["firstName"] . "-" . $row["lastName"];
        echo '<input type="radio" name="Person" value="' . $value . '">' . $row["firstName"] . " " . $row["lastName"] . "</br>";
    }

    $query = "SELECT DISTINCT firstName, lastName FROM waiter";
    $result = $connection->query($query);
    echo "Waiters:</br>";
    while ($row = $result->fetch()) {
        $value = $row["firstName"] . "-" . $row["lastName"];
        echo '<input type="radio" name="Person" value="' . $value . '">' . $row["firstName"] . " " . $row["lastName"] . "</br>";
    }

    $query = "SELECT DISTINCT firstName, lastName FROM chef";
    $result = $connection->query($query);
    echo "Chefs:</br>";
    while ($row = $result->fetch()) {
        $value = $row["firstName"] . "-" . $row["lastName"];
        echo '<input type="radio" name="Person" value="' . $value . '">' . $row["firstName"] . " " . $row["lastName"] . "</br>";
    }

    $query = "SELECT DISTINCT firstName, lastName FROM deliveryemployee";
    $result = $connection->query($query);
    echo "Delivery Persons:</br>";
    while ($row = $result->fetch()) {
        $value = $row["firstName"] . "-" . $row["lastName"];
        echo '<input type="radio" name="Person" value="' . $value . '">' . $row["firstName"] . " " . $row["lastName"] . "</br>";
    }
?>