<?php
//item.php
class Item 
{
    
    public $name = '';
    public $description = '';
    public $price = 0;
    public $quantity = 0;
    
    public function __construct($name, $description, $price, $quantity)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
    
    }
}