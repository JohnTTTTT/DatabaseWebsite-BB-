<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View Orders</title>
    <link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<body>
<?php
include 'connectdb.php';
?>
    <h1 class = "textCenter">Order History</h1>
    <img class = "center" src = "delivery.jpg">
    <table border = "1" class = "textCenter">
    <?php
        $whichDay= $_POST["Day"];
        $whichMonth= $_POST["Month"];
        $whichYear= $_POST["Year"];
        $query = 'SELECT c.firstName as CustomerFName, c.lastName as CustomerLName, o.foodName as foodName, o.totalPrice as totalPrice, o.tip as tip, d.firstName as DeliveryFName, d.lastName as DeliveryLName FROM orders o, customerAccount c, deliveryEmployee d WHERE o.orderDay = "'. $whichDay .'" AND o.orderMonth = "'. $whichMonth .'" AND o.orderYear = "'. $whichYear .'" AND o.deliveryID = d.deliveryID AND o.customerEmail = c.customerEmail';
        $result=$connection->query($query);
        echo "<tr><td>"."CustomerFName"."</td><td>"."CustomerLName"."</td><td>"."foodName"."</td><td>"."totalPrice"."</td><td>"."tip"."</td><td>"."DeliveryFName"."</td><td>"."DeliveryLName"."</td></tr>";
        while ($row=$result->fetch()) {
            echo "<tr><td>".$row["CustomerFName"]."</td><td>".$row["CustomerLName"]."</td><td>".$row["foodName"]."</td><td>".$row["totalPrice"]."</td><td>".$row["tip"]."</td><td>".$row["DeliveryFName"]."</td><td>".$row["DeliveryLName"]."</td></tr>";
        }
        ?>
        </table>
        <form class = "textCenter" action="restaurant.php" method="post">
        <input type="submit" value="Return To Homepage">
        </form>
</body>
</html>
