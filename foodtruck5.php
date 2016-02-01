 <?php
//postback1.php

//echo basename($_SERVER['PHP_SELF']);
//die;

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
//echo THIS_PAGE;
//die;

/*

' . THIS_PAGE . '


*/
include 'item.php';

$myItem[] = new Item('Willie Biscuit', 'This one will leave you better than stoned', 5.95, 0);
$myItem[] = new Item('True Grit Biscuit', 'The one that John Wayne made famous', 7.95, 0);
$myItem[] = new Item('Dolly Biscuit', 'Double heapins of good lovin food', 8.88, 0);
$myItem[] = new Item('Good, Bad, and Ugly', 'Poached egg, fried egg and scrabbled egg', 9.25, 0);

if(isset($_POST['submit']))
{//data submitted
   /* echo '<pre>';
    var_dump($_POST);
    var_dump($myItem);
    echo '</pre>';
    */
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
    <form action="" method="post">
         <table>
             <tr>
                 <th>QTY</th>
                 <th>Biscuit</th>
                 <th>Description</th>
                 <th>Price</th>
                 <th>Total</th>
             </tr>
             <tr>
    
';
    
$total = 0;

$max = sizeof($myItem);
    
for ($x = 0; $x < $max; $x++) {
                echo '<td>' .  $_POST["quantity" . (string)$x] . '</td>';
                      
                echo '<td> ' . $myItem[$x]->name . '</td>'; //item name
                echo ' <td> ' . $myItem[$x]->description . '</td>';  //item description
                echo '<td> ' . $myItem[$x]->price . '</td>';  //item price
                $subtotal = $subtotal + $myItem[$x]->price * $_POST["quantity" . (string)$x];
                $tax = $subtotal * .096;// * $_POST["quantity" . (string)$x];
                $total = $subtotal + $tax;
                setlocale(LC_MONETARY,"en_US");
                echo '<td> ' . $myItem[$x]->price * $_POST["quantity" . (string)$x] . '</td>' ;//price * quantity
                echo '</tr>';
                };
                echo '<tr>
                        <td colspan="3"></td>
                        ' . money_format("<td>Subtotal</td><td> %n", $subtotal) . '</td>
                    </tr>	
				    <tr>
                        <td colspan="3"></td>
                        ' . money_format("<td>Tax</td><td> %n", $tax) . '</td>
                    </tr>	
				    <tr>
                        <td colspan="3"></td>
                        ' . money_format("<td>Tax</td><td> %n", $total) . '</td>
                    </tr>	
				    <tr>
                        <td colspan="3"></td>
                        <td colspan="2"><input id="orderform" type = "submit" name = "order" value="Place your Order" /></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2"><input id="orderform" type = "submit" name = "menu" value="Adust Order" /></td>
                    </tr>';
                

    
}elseif (isset($_POST['order'])) {
    echo ' Thanks for your order!';
}



else{//show form
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
    <form action="" method="post">
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
                       value = $_POST[quantity' . (string)$x . ']>';
                      

                echo '<td> ' . $myItem[$x]->name . '</td>'; //item name
                echo ' <td> ' . $myItem[$x]->description . '</td>';  //item description
                echo '<td> ' . $myItem[$x]->price . '</td></tr>';  //item price
                /*echo '<td> ' . $myItem[$x]->price * $_POST["quantity" . (string)$x]  . '</td></tr>' ; //price * quantity */
                                }; 
     

      echo '</table>';
      echo '  <input id="orderform" type = "submit" name = "submit" value="Calculate Price" />
    </form>
</body>
</html>
'; //submit form
/* }; */
};

