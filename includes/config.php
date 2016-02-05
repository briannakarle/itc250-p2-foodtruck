<?php
// config.php
/**
 * config.php contains settings that will be applied to entire app   
 * 
 *The config file
 *  1.  Defines current file name
 *  2.  Format monetary type
 *  3.  Insantiate biscuit objects for the MenuItem class
 *  4.  Define constants
 *       a.  Gravy
 *       b.  Meal
 *   5.  Create a switch, just in case additional pages are added later
 *       a.  Create a dynamic title
 *       b.  Create a dynamic description
 *
 * @package itc250_p2_foodtruck
 * @author Thomas Karchesy <tkarchesy@gmail.com>
 * @author Ed Brovick <ed@brovick.com>
 * @author Brianna Karle <briannarkarle@gmail.com>
 * @version 1.0 2016/02/02 
 * @link App: http://briannakarle.com/itc250/itc250-p2-foodtruck/index.php 
 * @link Staging Area: https://docs.google.com/document/d/1UTRfRWKYdKOKimCZd1oRzVTSKSXVe4bN8KZIHfo9ksw/edit?usp=sharing
 * @link Github repo: https://github.com/briannakarle/itc250-p2-foodtruck
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see 'index.php'
 * @see 'includes/MenuItem.php'
 * @todo add google doc link
 */

//identify the page
define('THIS_PAGE', basename($_SERVER['PHP_SELF'])); // this defines the current file name

//settings
setlocale(LC_MONETARY, 'en_US'); #for use in formatting the decimal points for money

//instantiate the Biscuit objects 
include 'includes/MenuItem.php';  // class for $MenuItems
$Biscuit[]= new MenuItem("Che' Biscuit", "The one that everyone is talking about.", 1.95);
$Biscuit[]= new MenuItem("Willie Biscuit", "This one will leave you better than stoned.", 5.95);
$Biscuit[]= new MenuItem("True Grit Biscuit", "The one John Wayne made famous.", 7.95);
$Biscuit[]= new MenuItem("Dolly Biscuit", "Double heap'ins of good lov'n deliciousness", 8.88);
$Biscuit[]= new MenuItem("Sea Biscuit", "Enough to satisfy any horse.", 9.99);

//Constants
define("GRAVY_PRICE",0.50);
define("MEAL_UPGRADE",3.00);

//set parameters for page (title, description, headings)
//I expect this project will expand like the retro project did last quarter.
switch(THIS_PAGE) {
	case "index.php":
		$pageTitle="P2: Food Truck";
		$pageDescription="ITC250 second group project.";
		break;

	default: 
		$pageTitle = THIS_PAGE;
     	$pageID="By Default";
}
