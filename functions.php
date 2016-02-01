<?php
// functions.php

//display the menu form 
function showForm($MenuItem)
{
    #the table header
    echo '<form action="' . THIS_PAGE . '" method="post">
          <table style="width:100%">
          <tr><th class="left">Quantity</th><th class="left">Biscuit</th><th class="left">Description</th><th class="right">Price Each</th><th>Extra Gravy</th><th>Meal-Size-It</th><th class="right">Totals</th><tr>
    ';
        
    #MENU LIST - this part allows for a dyamic menu
		$i=0;  #i is for itteration
		foreach($MenuItem as $key => $value){
            #create the arrays that represents quantity, xtrGravy, xtrMeal
            #$arr[0]=name [0]=value (number or state=checked/unchecked)
            $quantity[$i][0]= "quantity".$i;
            $xtrGravy[$i][0]= "xtrGravy".$i;
            $xtrMeal[$i][0]= "xtrMeal".$i;
            
            #Set values - here we have to differenciate between a first presence or a post back:
            if (isset($_POST['quantity'.$i])) { #post back 
                $quantity[$i][1]=$_POST['quantity'.$i];
            }else{ #first presence
                $quantity[$i][1]=0;
            } #end of differenciation
            
            if (isset($_POST['xtrGravy'.$i])) { #post back 
                $xtrGravy[$i][1]="checked";
                $xtrGravy[$i][2]=GRAVY_PRICE;
            }else{ #first presence
                $xtrGravy[$i][1]="";
                $xtrGravy[$i][2]=0;
            } #end of differenciation
            
            if (isset($_POST['xtrMeal'.$i])) { #post back 
                $xtrMeal[$i][1]="checked";
                $xtrMeal[$i][2]=MEAL_UPGRADE;
            }else{ #first presence
                $xtrMeal[$i][1]="";
                $xtrMeal[$i][2]=0;
           } #end of differenciation
            
            
           $menuTotal[$i]=$quantity[$i][1] * ($value->price + $xtrGravy[$i][2] + $xtrMeal[$i][2]);
           echo '
                <tr>
                <td><input type="number" name="' . $quantity[$i][0] . '" min="0" max="99" value="' . $quantity[$i][1] . '" /></td>
                <td>'. $value->name .'</td>
                <td>'.$value->description.'</td>
                <td class="right">'.$value->price.'</td>
                <td><input type="checkbox" name="' . $xtrGravy[$i][0] . '" min="0" max="99" value=""' . $xtrGravy[$i][1] . ' />$0.50 each</td>
                <td><input type="checkbox" name="' . $xtrMeal[$i][0] . '" min="0" max="99" value=""' . $xtrMeal[$i][1] . ' />$3.00 each</td>
                <td class="right">' . money_format('%(#10n', $menuTotal[$i]) . '</td>
                </tr>
                ';
 
            $i++;
		}

    # for the extras we again have to differentiate between a postback and first presence

    $xtraTotal = 0.00;
    if (isset($_POST['cbGravy'])) {
        $cbGravy = "checked";
        $xtraTotal += GRAVY_PRICE;
    }else{
        $cbGravy ="";
    }
    if (isset($_POST['cbUpGrade'])) {
        $cbUpGrade = "checked";
        $xtraTotal += MEAL_UPGRADE;
    }else{
        $cbUpGrade = "";
    }
    #end of differentiation
    
     #this part of the calculation is always the same
    $subTotal = Sum ($menuTotal)+ $xtraTotal;
    $tax = $subTotal * .1;
    $total = $subTotal + $tax;

    #the totals part - starting with the subtotal ending with the grand total.
	echo '<tr><td colspan="5"></td><td class="right topline"><b>SubTotal:</b></td><td class="right topline">' . money_format('%(#10n', $subTotal)  . '</td></tr>	
	<tr><td colspan="5"></td><td class="right bottomline"><b>Tax:</b></td><td class="right bottomline">' . money_format('%(#10n', $tax) . '</td></tr>
    ';
    
    #SUBMIT BUTTONS set submit buttons according to type of submission
    if (isset($_POST['order'])) {
        // buttons are hidden and thanks for order visible
        $visableSubmit = "hidden";
        $visableConfirm = "hidden";
        $visableThankYou = "<h3>Thanks for your order.</h3>";
    }elseif(isset($_POST['submit'])) {
        // all buttons visible and thanks for order hidden
        $visableSubmit = "";
        $visableConfirm = "";
        $visableThankYou = "";
        $re = "Re-";
    }else {
        // just submit button visible
        $visableSubmit = "";
        $visableConfirm = "hidden";
        $visableThankYou = "";
        $re = "";
    }
    
    echo '
	<tr><td></td><td colspan = "2"><input class="submit" type = "submit" name = "order" value="Confirm Order" ' . $visableConfirm . ' /></td><td><input class="submit" type = "submit" name = "submit" value="' . $re . 'Calculate Price" ' . $visableSubmit . ' />' . $visableThankYou . '</td><td></td><td  class="right doublebottomline"><b>Total:</b><td class="right doublebottomline"><b>' . money_format('%(#10n', $total) . '</b></td></tr>
	</table>
	</form>
	';
}

// returns the sum of elements in the array $values
function sum($values)
{
    $sum =0;
    foreach ($values as $value){
        $sum += $value;
    }
    return $sum;
}

// a utility function to test by showing values of variables using var_dump()
function showVarDump($arg) {
    echo '<p>from showVarDump()</p>';
    echo ' <pre>';
    var_dump($arg);
    echo '<pre>';  
}
