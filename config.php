<?php
# config.php

define('THIS_PAGE', basename($_SERVER['PHP_SELF'])); // this defines the current file name

switch(THIS_PAGE) #set parameters for page (title, description, headings)
{
	case "index.php":
		$pageTitle="P2: Food Truck";
		$pageDescription="ITC250 second group project.";
		$pageID="Aunt Betty's Bisquet Truck";
		$pageBrand="Made with the freshest flour and lard";
		break;

	default: 
		$pageTitle = THIS_PAGE;
     	$pageID="By Default";
}

//Bisquet list
$bisquet[]= array("Che' Bisquet", "The one that everyone is talking about.",1.95);
$bisquet[]= array("Willie Bisquet", "This one will leave you better than stoned.",5.95);
$bisquet[]= array("True Grit Bisquet", "The one John Wayne made famous.",7.95);
$bisquet[]= array("Dolly Bisquet", "Double heap'ins of good lov'n deliciousness",8.88);
$bisquet[]= array("Sea Bisquet", "Enough to satisfy any horse.",9.99);

//Xtras list
define("GRAVY_PRICE",0.50);
define("JAM_PRICE",1.00);
