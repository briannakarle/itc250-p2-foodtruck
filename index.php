<?php
//index.php
/**
 * index.php has a form for ordering biscuits.   
 * 
 * The form has several available menu items, as well as add-ons.  First, the user 
 * will select what they want, and calculate the price.  It then posts back to itself
 * with the calculated total.  The user has the option to submit the order, or 
 * recalculate.  When the order is submitted, it posts back to the page with a thank 
 * you message, and an option to submit a new order.  If the user chooses to recalculate,
 * it starts over.   
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
 * @see 'includes/config.php'
 * @see 'includes/functions.php'
 * @see 'includes/header.php'
 * @see 'includes/footer.php'
 * @todo add google doc link
 */

include 'includes/config.php';    # set constants,  objects, and settings
include 'includes/functions.php'; # common functions 
include 'includes/header.php';

if (isset($_POST['order'])) {
	showThanks();
}else{
	showForm($Bisquet);
	}

include 'includes/footer.php';