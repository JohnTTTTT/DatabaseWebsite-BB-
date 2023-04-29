<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View Schedule</title>
    <link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<body>
<?php
include 'connectdb.php';
?>
    <h1 class = "textCenter">Employee Scheudle</h1>
    <img class = "center" src = "schedule.jpg">
    <?php
        include 'chooseEmployee.php';
    ?>
    <table border = "1" class = "textCenter">
    <?php
        $whichEmployee = $_POST["Employee"];
        $Employee = $_POST["Person"];
        $name_parts = explode(" ", $Employee);
        $first_name = $name_parts[0];
        $last_name = $name_parts[1];
        if($whichEmployee == "Manager"){
        $query = 'SELECT s.shiftDay as ShiftDay, s.shiftStart as ShiftStart, s.shiftEnd as ShiftEnd FROM shift s, manager m WHERE (s.managerID = m.managerID AND m.firstName = "'.$first_name.'" AND m.lastName = "'.$last_name.'")';
        }else if($whichEmployee == "Waiter"){
            $query = 'SELECT s.shiftDay as ShiftDay, s.shiftStart as ShiftStart, s.shiftEnd as ShiftEnd FROM shift s, waiter w WHERE (s.waiterID = w.waiterID AND w.firstName = "'.$first_name.'" AND w.lastName = "'.$last_name.'")';
        }else if($whichEmployee == "Chef"){
            $query = 'SELECT s.shiftDay as ShiftDay, s.shiftStart as ShiftStart, s.shiftEnd as ShiftEnd FROM shift s, chef c WHERE (s.chefID = c.chefID AND c.firstName = "'.$first_name.'" AND c.lastName = "'.$last_name.'")';
        }else if($whichEmployee == "Delivery"){
            $query = 'SELECT s.shiftDay as ShiftDay, s.shiftStart as ShiftStart, s.shiftEnd as ShiftEnd FROM shift s, delivery d WHERE (s.deliveryID = d.deliveryID AND d.firstName = "'.$first_name.'" AND d.lastName = "'.$last_name.'")';
        }
        $result=$connection->query($query);
        echo "<tr><td>"."ShiftDay"."</td><td>"."ShiftStart"."</td><td>"."ShiftEnd"."</td></tr>";
        while ($row=$result->fetch()) {
            echo "<tr><td>".$row["ShiftDay"]."</td><td>".$row["ShiftStart"]."</td><td>".$row["ShiftEnd"]."</td></tr>";
        }
        ?>
        </table>
        <form class = "textCenter" action="restaurant.php" method="post">
        <input type="submit" value="Return To Homepage">
        </form>
</body>
</html>
