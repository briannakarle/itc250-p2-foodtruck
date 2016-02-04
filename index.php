<?php
//index.php
/**
 * index.php has a form for ordering biscuits.  When the form is submitted, it posts back to itself.  
 * 
 *
 * @package LARGE_PIECE_OF_PROGRAM
 * @subpackage SUB_PART_OF_PROGRAM
 * @author Thomas Karchesy <tkarchesy@gmail.com>
 * @author Ed Brovick <ed@brovick.com>
 * @author Brianna Karle <briannarkarle@gmail.com>
 * @version 1.0 2016/02/02 
 * @link http://www.example.com/ 
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see related_file.php
 * @see other_related_file.php
 * @todo none
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