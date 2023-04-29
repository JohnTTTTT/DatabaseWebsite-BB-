<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Customer</title>
<link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1 class = "textCenter"></h1>
<img class = "center" src = "dollar.png">
<ol class = "textCenter">
<?php
   $customerEmail= $_POST["customerEmail"];
   $firstName = $_POST["firstName"];
   $lastName = $_POST["lastName"];
   $cellNumber =$_POST["cellNumber"];
   $creditAmount = "5";
   $street =$_POST["street"];
   $city =$_POST["city"];
   $zip = $_POST["zip"];
   $managerRelationship = $_POST["managerRelationship"];
   $waiterRelationship = $_POST["waiterRelationship"];
   $chefRelationship = $_POST["chefRelationship"];
   $deliveryRelationship = $_POST["deliveryRelationship"];
   $query1 = 'INSERT INTO customerAccount values("' . $customerEmail . '","' . $firstName . '","' . $lastName . '","' . $cellNumber . '","' . $creditAmount . '","' . $street . '","' . $city . '","' . $zip .'","' . $managerRelationship . '","' . $waiterRelationship . '","' . $chefRelationship . '","' . $deliveryRelationship .'")';
   $query2 = 'SELECT customerEmail FROM customerAccount';
   $result1=$connection->query($query2);
   $a = 0;
   while ($row = $result1->fetch()) {
        if($row["customerEmail"] == $customerEmail)
            $a = 1;
   }
   if($a == 0){
        $result2=$connection->exec($query1);
        echo "Welcome new customer! Get ready for some delicious meals!";
   }
   else echo "There is already an account associated with that email";
?>
<form class = "textCenter" action="restaurant.php" method="post">
<input type="submit" value="Return To Homepage">
</ol>
<?php
        $connection =- NULL;
    ?>
</body>
</html>