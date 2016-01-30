<?php
// functions.php

function showForm($MenuItemS) { #display the <form
    #the table header
    echo '<form action="' . THIS_PAGE . '" method="post">
          <table style="width:100%">
          <tr><th class="left">Quantity</th><th class="left">Biscuit</th><th class="left">Description</th><th class="right">Price</th><th class="right">Totals</th><tr>
    ';
    #the menu items - this part allows for a dyamic menu
		$i=0;
		foreach( $MenuItemS as $key => $value){
            $qty[$i][0]= "qty".$i;
            #calculations - here we have to differenciate between a first presence or a post back:
            if (isset($_POST['qty'.$i])) {
                $qty[$i][1]=$_POST['qty'.$i];
            }else{
                $qty[$i][1]=0;
            } #end of differenciation
           $menuTotal[$i]=$qty[$i][1] * $value->price;
           echo '
                <tr><td><input type="number" name="' . $qty[$i][0] . '" min="0" max="99" value="' . $qty[$i][1] . '" /></td><td>'. $value->name .'</td><td>'.$value->description.'</td><td class="right">'.$value->price.'</td><td class="right">' . $menuTotal[$i] . '</td>
                ';
 
            $i++;
		}

    # for the extras we again have to differenciate between a postback and first presence

    $xtraTotal = 0.00;
    if (isset($_POST['cbGravy'])) {
        $cbGravy = "checked";
        $xtraTotal += GRAVY_PRICE;
    }else{
        $cbGravy ="";
    }
    if (isset($_POST['cbJam'])) {
        $cbJam = "checked";
        $xtraTotal += JAM_PRICE;
    }else{
        $cbJam = "";
    }
    #end of differenciation

    #the extras part - offering gravy and jam
	echo '<tr><td></td><td><b>Extras</b></td><td><input type="checkbox" name="cbGravy" value="' . $cbGravyPrice .'" ' . $cbGravy . ' />Gravy ($.50) <input type="checkbox" name="cbJam" value="'. $cbJamPrice . '" ' .$cbJam .'/>Jam ($1.00)</td><td><td class="right">' . $xtraTotal . '</td></tr>
    ';
    
     #this part of the calculation is always the same
    $subTotal = Sum ($menuTotal)+ $xtraTotal;
    $tax = $subTotal * .1;
    $total = $subTotal + $tax;
    
    #the totals part - starting with the subtotal ending with the grand total.
	echo '<tr><td colspan="3"></td><td class="right topline"><b>SubTotal:</b></td><td class="right topline">' . $subTotal . '</td></tr>	
	<tr><td colspan="3"></td><td class="right bottomline"><b>Tax:</b></td><td class="right bottomline">' . $tax . '</td></tr>	
	<tr><td colspan = "2"><input type = "submit" name = "submit" value="Calculate Price" /></td><td></td><td  class="right doublebottomline"><b>Total:</b><td class="right doublebottomline"><b>' . $total . '</b></td></tr>
	</table>
	</form>
	';
}

function sum($values)
{
    $sum =0;
    foreach ($values as $value){
        $sum += $value;
    }
    return $sum;
}

function showVarDump($arg) {
    echo '<p>from showVarDump()</p>';
    echo ' <pre>';
    var_dump($arg);
    echo '<pre>';  
}
