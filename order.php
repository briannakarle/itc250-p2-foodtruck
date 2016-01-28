<?php
include 'item.php';
inculde 'menudata.php';


    echo '
  <html>
  <head>
    <title> Aunt Betty\'s Biscuit Truck</title>
    <meta charset="UTF-8">
    <style>
        table, th, td {
            border: 1px solid #ccc;
        }
        th {
            background: #ddd;
        }
    </style>
   </head>
<body>
    <h1>  Aunt Betty\'s Biscuit Truck</h1>
    <h2>Made with the freshest flour and lard</h2>
    <form action="order.php" method="post">
         <table>
             <tr>
                 <th>QTY</th>
                 <th>Biscuit</th>
                 <th>Description</th>
                 <th>Price</th>
             </tr>
             <tr>
    
<html>
 <body>'; 

$max = sizeof($myItem);
for ($x = 0; $x < $max; $x++) {
              echo '<td>
                       <input type="number" name="quantity'. (string)$x . '" min="0" max="5"
                       value = "0">
                      <!-- <select name="quantity' . (string)$x . '">
                            <option value="0" selected>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option></td>-->';

                echo '<td> ' . $myItem[$x]->name . '</td>'; //item name
                echo ' <td> ' . $myItem[$x]->description . '</td>';  //item description
                echo '<td> ' . $myItem[$x]->price . '</td>';  //item price
                echo '<td> ' . $myItem[$x]->price * $myItem[$x]->quantity . '</td>' ;//price * quantity
                echo '</tr>';
?>

 Quantity1 <?php echo $_POST["quantity1"]; ?><br>
 Your email address is: <?php echo $_POST["quantity2"]; ?>

 </body>
 </html> 