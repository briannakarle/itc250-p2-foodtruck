<?php
// functions.php

function makeObject() {
	$MenuItemS[] = new MenuItem('Willie Biscuit', 'This one will leave you better than stoned', 5.95, 0);
	$MenuItemS[] = new MenuItem('True Grit Biscuit', 'The one that John Wayne made famous', 7.95, 0);
	$MenuItemS[] = new MenuItem('Dolly Biscuit', 'Double heapins of good lovin food', 8.88, 0);	   
}

function showForm($MenuItemS) {
	echo '<h1>  Aunt Betty\'s Biscuit Truck</h1>
		<h2>Made with the freshest flour and lard</h2>
		<form action="' . THIS_PAGE . '" method="post">
			<table style="width:100%">
				<tr><th>QTY</th><th>Biscuit</th><th>Description</th><th>Price</th><th>Extras</th><th>Totals</th><tr>
		';
	
		$i=0;
		foreach( $MenuItemS as $key => $value){
            $cb1[$i]= "cb1".$i;
            $cb2[$i]= "cb2".$i;
            $qty[$i][0]= "qty".$i;
            $qty[$i][1]="0";
            //var_dump($value);
			echo '
			<tr><td><input type="number" name="' . $qty[$i][0] . '" min="0" max="99" value="' . $qty[$i][1] . '" /></td><td>'.$value->name.'</td><td>'.$value->description.'</td><td>'.$value->price.'</td><td><input type="checkbox" name="' . $cb1[$i] .'" value="' . $cb1[$i] .'"/>Gravy <input type="checkbox" name="' . $cb2[$i] .'" value="' . $cb2[$i] .'" />Jam </td><td>$menuTotal[]</td>
			';
            $i++;
		}
	
	

	echo '		<tr><td colspan="5"><td>TOTAL</td><td>' . $subTotal . '</td></tr>	
				<tr><td colspan="5"></td><td>TOTAL</td><td>' . $tax . '</td></tr>	
				<tr><td colspan="5"></td><td>TOTAL</td><td>' . $total . '</td></tr>	
				<tr><td colspan="4"></td><td colspan="2"><input type = "submit" name = "submit" value="Calculate Price" /></td></tr>
			</table>
		</form>
		';
	
}
