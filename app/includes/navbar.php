<?php
	// get categories for dropdown
	$categories = mysqli_query($con, "SELECT * FROM `category_$activeLang`");
	$catArr = array();
	$count = 0;
	while ($catsData = mysqli_fetch_assoc($categories)) {
		$catArr[] = $catsData;
		$count++;
	}
?>
<!-- navbar -->
<nav class="amber px-2">
	<div class="nav-wrapper">
		<a href="/" class="brand-logo">
			<img src="img/logo.png" alt="logo" width="70">
		</a>
		<div class="chip"><?= $title?>
		</div>
		<a href="#" data-target="nav-mobile" class="sidenav-trigger">
			<i class="material-icons">menu</i>
        </a>
        <a class="show-on-medium-and-down search-mobile open-search">
			<i class="material-icons">search</i>
		</a>
		<ul class="right hide-on-med-and-down">
			<li class="waves-effect">
				<a href="/"><?= $home[$activeLang]?></a>
			</li>
			<li class="waves-effect">
				<a href="/about"><?= $about[$activeLang]?></a>
			</li>
			<li class="cats-item">
				<a href="" class="dropdown-trigger" data-target="categories">
					<?= $cats[$activeLang]?>
				</a>
				<ul id="categories" class="dropdown-content categories-dropdown">
					<div class="row mb-0">
					<?php
						foreach ($catArr as $cat) {
							?>
								<div class="col s12 p-0">
									<li>
										<a href="category?category=<?= $cat['id']?>" class="black-text"><?= $cat['name']?></a>
									</li>
								</div>
							<?
						}
					?>
					</div>
				</ul>
			</li>
			<li class="waves-effect">
				<a href="/contact"><?= $contact[$activeLang]?></a>
			</li>
			<li class="open-search waves-effect">
				<a>
					<i class="material-icons">search</i>
				</a>
			</li>
			<li>
				<a class="dropdown-trigger" data-target="lang">
					<i class="material-icons">language</i>
				</a>
				<ul id="lang" class="dropdown-content">
					<form action="" method="post">
						<li class="valign-wrapper">
							<a href="" class="black-text p-0 w-100">
								<button type="submit" name="ru" class="btn btn-flat language white w-100">
								<img width="20" src="img/langs/ru.png" class="mr-3" alt=""> Ру</button>
							</a>
						</li>
						<li class="valign-wrapper">
							<a href="" class="black-text p-0 w-100">
								<button type="submit" name="en" class="btn btn-flat language white w-100 waves-effect">
								<img width="20" src="img/langs/eng.png" class="mr-3" alt=""> En</button>
							</a>
						</li>
						<li class="valign-wrapper">
							<a href="" class="black-text p-0 w-100">
								<button type="submit" name="uz" class="btn btn-flat language white w-100">
								<img width="20" src="img/langs/uz.png" class="mr-3" alt=""> Uz</button>
							</a>
						</li>
					</form>
				</ul>
			</li>
		</ul>
	</div>
</nav>

<ul id="nav-mobile" class="sidenav">
	<li>
		<div class="user-view">
			<div class="background">
				<img src="img/bg-nav.jpg" alt="">
			</div>
			<a href="#">
				<img class="" src="img/logo.png" alt="" width="100">
			</a>
			<a href="#">
				<span class="white-text name">Farel Plastic</span>
			</a>
			<a href="#">
				<span class="white-text email">info@farelplastic.uz</span>
			</a>
		</div>
	</li>
	<li class="waves-effect w-100">
        <a href="/"><i class="material-icons">home</i><?= $home[$activeLang]?></a>
	</li><br>
	<li class="waves-effect w-100">
        <a href="/about"><i class="material-icons">account_circle</i><?= $about[$activeLang]?></a>
	</li><br>
	<li class="waves-effect w-100">
        <a href="/contact"><i class="material-icons">phone</i><?= $contact[$activeLang]?></a>
	</li><br>
	<li class="w-100">
		<a href="" class="dropdown-trigger" data-target="lang2">
			<i class="material-icons">language</i><?= $language[$activeLang]?>
		</a>
		<ul id="lang2" class="dropdown-content">
					<form action="" method="post">
						<li class="valign-wrapper">
							<a href="" class="black-text p-0 w-100">
								<button type="submit" name="ru" class="btn btn-flat language white w-100">
								<img width="20" src="img/langs/ru.png" class="mr-3" alt=""> Ру</button>
							</a>
						</li>
						<li class="valign-wrapper">
							<a href="" class="black-text p-0 w-100">
								<button type="submit" name="en" class="btn btn-flat language white w-100 waves-effect">
								<img width="20" src="img/langs/eng.png" class="mr-3" alt=""> En</button>
							</a>
						</li>
						<li class="valign-wrapper">
							<a href="" class="black-text p-0 w-100">
								<button type="submit" name="uz" class="btn btn-flat language white w-100">
								<img width="20" src="img/langs/uz.png" class="mr-3" alt=""> Uz</button>
							</a>
						</li>
					</form>
				</ul>
	</li>
	<li>
		<div class="divider"></div>
	</li>
	<li>
		<a class="subheader"><?= $cats[$activeLang]?></a>
	</li>
	<?php
		foreach ($catArr as $cat) {
			?>
				<div class="col s12 p-0">
					<li>
						<a href="category?category=<?= $cat['id']?>" class="black-text"><?= $cat['name']?></a>
					</li>
				</div>
			<?
		}
	?>
</ul>

<!-- search -->
<nav class="amber search">
	<div class="nav-wrapper">
		<form action="search?>" method="get">
			<div class="input-field">
				<input id="search" name="search" type="search" required style placeholder="<?= $searchPlaceholder[$activeLang]?>">
				<label class="label-icon" for="search">
					<i class="material-icons">search</i>
				</label>
				<button type="submit" class="btn waves-amber amber waves-effect z-depth-0 search-submit">Search</button>
			</div>
		</form>
	</div>
</nav>


<!-- loader -->
<section id="loader">
	<div class="preloader-wrapper big active">
		<div class="spinner-layer spinner-yellow-only">
		<div class="circle-clipper left">
			<div class="circle"></div>
		</div><div class="gap-patch">
			<div class="circle"></div>
		</div><div class="circle-clipper right">
			<div class="circle"></div>
		</div>
		</div>
	</div>
</section>