<?php

//MenuItem.php
/**
*
*MenuItem class
*
* The MenuItem class holds the objects that go into the menu.  The constructor creates an array into which 
* the menu attributes will be loaded.  
*
*<code>
* $Biscuit[]= new MenuItem("Che' Biscuit", "The one that everyone is talking about.",1.95);
*include 'includes/MenuItem.php'; 
*function showForm($MenuItem) 
*</code>
*
* @package menu_item
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
* @todo add google doc link
*/

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
