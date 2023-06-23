<?php 

require_once __DIR__ . "/../traits/Weightable.php";
require_once __DIR__ . "/Category.php";

class Product {

	public $name;
	private $price;
	public $is_available;
	public $quantity;
	public $image;
	public $category;
	public $discount;

	public function __construct($name, $price, $is_available, $quantity, $image, Category $category, $discount)
	{
		$this->name = $name;
		$this->price = $price;
		$this->is_available = $is_available;
		$this->quantity = $quantity;
		$this->image = $image;
		$this->category = $category;
		$this->discount = $discount;
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

		if( is_null($this->price) || !is_numeric($this->price) ) {
			throw new Exception("valore non numerico");
		}

		if($this->price < 0) {
			throw new RangeException("prezzo negativo");
		} else if($this->price==0) {
			throw new RangeException("prezzo zero");
		}

		return $this->price . " €";
	}

	public function getDiscount() {
		return $this->discount;
	}

	public function setDiscount($value) {
		$this->discount = $value;
	}

}

?>