<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once __DIR__ . "/models/Category.php";
require_once __DIR__ . "/models/Product.php";
require_once __DIR__ . "/models/Game.php";
require_once __DIR__ . "/models/Food.php";
require_once __DIR__ . "/models/Kennel.php";

$dogsCategory = new Category("Dogs");
$catsCategory = new Category("Cats", "fa-cat");
$productCategories = [$dogsCategory, $catsCategory];

$products = [
	new Product("Collare rosso", 12.99, true, 99, "https://picsum.photos/id/101/400/300/", $dogsCategory, 10),
	new Food("Crocchette 1kg", -9.19, true, 99, "https://picsum.photos/id/102/400/300/", $dogsCategory, 0, 300),
	new Game("Gomitolo di lana", 0, true, 99, "https://picsum.photos/id/103/400/300/", $catsCategory, 15, "giochi", "rosso"),
	new Kennel("Cuccia piccola", 40.15, true, 99, "https://picsum.photos/id/104/400/300/", $catsCategory, 40, "30x40x50 cm"),
	// new Food("Crocchette 2kg", 9.00, true, 99, "https://picsum.photos/id/108/400/300/", $catsCategory, 400),
	// new Game("Palla da tennis", 4.00, true, 99, "https://picsum.photos/id/106/400/300/", $dogsCategory, "sport", "verde"),
];

// $products[0]->setWeight(200, "g");
$products[1]->setWeight(1);
$products[3]->setWeight(808, "g");

$products[1]->setIsEdible(true);
$products[2]->setIsEdible(false);

// $products[1]->setDiscount(20);
// $products[2]->setDiscount(15);
// $products[3]->setDiscount(20);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP OOP Shop</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<h2>Categories</h2>
	<div class="categories">
		<?php foreach ($productCategories as $category) { ?>
			<div class="card category">
				<i class="fa-solid <?= $category->icon ?>"></i>
				<span><?= $category->name ?></span>
			</div>
		<?php } ?>
	</div>

	<h2>Prodotti</h2>
	<div class="products">
		<?php foreach ($products as $product) { ?>
			<div class="card product">
				<p>
					<i class="fa-solid <?= $product->category->icon ?>"></i>
					<?= $product->name ?>
				</p>

				<small>Price: <?php
				try {
					echo $product->getPrice();
				} catch (RangeException $e) {
					echo "Prezzo fuori range: " . $e->getMessage();
				} catch (Exception $e) {
					echo "Prezzo non disponibile: " . $e->getMessage();
				} 
				?></small>

				<p>Prodotto di tipo: <?= get_class($product) ?></p>
				<!-- <p>Prodotto di tipo: <?= $product->getClassName() ?></p> -->

				<img src="<?= $product->image ?>" alt="<?= $product->name ?>">

				<!-- alternativa: if( method_exists($product, "getCalories") ) { -->
				<p>
					<?php if($product instanceof Game){ ?>
						Color: <?= $product->getColor() ?><br>
						Genre: <?= $product->getGenre() ?>
					<?php } else if($product instanceof Food) { ?>
						Calories: <?= $product->getCalories() ?><br>
					<?php } ?>
				</p>
				
				<?php if( method_exists($product, "getIsEdible") ){ ?>
					<p>Edibile: <?= $product->getIsEdible() ?></p>
				<?php } ?>

				<?php if( method_exists($product, "getWeight")){ ?>
					<p>Peso: <?= $product->getWeight() ?></p>
				<?php } ?>

				<?php if( $product->getDiscount() > 0 ) { ?>
				<p>Sconto: <?= $product->getDiscount() ?> %</p>
				<?php } ?>

			</div>
		<?php } ?>
	</div>

</body>

</html>