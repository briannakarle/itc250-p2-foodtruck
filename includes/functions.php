<?php
 /**
 * functions.php is the repository for all the functions used in the foodtruck application
 * 
 * Functions has the following functions in this file .
 *          showThanks();
 *          showForm($MenuItem);
 *          sum($values);
 *          showVarDump($arg);
 *          
 *
 * @package itc250_p2_foodtruck
 * @subpackage No subpackage
 * @author Thomas Karchesy tkarch01@seattlecentral.edu, 
 * @author Brianna Karle bkarle01@seattlecentral.edu, 
 * @author Ed Brovick ed@brovick.com
 * @version 1.0 2016/02/02 
 * @link App: http://briannakarle.com/itc250/itc250-p2-foodtruck/index.php 
 * @link Staging Area: https://docs.google.com/document/d/1UTRfRWKYdKOKimCZd1oRzVTSKSXVe4bN8KZIHfo9ksw/edit?usp=sharing
 * @link Github repo: https://github.com/briannakarle/itc250-p2-foodtruck
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see called my index.php
 *
 * @todo none
 */


/**
  * The showThanks function posts back a little "Thank you" and option to place another order
  *
  * This function occurs after an order is places.  the form disappears, and a section including 
  * only the thank you and place new order button appear.  When "Place a New Order" is clicked, 
  * the order form will re-appear.
  *
  *
  * @return "Thank You"
  */

function showThanks()
{
    echo '
    <section>
        <p class = "sez">Aunt Betty sez</h3>
        <p class = "thankyou">Thanks for your order!</h1>
        <form action="' . THIS_PAGE . '" method = "post"></h3>
            <input class="button" type= "submit" name = "reload" value = "Place a New Order" id="reload" />
        </form>
    </section>
	';
}



/**
  * The showForm function creates a dynamic form and calculates cost
  *
  * 1. Show table headers of the form
  * 2. Create dynamic menu
  *     a. Checkboxes- For each menu item, create the arrays that represents quantity, xtrGravy, xtrMeal
  *     b. Differentiate between a first presence or a post back.  
  *     c. Calculations 
  *         i. Total is quantity times the price plus gravy and meal charge
  *         ii. Subtotal is the total of the sum of the menu items plus the extras
  *         iii. Tax is subtotal multiplied by Seattle sales tax, which is 9.6%
  *         iv. Total is the subtotal plus the tax.
  *     d.  Show totals- default is $0.00 for all
  *     e.  Show buttons depending on button that is pressed
  *         i.  If "Order" button is pressed, hide "Submit" and "Confirm". Show " Thank you for your order" 
  *         ii.  If Submit/calculate order button is pressed, show all buttons and no "Thank you".
  *         iii.  Otherwise, just the submit button is visible
  *     f.  html for buttons
  *
  * @param array $MenuItem.  THis is an array with all the menu items that will show up on the menu list.   
  *   
  *
  * @return no return value, but delivers HTML for form based on the menu items in MenuItem structure.
  *
  * @todo No items identified at this time.
  */

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

     foreach($MenuItem as $key => $value){  #checkboxes
      #create the arrays that represents quantity, xtrGravy, xtrMeal
         #$arr[0]=name [0]=value (number or state=checked/unchecked)
            $quantity[$i][0]= "quantity".$i;
            $xtrGravy[$i][0]= "xtrGravy".$i;
            $xtrMeal[$i][0]= "xtrMeal".$i;


         #Set values - here we have to differentiate between a first presence or a post back:

         if (isset($_POST['quantity'.$i])) { #post back number of item
            $quantity[$i][1]=$_POST['quantity'.$i];
         } else { #first presence
            $quantity[$i][1]=0;
         } #end of differentiation

         if (isset($_POST['xtrGravy'.$i])) { #post back gravy checkbox
            $xtrGravy[$i][1]="checked";
            $xtrGravy[$i][2]=GRAVY_PRICE;
         } else { #first presence
            $xtrGravy[$i][1]="";
            $xtrGravy[$i][2]=0;
         } #end of differentiation

         if (isset($_POST['xtrMeal'.$i])) { #post back meal checkbox
            $xtrMeal[$i][1]="checked";
            $xtrMeal[$i][2]=MEAL_UPGRADE;
         } else { #first presence
            $xtrMeal[$i][1]="";
            $xtrMeal[$i][2]=0;
         } #end of differenciation


         $menuTotal[$i]=$quantity[$i][1] * ($value->price + $xtrGravy[$i][2] + $xtrMeal[$i][2]); #total is quantity times the price plus gravy and meal charge

         echo '
            <tr>
                <td>
                    <input type="number" name="' . $quantity[$i][0] . '" min="0" max="99" value="' . $quantity[$i][1] . '" /> 
                </td>
                <td>'.$value->name .'</td>
                <td>'.$value->description.'</td>
                <td>'.$value->price.'</td>
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

     if (isset($_POST['cbGravy'])) {#Gravy is checked
        $cbGravy = "checked";
        $xtraTotal += GRAVY_PRICE;
     } else { #Gravy is empty
        $cbGravy ="";
     }

     if (isset($_POST['cbUpGrade'])) {#Meal is checked
        $cbUpGrade = "checked";
        $xtraTotal += MEAL_UPGRADE;
     } else { #meal is empty
        $cbUpGrade = "";
     }
     #end of differentiation

     #this part of the calculation is always the same
     $subTotal = Sum ($menuTotal)+ $xtraTotal;
     $tax = $subTotal * .096;
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
        <tr>
            <td colspan = "5"></td>
            <td><b>Total:</b>
            <td><b>' . money_format('%(#10n', $total) . '</b></td>
        </tr>
     ';

     #SUBMIT BUTTONS set submit buttons according to type of submission
     if (isset($_POST['order'])) {# buttons are hidden and thanks for order visible
        $visibleSubmit = "hidden";
        $visibleConfirm = "hidden";
        $visibleThankYou = "<h3>Thanks for your order.</h3>";
     } elseif (isset($_POST['submit'])) { #all buttons visible and thanks for order hidden
        $visibleSubmit = "";
        $visibleConfirm = "";
        $visibleThankYou = "";
        $re = "Re-";
     } else { #just submit button visible
        $visibleSubmit = "";
        $visibleConfirm = "hidden";
        $visibleThankYou = "";
        $re = "";
     }

     echo '
            <tr>
                <td colspan = "7"><input class="button" type = "submit" name = "submit" value="' . $re . 'Calculate Price" ' . $visibleSubmit . ' /></td>
            </tr>
            <tr>
                <td colspan = "7"><input class="button" type = "submit" name = "order" value="Confirm Order" ' . $visibleConfirm . ' /></td>
            </tr>
        </table>
     </form>
     ';
 }


/**
  * The sum function adds all the values passed in teh $values array
  *
  *
  *
  * @return $sum (a total of all the values passed to sum)
  */

 function sum($values)
 {
    $sum =0;
    foreach ($values as $value) {
        $sum += $value;
    }
     
    return $sum;
 }


/**
  * The showVarDump is a utility function for testing, which shows values of variables using vardump
  *
  *
  *
  * @return does not really return anything, but delivers to output (in this case the HTML reader) the
  *     the values of all the arguments.
  */

 # a utility function to test by showing values of variables using var_dump()

 function showVarDump($arg) 
 {
     echo '<p>from showVarDump()</p>';
     echo '<pre>';
     var_dump($arg);
     echo '</pre>'; 
 }
