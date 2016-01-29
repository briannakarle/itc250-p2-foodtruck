<?php
// functions.php

function makeObject() {
	$MenuItemS[] = new Item('Willie Biscuit', 'This one will leave you better than stoned', 5.95, 0);
	$MenuItemS[] = new Item('True Grit Biscuit', 'The one that John Wayne made famous', 7.95, 0);
	$MenuItemS[] = new Item('Dolly Biscuit', 'Double heapins of good lovin food', 8.88, 0);		
}

function showForm() {
	echo '<h1>  Aunt Betty\'s Biscuit Truck</h1>
		<h2>Made with the freshest flour and lard</h2>
		<form action="' . THIS_PAGE . '" method="post">
			<table style="width:100%">
				<tr><th>QTY</th><th>Biscuit</th><th>Description</th><th>Price</th><th>Extras</th><th>Totals</th><tr>
		';
	
	echo '<tr><td><input type="number" name="qty1" min="0" max="99" value="' . $qty1Value .'" /></td><td>' . $menuItem[0].Name .'</td><td>'. $menuItemS[0].Description . '"</td><td>' . $menuItemS[0].Price . '</td><td><input type="checkbox" name="cb11" />Gravy <input type="checkbox" name="cb12" />Jam </td><td>' . $menuTotal1 . '</td><tr>
	
	<tr><td><input type="number" name="qty2" min="0" max="99" value="' . $qty2Value .'" /></td><td>' . $menuItem[1].Name . '</td><td>'. $menuItemS[1].Description . '"</td><td>' . $menuItemS[1].Price . '</td><td><input type="checkbox" name="cb21" />Gravy <input type="checkbox" name="cb22" />Jam </td><td>' . $menuTotal1 . '</td><tr>
	
	<tr><td><input type="number" name="qty3" min="0" max="99" value="' . $qty3Value .'" /></td><td>' .$menuItem[2].Name . '</td><td>'. $menuItemS[2].Description . '"</td><td>' . $menuItemS[2].Price . '</td><td><input type="checkbox" name="cb31" />Gravy <input type="checkbox" name="cb32" />Jam </td><td>' . $menuTotal1 . '</td><tr>
	';
	
		
/*		foreach($menuItem in $MenuItem$){
			echo '
			<tr><td><input type="number" name="' . qtyName[] . '" min="0" max="99" value="' . quantity[] . '" /></td><td>$menuItem.Name</td><td>$menuItem.Description</td><td>$menuItem.Price</td><td><input type="checkbox" name="" />Gravy <input type="checkbox" name="" />Jam </td><td>$menuTotal[]</td>
			';
		}
*/	
	

	echo '		<tr><td colspan="4"><td>TOTAL</td><td>' . $subTotal . '</td></tr>	
				<tr><td colspan="4"></td><td>TOTAL</td><td>' . $tax . '</td></tr>	
				<tr><td colspan="4"></td><td>TOTAL</td><td>' . $total . '</td></tr>	
				<tr><td colspan="4"></td><td colspan="2"><input type = "submit" name = "submit" value="Calculate Price" /></td></tr>
			</table>
		</form>
		';
	
}
