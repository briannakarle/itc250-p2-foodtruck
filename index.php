<?php
//index.php
//a postback form

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
include 'MenuItem.php'; // for $MenuItemS
include 'functions.php';
// instantiate the menu objects 
	$MenuItemS[] = new MenuItem('Willie Biscuit', 'This one will leave you better than stoned', 5.95, 0);
	$MenuItemS[] = new MenuItem('True Grit Biscuit', 'The one that John Wayne made famous', 7.95, 0);
	$MenuItemS[] = new MenuItem('Dolly Biscuit', 'Double heapins of good lovin food', 8.88, 0);	   

if(isset($_POST['submit'])) // check to see if this is a new presence or a submitted form
{// case = submitted form

    showForm($MenuItemS);
echo ' <pre>';
var_dump($_POST);
echo '<pre>';
}else{//case = new presence

    showForm($MenuItemS);
echo ' <pre>';
var_dump($_POST);
echo '<pre>';
}
