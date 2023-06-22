<?php 

class Product {

	public $name;
	private $price;
	public $is_available;
	public $quantity;
	public $image;
	public $category;

	public function __construct($name, $price, $is_available, $quantity, $image, Category $category)
	{
		$this->name = $name;
		$this->price = $price;
		$this->is_available = $is_available;
		$this->quantity = $quantity;
		$this->image = $image;
		$this->category = $category;
	}

	public function getClassName() {
		return get_class();
	}

	public function setPrice($value) {
		if($value>=0) {
			$this->price = $value;
		}
	}

	public function getPrice() {
		return $this->price . " €";
	}

}

?>