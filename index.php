<?php
//index.php
//a postback form

include 'config.php';    # set constants,  objects, and settings
include 'functions.php'; # common functions 
include 'header.php';
if (isset($_POST['order'])) {
	showThanks();
}else{
	showForm($Bisquet);
	}
include 'footer.php';
