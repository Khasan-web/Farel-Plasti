<?php require "includes/cookie.php"?>
<!DOCTYPE html>
<html lang="<?= $_GET['lang']?>">

<head>
	<?php require "includes/head.php";?>
	<title>Home | Farel Plastic</title>
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
					<div class="col l8 m12 hide-on-small-and-down">
						<img class="wow slideInLeft" src="img/home/slider/salat.jpg" alt="">
					</div>
					<div class="col l4 m12 s12 content amber">
						<h2 class="white-text">Welcome on farelplastic.uz!</h2>
						<p class="white-text">
							<?= $indexCard1?>
						</p>
						<p class="white-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit, amet consectetur adipisicing elit.
							Velit nostrum saepe amet, cum ipsa voluptas!</p>
						<p class="white-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						<button class="btn rounded red waves-effect">Get more!</button>
					</div>
				</div>
			</li>
			<li class="">
				<div class="row">
					<div class="col m8 hide-on-small-and-down">
						<img class="wow slideInLeft" src="img/home/slider/salat.jpg" alt="">
					</div>
					<div class="col m4 content red">
						<h2 class="white-text">Full list of all products!</h2>
						<p class="white-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, accusantium laudantium. Cumque</p>
						<p class="white-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						<button class="btn rounded amber waves-effect">Get more!</button>
					</div>
				</div>
			</li>
			<li class="">
				<div class="row">
					<div class="col m8 hide-on-small-and-down">
						<img class="wow slideInLeft" src="img/home/slider/salat.jpg" alt="">
					</div>
					<div class="col m4 content indigo darken-4">
						<h2 class="white-text">15 years at the market!</h2>
						<p class="white-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, accusantium laudantium. Cumque</p>
						<p class="white-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						<button class="btn rounded red waves-effect">Get more!</button>
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
								<?= $homeCardTitle1?>
							</span>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
						</div>
					</div>
				</div>
				<div class="col s12 l4 m6">
					<div class="card red z-depth-1 white-text darken-2">
						<div class="card-content">
							<i class="material-icons red-text">thumb_up_alt</i>
							<span class="card-title">
								<?= $homeCardTitle2?>
							</span>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
						</div>
					</div>
				</div>
				<div class="col s12 l4 m6 mx-auto">
					<div class="card amber z-depth-1 white-text darken-1">
						<div class="card-content">
							<i class="material-icons amber-text">layers</i>
							<span class="card-title">
								<?= $homeCardTitle3?>
							</span>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="categories" class="mt-5">
		<div class="container">
			<h2 class="main-title">Categories</h2>
			<div class="underline red darken-2"></div>
			<div class="row mt-5 pt-5">

			<?php
				foreach ($catArr as $cat) {
					?>
						<div class="col s12 m4 category">
							<div class="card z-depth-1 wow fadeInDown">
								<div class="p-5">
									<img src="img/home/categories/<?= $cat['illustration']?>" alt="" class="w-100">
								</div>
								<a href="category.php?category=<?= $cat['id']?>&lang=<?= $activeLang;?>" class="btn-floating halfway-fab waves-effect waves-light red btn-large">
									<i class="material-icons">add</i>
								</a>
								<div class="card-content">
									<span class="card-title"><?= $cat['name']?></span>
									<p><?= mb_substr($cat['description'], 0, 60, 'utf-8')?>...</p>
								</div>
							</div>
						</div>
					<?
				}
			?>

			</div>
		</div>
	</section>

	<section id="features-items" class="mt-5">
		<div class="container">
			<h2 class="main-title">Popular products</h2>
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
			<h2 class="main-title">Our Partners</h2>
			<div class="underline red darken-2"></div>



		</div>
	</section>

	<?php require "includes/footer.php"?>
</body>

</html>