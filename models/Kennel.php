<?php 

require_once __DIR__ . "/Product.php";
require_once __DIR__ . "/../traits/Weightable.php";

class Kennel extends Product {

	use Weightable;

	private $size;

	public function __construct($name, $price, $is_available, $quantity, $image, Category $category, $discount, $size)
	{
		parent::__construct($name, $price, $is_available, $quantity, $image, $category, $discount);
		$this->size = $size;
	}

	public function getSize() {
		return $this->size;
	}

	public function setSize($value) {
		$this->size = $value;
	}

	public function getClassName() {
		return get_class();
	}

}

?>