<?php
//MenuItem.php
class MenuItem 
{
    
    public $name = '';
    public $description = '';
    public $price = 0;
    
    public function __construct($name, $description, $price, $quantity)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
	
	public function getName() {
		return $name;
		}
		
	public function setName($a) {
		$name = $a;
	}
	public function getDescription() {
		return $description;
		}
		
	public function setDescription($a) {
		$description = $a;
	}
	public function getPrice() {
		return $price;
		}
		
	public function setPrice($a) {
		$price = $a;
	}
	
}
