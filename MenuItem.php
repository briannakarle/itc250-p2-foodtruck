<?php
//MenuItem.php
class MenuItem 
{
    
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    
    public function __construct($Name, $Description, $Price, $Quantity)
    {
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
    }
	
	public function getName() {
		return $Name;
		}
		
	public function setName($a) {
		$Name = $a;
	}
	public function getDescription() {
		return $Description;
		}
		
	public function setDescription($a) {
		$Description = $a;
	}
	public function getPrice() {
		return $Price;
		}
		
	public function setPrice($a) {
		$Price = $a;
	}

}
