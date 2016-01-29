<?php
//postback1.php

//echo basename($_SERVER['PHP_SELF']);
//die;

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
//echo THIS_PAGE;
//die;

//include 'item.php';
include 'MenuItem.php';
include 'functions.php';

$myItem[] = new MenuItem('Willie Biscuit', 'This one will leave you better than stoned', 5.95, 0, 0);
$myItem[] = new MenuItem('True Grit Biscuit', 'The one that John Wayne made famous', 7.95, 0);
$myItem[] = new MenuItem('Dolly Biscuit', 'Double heapins of good lovin food', 8.88, 0);

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
    <form action="' . THIS_PAGE . '" method="post">
         <table>
             <tr>
                 <th>QTY</th>
                 <th>Biscuit</th>
                 <th>Description</th>
                 <th>Price</th>
                 <th>Extras (.25cents Each)
                 <th>Item Total</th>
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

                echo '<td> ' . $myItem[$x]->Name . '</td>'; //item name
                echo '<td> ' . $myItem[$x]->Description . '</td>';  //item description
                echo '<td> ' . $myItem[$x]->Price . '</td>';  //item price
                echo ' 
                      <td>
                         <input type="checkbox" name="cb11" />Gravy 
                         <input type="checkbox" name="cb12" />Jam 
                      </td>
                ';
                echo '<td> ' . /*$myItem[$x]->Price * $myItem[$x]->Quantity*/$ItemTotal . '</td>' ;//price * quantity
                
    //$ItemTotal = $myItem[$x]->Price * $myItem[$x]->Quantity;
                echo '</tr>';
                $myItem[$x]->Quantity = 3;
                print $myItem[$x]->Quantity;
}
     

                echo '
                    <tr> 
                        <td colspan="5">Current charge:</td>
                        <td>$' . $myItem[$x]->Quantity * $myItem[$x]->Price . '</td>
                    </tr>';
                echo '
                     <tr>
                         <td colspan="5">Subtotal</td>
                         <td>' . $subTotal . '</td>
                     </tr>	
				     <tr>
                         <td colspan="5">Tax</td>
                         <td>' . $tax . '</td>
                     </tr>	
				     <tr>
                         <td colspan="5">Total</td>
                         <td>' . $total . '</td>
                     </tr>
                     ';
                echo '</table>';
                echo '  <input id="orderform" type = "submit" name = "submit" value="Calculate Price" />
            </form>
        </body>
        </html>
'; //submit form
/* }; */
};

