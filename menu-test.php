<?php
//item-test.php

/*

This serves as a resource for our second Group project

We are going to create some classes that represent food items for a food truck

*/

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

/* each class should have its own file */
include 'item.php';

$myItem[] = new Item('Burrito', 'Includes awesome!', 7.95, 0);
$myItem[] = new Item('Taco', 'Includes guacamole!', 4.95, 0);
$myItem[] = new Item('Fried Ice Cream', 'Includes sprinkles', 3.95, 0);

echo '<pre>';
var_dump($myItem);
echo '</pre>';

echo '<body>';


echo '<h1>  The Biscuit Truck</h1>';
    
echo 'Quantity  Item Name       Desciption      Price </br>';

/* echo '<form action="order.php" method="post">'; */
echo '<form action="" method="m">';

$max = sizeof($myItem);

for ($x = 0; $x < $max; $x++) {
    
    print 'befor $_POST quantity' . $x ;
    
    $selected_val = $_POST['quantity' . $x];
    
    print 'selected value  ' . $selected_val;
    
if (isset($_POST["quantity1"])) {
    
    print ' selected_val  - ' . $selected_val;
      
      

    
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
     echo '<select id="quantity" . $x>
        <option $value="0">0</option>
        <option $value="1">1</option>
        <option $value="2">2</option>
    </select>' ;
}
 /*   echo '<script type="text/javascript">
var e = document.getElementById("quantity" + $x);
var numberUser = e.options[e.selectedIndex].value;
</script>'; */
    
    /* $myItem->quantity = document.getElementById("quantity" + $x).value; */
    
    echo 'name: ';
    print $myItem[$x]->name;
    echo ' description: ';
    print $myItem[$x]->description;
    echo 'price: ';
    print $myItem[$x]->price;
    echo 'quantity: '; 
    /* $myItem[$x]->quantity = $_POST['quantity' + $x]; */
    print '  xxquantityxx  ';
    print $myItem[$x]->quantity;                               
    echo ' current charge: ';
    print $myItem[$x]->quantity * $myItem[$x]->price;
  

 /*   $myITem[$x].description + "   ";
    $myItem[$x].price; */
    echo '</br>'; 
}

echo '<input type = "submit" name = "calculate pricer" value="calculate price" />'; 
echo '</form>';





echo '<script>
function change(){
    document.getElementById("orderform").submit();
}
</script>';
    

