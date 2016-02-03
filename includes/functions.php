<?php
 // functions.php
 //display the menu form 


 function showForm($MenuItem) 
 { # show table headers of the form
 echo '
    <form action="' . THIS_PAGE . '" method="post">
        <table>
        <tr>        
            <th>Quantity</th>
            <th>Biscuit</th>
            <th>Description</th>
            <th>Price Each</th>
            <th>Extra Gravy</th>
            <th>Make it a Meal</th>
            <th>Totals</th>
        <tr>
 ';

 #MENU LIST - this part allows for a dynamic menu
 $i=0; #i is for iteration
    
 foreach($MenuItem as $key => $value)  #checkboxes
 { #create the arrays that represents quantity, xtrGravy, xtrMeal
 #$arr[0]=name [0]=value (number or state=checked/unchecked)
    $quantity[$i][0]= "quantity".$i;
    $xtrGravy[$i][0]= "xtrGravy".$i;
    $xtrMeal[$i][0]= "xtrMeal".$i;
     

 #Set values - here we have to differentiate between a first presence or a post back:
     
 if (isset($_POST['quantity'.$i])) 
 { #post back number of item
    $quantity[$i][1]=$_POST['quantity'.$i];
 }else{ #first presence
    $quantity[$i][1]=0;
 } #end of differentiation

 if (isset($_POST['xtrGravy'.$i])) 
 { #post back gravy checkbox
    $xtrGravy[$i][1]="checked";
    $xtrGravy[$i][2]=GRAVY_PRICE;
 }else{ #first presence
    $xtrGravy[$i][1]="";
    $xtrGravy[$i][2]=0;
 } #end of differentiation

 if (isset($_POST['xtrMeal'.$i])) 
 { #post back meal checkbox
    $xtrMeal[$i][1]="checked";
    $xtrMeal[$i][2]=MEAL_UPGRADE;
 }else{ #first presence
    $xtrMeal[$i][1]="";
    $xtrMeal[$i][2]=0;
 } #end of differenciation


 $menuTotal[$i]=$quantity[$i][1] * ($value->price + $xtrGravy[$i][2] + $xtrMeal[$i][2]); #total is quantity times the price plus gravy and meal charge
     
 echo '
    <tr>
        <td>
            <input type="number" name="' . $quantity[$i][0] . '" min="0" max="99" value="' . $quantity[$i][1] . '" /> 
        </td>
        <td>'. $value->name .'</td>
        <td>'.$value->description.'</td>
        <td class="right">'.$value->price.'</td>
        <td>
            <input type="checkbox" name="' . $xtrGravy[$i][0] . '" min="0" max="99" value=""' . $xtrGravy[$i][1] . ' />$0.50 each
        </td>
        <td>
            <input type="checkbox" name="' . $xtrMeal[$i][0] . '" min="0" max="99" value=""' . $xtrMeal[$i][1] . ' />$3.00 each
        </td>
        <td>' . money_format('%(#10n', $menuTotal[$i]) . '</td>
    </tr>
 ';

 $i++;
 }
 # for the extras we again have to differentiate between a postback and first presence
 $xtraTotal = 0.00;
     
 if (isset($_POST['cbGravy'])) 
 {#Gravy is checked
    $cbGravy = "checked";
    $xtraTotal += GRAVY_PRICE;
 }else{ #Gravy is empty
    $cbGravy ="";
 }
     
 if (isset($_POST['cbUpGrade'])) 
 {#Meal is checked
    $cbUpGrade = "checked";
    $xtraTotal += MEAL_UPGRADE;
 }else{ #meal is empty
    $cbUpGrade = "";
 }
 #end of differentiation

 #this part of the calculation is always the same
 $subTotal = Sum ($menuTotal)+ $xtraTotal;
 $tax = $subTotal * .1;
 $total = $subTotal + $tax;

 #the totals part - starting with the subtotal ending with the grand total.
 echo '
    <tr>
        <td colspan="5"></td>
        <td><b>SubTotal:</b></td>
        <td>' . money_format('%(#10n', $subTotal) . '</td>
    </tr> 
    <tr>
        <td colspan="5"></td>
        <td><b>Tax:</b></td>
        <td>' . money_format('%(#10n', $tax) . '</td>
    </tr>
 ';

 #SUBMIT BUTTONS set submit buttons according to type of submission
 if (isset($_POST['order'])) 
 {# buttons are hidden and thanks for order visible
    $visableSubmit = "hidden";
    $visableConfirm = "hidden";
    $visableThankYou = "<h3>Thanks for your order.</h3>";
 }elseif(isset($_POST['submit'])) 
 { #all buttons visible and thanks for order hidden
    $visableSubmit = "";
    $visableConfirm = "";
    $visableThankYou = "";
    $re = "Re-";
 }else{ #just submit button visible
    $visableSubmit = "";
    $visableConfirm = "hidden";
    $visableThankYou = "";
    $re = "";
 }

 echo '
    <tr>
        <td colspan="5"></td>
        <td><b>Total:</b></td>
        <td><b>' . money_format('%(#10n', $total) . '</b></td>
    </tr>
    <tr>
        <td colspan = "5">
        <input class="button" type = "submit" name = "order" value="Confirm Order" '    . $visableConfirm . ' />
        </td>
        <td colspan="2">
        <input class="button" type = "submit" name = "submit" value="' . $re . 'Calculate Price" ' . $visableSubmit . ' />' . $visableThankYou . '</td>
    </tr>
 </table>
 </form>
 ';
 }


 # returns the sum of elements in the array $values
 function sum($values)
 {
    $sum =0;
    foreach ($values as $value){
    $sum += $value;
    }
     
    return $sum;
 }

 # a utility function to test by showing values of variables using var_dump()
 function showVarDump($arg) {
 echo '<p>from showVarDump()</p>';
 echo ' <pre>';
 var_dump($arg);
 echo '<pre>'; 
 }