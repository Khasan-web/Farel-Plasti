<?php require "includes/cookie.php"?>
<!DOCTYPE html>
<html lang="<?= $activeLang?>">
<?php $title = $home[$activeLang]?>
<head>
	<?php require "includes/head.php";?>
	<title><?= $title?> | Farel Plastic</title>
</head>

<body>
	<?php require "includes/navbar.php";?>

	<!-- get popular products -->
	<?php
		$products = mysqli_query($con, "SELECT * FROM `product_" . $activeLang . "` WHERE `hit` = '1'");
		$prodArr = array();
		while ($prodData = mysqli_fetch_assoc($products)) {
			$prodArr[] = $prodData;
		}
	?>
	<!-- get categories -->
    <?php
        $categories = mysqli_query($con, "SELECT * FROM `category_" . $activeLang . "`");
		$catArr = array();
		while ($catsData = mysqli_fetch_assoc($categories)) {
			$catArr[] = $catsData;
		}
    ?>

	<div class="slider">
		<ul class="slides center-align z-depth-1">
			<li class="">
				<div class="row">
					<div class="col l8 m12 p-0">
						<img src="img/home/slider/slide2.jpg" alt="" class="slideImg">
					</div>
					<div class="col l4 m12 s12 content amber">
						<h3 class="white-text"><?= $welcome[$activeLang]?></h3>
						<p class="white-text">
							<?= $welcomeInfo[$activeLang]?>
						</p>
						<a href="#about" class="btn rounded red waves-effect"><?= $getMore[$activeLang]?></a>
					</div>
				</div>
			</li>
			<li class="">
				<div class="row">
					<div class="col l8 m12 p-0">
						<img src="img/home/slider/slide1.jpg" alt="" class="slideImg">
					</div>
					<div class="col l4 m12 s12 content red">
						<h3 class="white-text">Full list of all products!</h3>
						<p class="white-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, accusantium laudantium. Cumque</p>
						<a href="#cat" class="btn rounded amber waves-effect"><?= $getMore[$activeLang]?></a>
					</div>
				</div>
			</li>
			<li class="">
				<div class="row">
					<div class="col l8 m12 p-0">
						<img src="img/home/slider/slide3.jpg" alt="" class="slideImg">
					</div>
					<div class="col l4 m12 s12 content indigo">
					<h3 class="white-text">15 years at the market!</h3>
						<p class="white-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, accusantium laudantium. Cumque</p>
						<p class="white-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						<a href="/about" class="btn rounded red waves-effect"><?= $getMore[$activeLang]?></a>
					</div>
				</div>
			</li>
			<img src="img/logo-white.svg" alt="" class="logo-white-brand">
		</ul>
	</div>

	<section id="about">
		<div class="container">
			<div class="row">
				<div class="col s12 l4 m6">
					<div class="card amber z-depth-1 white-text darken-1">
						<div class="card-content">
							<i class="material-icons amber-text">add</i>
							<span class="card-title">
								<?= $aboutCardTitle1[$activeLang]?>
							</span>
							<p><?= $aboutCard1[$activeLang]?></p>
						</div>
					</div>
				</div>
				<div class="col s12 l4 m6">
					<div class="card red z-depth-1 white-text darken-2">
						<div class="card-content">
							<i class="material-icons red-text">thumb_up_alt</i>
							<span class="card-title">
								<?= $aboutCardTitle2[$activeLang]?>
							</span>
							<p><?= $aboutCard2[$activeLang]?></p>
						</div>
					</div>
				</div>
				<div class="col s12 l4 m6 mx-auto">
					<div class="card amber z-depth-1 white-text darken-1">
						<div class="card-content">
							<i class="material-icons amber-text">layers</i>
							<span class="card-title">
								<?= $aboutCardTitle3[$activeLang]?>
							</span>
							<p><?php echo $aboutCard3[$activeLang];?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="cat" class="pt-5">
		<div class="container">
			<h2 class="main-title pt-5"><?= $catsTitle[$activeLang]?></h2>
			<div class="underline red darken-2 mb-5"></div>
			<?php
			$i = 0;
				foreach ($catArr as $cat) {
					$i++;
					if ($i % 3 == 0 || $i == 1) {
						?>
							<div class="row">
						<?
					}
					?>
						<div class="col s12 m4 category">
							<div class="card z-depth-1 wow fadeInDown">
								<div class="p-5">
									<img src="img/home/categories/<?= $cat['illustration']?>" alt="" class="w-100">
								</div>
								<a href="category.php?category=<?= $cat['id']?>" class="btn-floating halfway-fab waves-effect waves-light red btn-large">
									<i class="material-icons">add</i>
								</a>
								<div class="card-content">
									<span class="card-title"><?= $cat['name']?></span>
									<p><?= mb_substr($cat['description'], 0, 60, 'utf-8')?>...</p>
								</div>
							</div>
						</div>
					<?
					if ($i == 3) {
						?>
							</div>
						<?
					}
				}
			?>

			</div>
		</div>
	</section>

	<section id="features-items" class="mt-5">
		<div class="container">
			<h2 class="main-title"><?= $popProdTitle[$activeLang]?></h2>
			<div class="underline red darken-2 mb-5 center-align"></div>

			<!-- Show products -->
			<?php
            
			if (mysqli_num_rows($products)) {
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
												<p class="category">
												<?php
													foreach ($catArr as $cat) {
														if ($cat['id'] == $product['category_id']) {
															echo $cat['name'];
														}
													}
												?>
												</p>
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
		</div>
	</section>

	<section id="partners" class="mt-5">
		<div class="container">
			<h2 class="main-title"><?= $partnersTitle[$activeLang]?></h2>
			<div class="underline red darken-2"></div>
			<div class="row my-5">
				<div class="col s6 m3">
					<div class="card z-depth-1 wow fadeInDown">
						<div class="p-5">
							<img src="img/logo.png" alt="" class="w-100">
						</div>
						<div class="card-content center-align">
							<span class="card-title">Partner Name</span>
						</div>
					</div>
				</div>
				<div class="col s6 m3">
					<div class="card z-depth-1 wow fadeInDown">
						<div class="p-5">
							<img src="img/logo.png" alt="" class="w-100">
						</div>
						<div class="card-content center-align">
							<span class="card-title">Partner Name</span>
						</div>
					</div>
				</div>
				<div class="col s6 m3">
					<div class="card z-depth-1 wow fadeInDown">
						<div class="p-5">
							<img src="img/logo.png" alt="" class="w-100">
						</div>
						<div class="card-content center-align">
							<span class="card-title">Partner Name</span>
						</div>
					</div>
				</div>
				<div class="col s6 m3">
					<div class="card z-depth-1 wow fadeInDown">
						<div class="p-5">
							<img src="img/logo.png" alt="" class="w-100">
						</div>
						<div class="card-content center-align">
							<span class="card-title">Partner Name</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php require "includes/footer.php"?>
</body>

</html>