<?php require "includes/cookie.php"?>
<!DOCTYPE html>
<html lang="<?= $activeLang?>">

<head>
	<?php require "includes/head.php";?>
	<?php 
		// get product
		$product = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product_$activeLang` WHERE `id` = " . $_GET['id']));
	?>
	<?php
		// similar products
		$similarProducts = mysqli_query($con, "SELECT * FROM `product_" . $activeLang . "` WHERE `category_id` = " . $product['category_id']);
		$prodArr = array();
		while ($prodData = mysqli_fetch_assoc($similarProducts)) {
			$prodArr[] = $prodData;
		}
	?>
	<!-- Categories -->
	<?php
	 	$category = mysqli_query($con, "SELECT * FROM `category_" . $activeLang . "` WHERE `id` = " . $product['category_id']);
		$cat = mysqli_fetch_assoc($category);
	?>
	<title><?= $product['name']?> | Farel Plastic</title>
	<?php $title = $product['name']?>
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
						<div class="container product main">
							<div class="row">
								<div class="col l6 m8 s12 offset-m2 info-img">
									<div class="card z-depth-1">
										<div class="card-content">
											<img src="img/products/<?php $preview = explode(", ", $product['imgs']);echo $preview[0];?>" alt="" class="w-100-not-important materialboxed">
											<?php
											if ($preview[1] != false) {
												?>
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
												<?
											}
											?>
										</div>
									</div>
								</div>
								<div class="col l6 m8 s12 offset-m2 info-card">
									<div class="card">
										<div class="card-content">
											<div class="info-product">
												<span class="card-title name"><?= $product['name']?> <br>
												<span class="category"><?= $cat['name']?></span>
												</span>
												<div class="row">
													<div class="col l8 m10 s12">
														<p class="info"><?= $product['description']?></p>
													</div>
												</div>
												<a href="category.php?category=<?= $product['category_id']?>" class="amber btn-flat white-text btn-small"><?= $seeThisCat[$activeLang]?></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				</section>
				<section id="similar-products" class="pt-5">
					<div class="container">
						<h2 class="main-title"><?= $similarProd[$activeLang]?></h2>
						<div class="underline red darken-2"></div>
						
							<!-- Show products -->
							<?php
							
							if (mysqli_num_rows($similarProducts)) {
								?>
									<div class="row mt-5 pt-5 center-align">
										<?php
										$i = 0;
											foreach ($similarProducts as $product) {
												if ($i == 4) {
													break;
												}
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
											$i++;
											}
										?>
									</div>
									<div class="center-align mb-5">
										<a href="category?category=<?= $product['category_id']?>" class="btn btn-flat btn-floating btn-large blue-grey lighten-5 waves-effect"><i class="material-icons black-text">add</i></a>
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