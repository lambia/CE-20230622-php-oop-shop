<?php 

class Food extends Product {

	private $calories;

	public function __construct($name, $price, $is_available, $quantity, $image, Category $category, $calories)
	{
		parent::__construct($name, $price, $is_available, $quantity, $image, $category);
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