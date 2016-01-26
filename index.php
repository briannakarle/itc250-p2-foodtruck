<?php
//index.php

include config.php;
include functions.php;
include header.php;

//Aunt Betty's Bisquet Truck

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));
       
if (isset($_POST['submit'])) {//data submitted
   
   //process data and show form again.
   
}else{//show form
   
   //show virgin form
   
}

include footer.php;
