<?php


define('THIS_PAGE', basename($_SERVER['PHP_SELF'])); // this defines the current file name

switch(THIS_PAGE) #set parameters for page (title, description, headings)
{
	case "index.php":
		$pageTitle="P2: Food Truck";
		$pageDescriptio="ITC250 second group project.";
		$pageID="Aunt Betty's Bisquet Truck";
		$pageBrand="Made with the freshest flour and lard.";
		break;

	default: 
		$pageTitle = THIS_PAGE;
     	$pageID="By Default";
}


//MenuItem Array-food menu
$menu1[]= "";
