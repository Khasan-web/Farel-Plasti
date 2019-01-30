<?php require "includes/cookie.php"?>
<!DOCTYPE html>
<html lang="<?= $activeLang?>">
<head>
	<?php require "includes/head.php";?>
    <?php 
        $cat = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `category_$activeLang` WHERE `id` = " . $_GET['category']));
        $title = $cat['name'];
    ?>
	<title><?= $title?> | Farel Plastic</title>
    <style>
        .indicators {
            display: none;
        }
    </style>
</head>

<body>
    <?php require "includes/navbar.php";?>

    <?php
        // get products
        $products = mysqli_query($con, "SELECT * FROM `product_" . $activeLang . "` WHERE `category_id` = " . $_GET['category']);

        $prodArr = array();
        while ($prodData = mysqli_fetch_assoc($products)) {
            $prodArr[] = $prodData;
        }
    ?>
    <?php
        // get category
        foreach ($catArr as $cat) {
            if ($cat['id'] == $_GET['category']) {
                $category = $cat;
            }
        }
    ?>

    <div class="slider">
		<ul class="slides center-align z-depth-1">
            <li class="">
				<div class="row">
					<div class="col l8 m12 p-0">
						<img src="img/home/slider/<?= $category['img']?>" alt="" class="slideImg">
					</div>
					<div class="col l4 m12 s12 content amber">
						<h3 class="white-text"><?= $category['name']?></h3>
						<p class="white-text"><?= $category['description']?></p>
						<a href="#products" class="btn rounded red waves-effect see-products"><?= $seeProd[$activeLang]?>!</a>
					</div>
				</div>
			</li>
			<img src="img/logo-white.svg" alt="" class="logo-white-brand">
		</ul>
    </div>
    
    <section id="products">
        <div class="container">
            <div class="row">
            <?php
                
                foreach ($prodArr as $product) {

                    ?>

                    <div class="col s12 l3 m4 product">
                        <a href="product.php?id=<?= $product['id']?>">
                            <div class="card z-depth-1 waves-effect">
                                <div class="p-5 cardImg pb-0 valign-wrapper">
                                    <img src="img/products/<?php $preview = explode(", ", $product['imgs']);echo $preview[0];?>
                                    " alt="" class="w-100">
                                </div>
                                <div class="card-content">
                                    <span class="card-title name mb-0">
                                        <?= $product['name'];?>
                                    </span>
                                    <p class="category"><?= $cat['name']?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                <?

                }

            ?>
            </div>
        </div>
    </section>

	<?php require "includes/footer.php"?>
</body>

</html>