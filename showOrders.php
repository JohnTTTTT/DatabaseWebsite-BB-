<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Show Orders</title>
<link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1 class = "textCenter">Show Orders</h1>
<img class = "center" src = "order.jpg">
<ol class = "textCenter">
<?php
   $query = 'SELECT orderDay, orderMonth, orderYear, COUNT(*) as num_orders FROM orders GROUP BY orderDay, orderMonth, orderYear';
   $result = $connection->query($query);
   echo '<table>';
   echo '<tr><th>Date</th><th>Number of Orders</th></tr>';

   while ($row = $result->fetch()) {
        echo '<tr>';
        echo '<td>' . $row['orderYear'] . '-' . $row['orderMonth'] . '-' . $row['orderDay'] . '</td>';
        echo '<td>' . $row['num_orders'] . '</td>';
        echo '</tr>';
   }
   echo '</table>';
?>
<form class = "textCenter" action="restaurant.php" method="post">
<input type="submit" value="Return To Homepage">
</ol>
<?php
        $connection =- NULL;
    ?>
</body>
</html>