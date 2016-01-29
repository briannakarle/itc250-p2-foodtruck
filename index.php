<?php
//index.php
//a postback form

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
include 'MenuItem.php'; // for $MenuItemS
include 'functions.php';
// instantiate the menu objects 
// makeObject() ;

if(isset($_POST['submit'])) // check to see if this is a new presence or a submitted form
{// case = submitted form
showForm();
echo ' <pre>';
var_dump($_POST);
echo '<pre>';
}else{//case = new presence
 showForm();
echo ' <pre>';
var_dump($_POST);
echo '<pre>';
}
