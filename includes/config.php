<?php
# config.php

//identify the page
define('THIS_PAGE', basename($_SERVER['PHP_SELF'])); // this defines the current file name

//settings
setlocale(LC_MONETARY, 'en_US'); #for use in formatting the decmal points for money

//instantiate the Bisquet objects 
include 'includes/MenuItem.php';  // class for $MenuItemS
$Bisquet[]= new MenuItem("Che' Bisquet", "The one that everyone is talking about.",1.95);
$Bisquet[]= new MenuItem("Willie Bisquet", "This one will leave you better than stoned.",5.95);
$Bisquet[]= new MenuItem("True Grit Bisquet", "The one John Wayne made famous.",7.95);
$Bisquet[]= new MenuItem("Dolly Bisquet", "Double heap'ins of good lov'n deliciousness",8.88);
$Bisquet[]= new MenuItem("Sea Bisquet", "Enough to satisfy any horse.",9.99);

//Constants
define("GRAVY_PRICE",0.50);
define("MEAL_UPGRADE",3.00);

//set parameters for page (title, description, headings)
//I expect this project will expand like the retro project did last quarter.
switch(THIS_PAGE) 
{
	case "index.php":
		$pageTitle="P2: Food Truck";
		$pageDescription="ITC250 second group project.";
		break;

	default: 
		$pageTitle = THIS_PAGE;
     	$pageID="By Default";
}


