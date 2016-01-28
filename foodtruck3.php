<?php
//postback1.php

//echo basename($_SERVER['PHP_SELF']);
//die;

//define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
//echo THIS_PAGE;
//die;

/*

' . THIS_PAGE . '


*/
include 'item.php';

$myItem[] = new Item('Willie Biscuit', 'This one will leave you better than stoned', 5.95, 0);
$myItem[] = new Item('True Grit Biscuit', 'The one that John Wayne made famous', 7.95, 0);
$myItem[] = new Item('Dolly Biscuit', 'Double heapins of good lovin food', 8.88, 0);

if(isset($_POST['submit']))
{//data submitted
    echo '<pre>';
    var_dump($_POST);
    var_dump($myItem);
    echo '</pre>';
}else{//show form
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
             <tr>';
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
                $myItem[$x]->quantity = 3;
                print $myItem[$x]->quantity;
}
     

    echo '
            <tr> 
                <td colspan="3">Current charge:</td>
                <td>$' . $myItem[$x]->quantity * $myItem[$x]->price . '</td>
            </tr>
        </table>';
      echo '  <input id="orderform" type = "submit" name = "submit" value="Calculate Price" />
    </form>
</body>
</html>
'; //submit form
/* }; */
};

