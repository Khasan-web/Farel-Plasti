<!DOCTYPE html>
<html lang="en">

<head>
	<?php require "includes/head.php";?>
	<!-- Get product -->
	<?php 
		$product = mysqli_query($con, "SELECT * FROM `product_" . $activeLang . "` WHERE `id` = " . $_GET['id']);
		$prod = mysqli_fetch_assoc($product);
	?>
	<!-- Similar products -->
	<?php
		$similarProducts = mysqli_query($con, "SELECT * FROM `product_" . $activeLang . "` WHERE `category_id` = " . $prod['category_id']);
		$prodArr = array();
		while ($prodData = mysqli_fetch_assoc($similarProducts)) {
			$prodArr[] = $prodData;
		}
	?>
	<!-- Categories -->
	<?php
	 	$category = mysqli_query($con, "SELECT * FROM `category_" . $activeLang . "` WHERE `id` = " . $prod['category_id']);
		$cat = mysqli_fetch_assoc($category);
	?>
	<title><?= $prod['name']?> | Farel Plastic</title>
</head>

<body>
	<?php require "includes/navbar.php";?>
		<?php
		
		if (!$product) {
			echo '<h1 class="not-found-title">Error 404</h1>';
		} else {
			?>
				<section id="product">
					<div class="bg"></div>
						<div class="container product">
							<div class="card z-depth-1">
								<div class="card-content">
									<div class="row">
										<div class="col l5 m10 s12 mx-auto main-img">
											<img src="img/products/<?php $preview = explode(", ", $prod['imgs']);echo $preview[0];?>" alt="" class="w-100-not-important materialboxed">
											<div class="row mt-5">
												<?php
													foreach ($preview as $img) {
														?>
															<div class="col s4 option">
																<img src="img/products/<?= $img?>" alt="" class="w-100">
															</div>
														<?
													}
												?>
											</div>
										</div>
										<div class="col l6 mt-5 offset-l1 m12 s12 info-product">
											<span class="card-title name"><?= $prod['name']?>
												<span class="category"><?= $ca?></span>
											</span>
											<div class="row">
												<div class="col l8 m10 s12">
													<p class="info"><?= $prod['description']?></p>
													<p class="price"><?= $prod['price']?> <?= $qu?></p>
												</div>
											</div>
											<a href="category.php?category=<?= $prod['category_id']?>" class="amber btn-flat white-text btn-small">See this category</a>
										</div>
									</div>
								</div>
							</div>
						</div>
				</section>
				<section id="similar-products">
					<div class="container">
						<h2 class="main-title">Similar Products</h2>
						<div class="underline red darken-2"></div>
						
							<!-- Show products -->
							<?php
							
							if (mysqli_num_rows($similarProducts)) {
								?>
									<div class="row mt-5 pt-5 center-align">
										<?php
											foreach ($prodArr as $product) {
												?>
												<div class="col s12 l3 m4 product">
													<a href="product.php?id=<?= $product['id']?>">
														<div class="card z-depth-1 waves-effect">
															<div class="p-5 cardImg pb-0 valign-wrapper">
															<img src="img/products/<?php $preview = explode(", ", $product['imgs']);echo $preview[0];?>" alt="" class="w-100">
															</div>
															<div class="card-content">
																<span class="card-title name mb-0">
																	<?= $product['name'];?>
																</span>
																<p class="category"><?= $cat['name'];?></p>
															</div>
														</div>
													</a>
												</div>
											<?
											}
										?>
									</div>
										<?
									} else {
										?>
											<h2 class="not-found-title">Товары не найдены...</h2>
										<?
									}
								?>

					</div>
				</section>
			<?
		}
		
		?>

	<?php require "includes/footer.php"?>
</body>

</html>