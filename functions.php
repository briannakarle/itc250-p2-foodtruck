<?php
//functions.php
	
function MakeMenuTable($arr)
{
	$myReturn = '';
	foreach($arr as $item => $label) #go through each item in the menu array
	{
		$myReturn .= '<tr><td><input type="number" name="quantity" min="0" max="99" value=' . $label->Quanity . '></td><td>' . $label->Name . '</td><td>' . $label->Description . '</td><td>' . $label->Price . '</td><td><input type="checkbox" name="gravy" value="1.00">Gravy $1 <input type="checkbox" name="jam" value="0.50">Aunt Betty\'s Jam $.50</td><td>itemTotal</td></tr>';
	}
	return $myReturn;
}
