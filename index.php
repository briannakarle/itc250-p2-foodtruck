<?php
//index.php
//a postback form

include 'config.php';    // base data
include 'MenuItem.php';  // class for $MenuItemS
include 'functions.php'; // functions used here

// instantiate the menu objects 
foreach ($bisquet as $key=>$value){
 $MenuItemS[]= new MenuItem($value[0], $value[1], $value[2]);
}

include 'header.php';
//showVarDump($_POST);
//die;
// display form 
showForm($MenuItemS);

include 'footer.php';
