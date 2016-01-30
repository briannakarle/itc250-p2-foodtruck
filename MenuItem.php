<?php
//MenuItem.php
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
