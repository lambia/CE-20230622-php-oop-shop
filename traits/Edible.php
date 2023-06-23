<?php 

trait Edible {
	private $isEdible;

	public function getIsEdible() {
		return $this->isEdible ? "YES" : "NO";
	}

	public function setIsEdible($isEdible) {
		$this->isEdible = $isEdible ? true : false;
	}
}

?>