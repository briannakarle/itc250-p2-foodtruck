<?php

// this defines the current file name
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

switch(THIS_PAGE)
{
	case "index.php":
		$title="P2: Food Truck";
		$pageID="Aunt Betty's Bisquet Truck";
		break;

	default: 
		$title = THIS_PAGE;
     	$pageID="By Default";
}

//Dynamic Nav Links
function MakeLinks($arr, $prefix='', $suffix ='', $exception='')
{
	$myReturn = '';
	foreach($arr as $link => $label)
	{
		if(THIS_PAGE==$link)
		{
			$myReturn .= $exception . '<a href="' . $link . '">' . $label . '</a>'.$suffix;
				
		}else{
			$myReturn .= $prefix . '<a href="' . $link . '">' . $label . '</a>' . $suffix;
				
		}
	}
	return $myReturn;
}

//Navagation Array-one of what may become many
$nav1['index.php']="Home";
$nav1['daily.php']="Daily Dialog";
$nav1['contact.php']="Contact";
$nav1['survey.php']="Survey";
$nav1['coinlist.php']="Coins";

/*
should be able to modify the following to make the menu:

Creates links inside the header.php file

<li><a href="LINK">LABEL</a></li>

<li class="active"><a href="LINK">LABEL</a></li>
*/
function makeLinks($arr,$prefix='',$suffix='',$exception='')
{
    $myReturn = '';
    foreach($arr as $link => $label)
    {
        if(THIS_PAGE == $link)
        {//current file gets active class
           $myReturn .= $exception . '<a href="' . $link . '">' . $label . '</a>' . $suffix;
        }else{
          $myReturn .= $prefix . '<a href="' . $link . '">' . $label . '</a>' . $suffix;

        }
    }

    return $myReturn;
}//end makeLinks() 

?>