<!DOCTYPE html>
<html lang="<?= $_GET['lang']?>">

<head>
	<?php require "includes/head.php";?>
	<title>Home | Farel Plastic</title>
</head>

<body>
	<?php require "includes/navbar.php";?>

	<div class="slider">
		<ul class="slides center-align z-depth-1">
			<li class="">
				<div class="row">
					<div class="col l8 m12 hide-on-small-and-down">
						<img class="wow slideInLeft" src="img/home/slider/salat.jpg" alt="">
					</div>
					<div class="col l4 m12 s12 content amber">
						<h2 class="white-text">Test</h2>
						<p class="white-text"><?= $indexCard1?></p>
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
						<h2 class="white-text">Test 2</h2>
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
						<h2 class="white-text">Test 3</h2>
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
							<span class="card-title"><?= $homeCardTitle1?></span>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.  </p>
						</div>
					</div>
				</div>
				<div class="col s12 l4 m6">
					<div class="card red z-depth-1 white-text darken-2">
						<div class="card-content">
							<i class="material-icons red-text">thumb_up_alt</i>
							<span class="card-title"><?= $homeCardTitle2?></span>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.  </p>
						</div>
					</div>
				</div>
				<div class="col s12 l4 m6 mx-auto">
					<div class="card amber z-depth-1 white-text darken-1">
						<div class="card-content">
							<i class="material-icons amber-text">layers</i>
							<span class="card-title"><?= $homeCardTitle3?></span>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.  </p>
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

				<div class="col s12 m4 category">
					<div class="card z-depth-1 wow fadeInDown">
						<div class="p-5">
							<img src="img/home/categories/illustration-01.svg" alt="" class="w-100">
						</div>
						<a class="btn-floating halfway-fab waves-effect waves-light red btn-large">
							<i class="material-icons">add</i>
						</a>
						<div class="card-content">
							<span class="card-title">Card Title</span>
							<p>I am a very simple card. I am convenient because I require little markup to use effectively.</p>
						</div>
					</div>
				</div>

				<div class="col s12 m4 category">
					<div class="card z-depth-1 wow fadeInDown">
						<div class="p-5">
							<img src="img/home/categories/illustration-02.svg" alt="" class="w-100">
						</div>
						<a class="btn-floating halfway-fab waves-effect waves-light red btn-large">
							<i class="material-icons">add</i>
						</a>
						<div class="card-content">
							<span class="card-title">Card Title</span>
							<p>I am a very simple card. I am convenient because I require little markup to use effectively.</p>
						</div>
					</div>
				</div>

				<div class="col s12 m4 category">
					<div class="card z-depth-1 wow fadeInDown">
						<div class="p-5">
							<img src="img/home/categories/illustration-03.svg" alt="" class="w-100">
						</div>
						<a class="btn-floating halfway-fab waves-effect waves-light red btn-large">
							<i class="material-icons">add</i>
						</a>
						<div class="card-content">
							<span class="card-title">Card Title</span>
							<p>I am a very simple card. I am convenient because I require little markup to use effectively.</p>
						</div>
					</div>
				</div>

				<div class="col s12 m4 category">
					<div class="card z-depth-1 wow fadeInDown">
						<div class="p-5">
							<img src="img/home/categories/illustration-04.svg" alt="" class="w-100">
						</div>
						<a class="btn-floating halfway-fab waves-effect waves-light red btn-large">
							<i class="material-icons">add</i>
						</a>
						<div class="card-content">
							<span class="card-title">Card Title</span>
							<p>I am a very simple card. I am convenient because I require little markup to use effectively.</p>
						</div>
					</div>
				</div>

				<div class="col s12 m4 category">
					<div class="card z-depth-1 wow fadeInDown">
						<div class="p-5">
							<img src="img/home/categories/illustration-05.svg" alt="" class="w-100">
						</div>
						<a class="btn-floating halfway-fab waves-effect waves-light red btn-large">
							<i class="material-icons">add</i>
						</a>
						<div class="card-content">
							<span class="card-title">Card Title</span>
							<p>I am a very simple card. I am convenient because I require little markup to use effectively.</p>
						</div>
					</div>
				</div>

				<div class="col s12 m4 category">
					<div class="card z-depth-1 wow fadeInDown">
						<div class="p-5">
							<img src="img/home/categories/illustration-06.svg" alt="" class="w-100">
						</div>
						<a class="btn-floating halfway-fab waves-effect waves-light red btn-large">
							<i class="material-icons">add</i>
						</a>
						<div class="card-content">
							<span class="card-title">Card Title</span>
							<p>I am a very simple card. I am convenient because I require little markup to use effectively.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section id="features-items" class="mt-5">
		<div class="container">
			<h2 class="main-title">Popular products</h2>
			<div class="underline red darken-2"></div>

			<div class="row mt-5 pt-5 center-align">

				<div class="col s12 l3 m4 product">
					<div class="card z-depth-1 waves-effect">
						<div class="p-5 pb-0">
							<img src="img/home/testImg/DS_000063.jpg" alt="" class="w-100">
						</div>
						<div class="card-content">
							<span class="card-title name mb-0">Product</span>
							<p class="category">Category</p>
						</div>
					</div>
				</div>

				<div class="col s12 l3 m4 product">
					<div class="card z-depth-1 waves-effect">
						<div class="p-5 pb-0">
							<img src="img/home/testImg/DS_000021.jpg" alt="" class="w-100">
						</div>
						<div class="card-content">
							<span class="card-title name mb-0">Product</span>
							<p class="category">Category</p>
						</div>
					</div>
				</div>

				<div class="col s12 l3 m4 product">
					<div class="card z-depth-1 waves-effect">
						<div class="p-5 pb-0">
							<img src="img/home/testImg/DS_000069.jpg" alt="" class="w-100">
						</div>
						<div class="card-content">
							<span class="card-title name mb-0">Product</span>
							<p class="category">Category</p>
						</div>
					</div>
				</div>

				<div class="col s12 l3 m4 product">
					<div class="card z-depth-1 waves-effect">
						<div class="p-5 pb-0">
							<img src="img/home/testImg/IMG_8810.jpg" alt="" class="w-100">
						</div>
						<div class="card-content">
							<span class="card-title name mb-0">Product</span>
							<p class="category">Category</p>
						</div>
					</div>
				</div>

				<a class="btn-floating btn-flat btn-large waves-effect grey lighten-2 more">
					<i class="material-icons grey-text text-darken-3">add</i>
				</a>

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

	<script src="js/libs.min.js"></script>
	<script src="js/common.js"></script>
</body>

</html>