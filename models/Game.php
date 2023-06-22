<?php 

class Game extends Product {

	private $genre;
	private $color;

	public function __construct($name, $price, $is_available, $quantity, $image, Category $category, $genre, $color)
	{
		parent::__construct($name, $price, $is_available, $quantity, $image, $category);
		$this->genre = $genre;
		$this->color = $color;
	}

	public function getColor() {
		return $this->color;
	}

	public function setColor($value) {
		$this->color = $value;
	}

	public function getGenre() {
		return $this->genre;
	}

	public function setGenre($value) {
		$this->genre = $value;
	}
	
	public function getClassName() {
		return get_class();
	}

}

?>