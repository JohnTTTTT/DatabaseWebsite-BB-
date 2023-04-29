<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Breaking Bad Food!</title>
    <link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<body>
<?php
include 'connectdb.php';
?>
    <h1 class = "textCenter">Restaurants of Kingston</h1>
    <img class = "center" src="chef.jpg">
    <h2 class = "textCenter">View Orders</h2>
    <form class = "textCenter" action = "viewOrders.php" method = "post">
    <?php
        include 'getOrders.php';
    ?>
    <input class = "textCenter" type = "submit" value = "View Orders">
    </form>
    <p>
    <hr>
    <p>
    <h2 class = "textCenter"> Add New Customer:</h2>
    <form class = "textCenter" action = "addCustomer.php" method = "post">
    <div class = "textCenter">
    Email: <input type="text" name="customerEmail"><br>
    First Name: <input type="text" name="firstName"><br>
    Last Name: <input type="text" name="lastName"><br>
    Cell Number: <input type="text" name="cellNumber"><br>
    Street: <input type="text" name="street"><br>
    City: <input type="text" name="city"><br>
    Zip: <input type="text" name="zip"><br>
    What is your relationship with the manager? <input type="text" name="managerRelationship"><br>
    What is your relationship with the waiter? <input type="text" name="waiterRelationship"><br>
    What is your relationship with the chef? <input type="text" name="chefRelationship"><br>
    What is your relationship with the delivery person? <input type="text" name="deliveryRelationship"><br>
    </div>
    <input class = "textCenter" type="submit" value="Add New Customer">
    </form>
    <p>
    <hr>
    <p>
    <h2 class = "textCenter">Show Orders:</h2>
    <form class = "textCenter" action = "showOrders.php" method = "post">
    <input class = "textCenter" type="submit" value="Display Orders">
    </form>
    <p>
    <hr>
    <p>
    <h2 class = "textCenter">Show Employee Schedules:</h2>
    <form class = "textCenter" action = "viewSchedule.php" method = "post">
    <div class = "textCenter">
    Manager<input type="radio" name="Employee" value = "Manager"><br>
    Waiter<input type="radio" name="Employee" value = "Waiter"><br>
    Chef<input type="radio" name="Employee" value = "Chef"><br>
    Delivery<input type="radio" name="Delivery" value = "Delivery"><br>
    </div>
    <input class = "textCenter" type="submit" value="Submit">
    </form>
    <p>
    <hr>
    <p>
    <?php
        $connection =- NULL;
    ?>
</body>
</html>