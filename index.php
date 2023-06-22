<?php

require __DIR__ . "/models/Category.php";
require __DIR__ . "/models/Product.php";
require __DIR__ . "/models/Game.php";
require __DIR__ . "/models/Food.php";

$dogsCategory = new Category("Dogs");
$catsCategory = new Category("Cats", "fa-cat");
$productCategories = [$dogsCategory, $catsCategory];

$products = [
	new Product("Collare rosso", 12.00, true, 99, "https://picsum.photos/id/101/400/300/", $dogsCategory),
	new Food("Crocchette 1kg", 9.00, true, 99, "https://picsum.photos/id/102/400/300/", $dogsCategory, 300),
	new Game("Gomitolo di lana", 4.00, true, 99, "https://picsum.photos/id/103/400/300/", $catsCategory, "giochi", "rosso"),
	// new Food("Crocchette 2kg", 9.00, true, 99, "https://picsum.photos/id/102/400/300/", $catsCategory, 400),
	// new Game("Palla da tennis", 4.00, true, 99, "https://picsum.photos/id/103/400/300/", $dogsCategory, "sport", "verde"),
];

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
				<small>Price: <?= $product->getPrice() ?></small>
				<p>Prodotto di tipo: <?= get_class($product) ?></p>
				<p>Prodotto di tipo: <?= $product->getClassName() ?></p>
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
			</div>
		<?php } ?>
	</div>

</body>

</html>