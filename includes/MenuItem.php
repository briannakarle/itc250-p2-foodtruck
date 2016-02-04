<?php
/**
*MenuItem.php
*
*MenuItem class
*
* The MenuItem class holds the objects that go into the menu.  The constructor creates an array into which 
* the menu attributes will be loaded.  
*
*<code>
* $Bisquet[]= new Item("Che' Bisquet", "The one that everyone is talking about.",1.95);
INCLUDE 
*</code>
*
* @todo none
*/

//Item.php
class MenuItem 
{
    public $name = '';
    public $description = '';
    public $price = 0;
    
    public function __construct($name, $description, $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
	
}
