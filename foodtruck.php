<?php
//item-test.php
/*
This serves as a resource for our second Group project
We are going to create some classes that represent food items for a food truck
*/
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
/* each class should have its own file */
include 'item.php';
$myItem[] = new Item('Willie Biscuit', 'This one will leave you better than stoned', 5.95, 0);
$myItem[] = new Item('True Grit Biscuit', 'The one that John Wayne made famous', 7.95, 0);
$myItem[] = new Item('Dolly Biscuit', 'Double heapins of good lovin food', 8.88, 0);

if(isset($_POST['submit']))
{
echo '<pre>';
var_dump($myItem);
echo '</pre>';
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
    ';
    
/*echo 'Quantity  Item Name       Desciption      Price </br>';*/
/* echo '<form action="order.php" method="post">'; */
echo '
     <form action="' . THIS_PAGE . '" method="post">
         <table>
             <tr>
                 <th>QTY</th>
                 <th>Biscuit</th>
                 <th>Description</th>
                 <th>Price</th>
             </tr>
     
     ';
$max = sizeof($myItem);
for ($x = 0; $x < $max; $x++) {
    
    echo $x;//before $_POST quantity
    
    $selected_val = $_POST[$quantity . $x];
    
    echo $selected_val; //selected value
    
if (isset($_POST[$quantity])) {
    
    echo $selected_val;
      
if(isset($_POST['submit']))
{//data submitted
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
}else{//show form
   echo '
   <form method="post" action="' . THIS_PAGE . '">
       Number 1: <input type="text" name="number1" /><br />
       Number 2: <input type="text" name="number2" /><br />
       <input type="submit" name="submit" value="Submit it!" />
   </form>
   ';
}   
    
     if ($selected_val = 0) {
            echo '<select id="quantity" . $x>
                <option $value="0" selected>0</option>
                <option $value="1">1</option>
                <option $value="2">2</option>';
        };
        if ($selected_val = 1) {
            echo '<select id="quantity" . $x>
            <option $value="0">0</option>
            <option $value="1" selected>1</option>
            <option $value="2">2</option>';
        };
        if ($selected_val = 2) {
               echo '<select id="quantity" . $x>
                   <option $value="0">0</option>
                <option $value="1">1</option>
                <option $value="2" selected>2</option>';
        }  ;
} else {
     echo '
     <tr>
         <td>
             <select id="quantity" . $x>
                <option $value="0">0</option>
                <option $value="1">1</option>
                <option $value="2">2</option>
            </select>
        </td>
        
     ';
}
 /*   echo '<script type="text/javascript">
var e = document.getElementById("quantity" + $x);
var numberUser = e.options[e.selectedIndex].value;
</script>'; */
    
    /* $myItem->quantity = document.getElementById("quantity" + $x).value; */
    /*echo '<tr>';*/
    /*echo '<td>' . $myItem[$x]->quantity . '</td>'; //quantity*/
    echo '<td> ' . $myItem[$x]->name . '</td>'; //item name
    echo ' <td> ' . $myItem[$x]->description . '</td>';  //item description
    echo '<td> ' . $myItem[$x]->price . '</td>';  //item price
    /* $myItem[$x]->quantity = $_POST['quantity' + $x]; */
    /*print '  xxquantityxx  ';
    print $myItem[$x]->quantity;*/                              
  
 /*   $myITem[$x].description + "   ";
    $myItem[$x].price; */
    echo '</br>'; 
    echo '</tr>';
}
echo '
            <tr> 
                <td colspan="3">Current charge:</td>
                <td>$' . $myItem[$x]->quantity * $myItem[$x]->price . '</td>
            </tr>
        </table>
        <input id="orderform" type = "submit" name = "submit" value="Calculate Price" />
    </form>
</body>
</html>
'; //submit form
echo '<script>
function change(){
    document.getElementById("orderform").submit();
}
</script>';
    
