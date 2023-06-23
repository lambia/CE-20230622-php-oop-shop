<?php 

require_once __DIR__ . "/../traits/Edible.php";
require_once __DIR__ . "/../traits/Weightable.php";
require_once __DIR__ . "/Product.php";

class Food extends Product {

	use Edible;
	use Weightable;

	private $calories;

	public function __construct($name, $price, $is_available, $quantity, $image, Category $category, $discount, $calories)
	{
		parent::__construct($name, $price, $is_available, $quantity, $image, $category, $discount);
		$this->calories = $calories;
	}

	public function getCalories() {
		return $this->calories;
	}

	public function setCalories($value) {
		$this->calories = $value;
	}

	public function getClassName() {
		return get_class();
	}

}

?>