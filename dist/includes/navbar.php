<!-- Getting categories -->
<?php

$categories = mysqli_query($con, "SELECT * FROM `category_" . $_GET['lang'] . "`");
$catsArr = array();
while ($catsData = mysqli_fetch_assoc($categories)) {
	$catsArr[] = $catsData;
}

?>

<!-- navbar -->
<nav class="amber px-2">
	<div class="nav-wrapper">
		<a href="/" class="brand-logo">
			<img src="img/logo.png" alt="logo" width="70">
		</a>
		<a href="#" data-target="nav-mobile" class="sidenav-trigger">
			<i class="material-icons">menu</i>
        </a>
        <a class="show-on-medium-and-down search-mobile open-search">
			<i class="material-icons">search</i>
		</a>
		<ul class="right hide-on-med-and-down">
			<li class="waves-effect">
				<a href="/"><?= $home?></a>
			</li>
			<li class="waves-effect">
				<a href="/about.php"><?= $about?></a>
			</li>
			<li class="cats-item">
				<a href="" class="dropdown-trigger" data-target="categories">
					<?= $cats?>
				</a>
				<ul id="categories" class="dropdown-content categories-dropdown">
					<div class="row mb-0">
					<?php
						foreach ($catsArr as $cat) {
							?>
								<div class="col s12 p-0">
									<li>
										<a href="category.php?category=<?= $cat['id']?>" class="black-text"><?= $cat['name']?></a>
									</li>
								</div>
							<?
						}
					?>
					</div>
				</ul>
			</li>
			<li class="waves-effect">
				<a href="/contact.php"><?= $contact?></a>
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
					<li>
						<a href="?lang=ru" class="black-text">
							<img width="20" src="img/langs/ru.png" class="mr-3" alt=""> Ru
						</a>
					</li>
					<li>
						<a href="?lang=en" class="black-text">
							<img width="20" src="img/langs/eng.png" class="mr-3" alt=""> En
						</a>
					</li>
					<li>
						<a href="?lang=uz" class="black-text">
							<img width="20" src="img/langs/uz.png" class="mr-3" alt=""> Uz
						</a>
					</li>
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
        <a href="/?lang=<?= $_GET['lang']?>"><i class="material-icons">home</i><?= $home?></a>
	</li><br>
	<li class="waves-effect w-100">
        <a href="about.php?lang=<?= $_GET['lang']?>"><i class="material-icons">account_circle</i><?= $about?></a>
	</li><br>
	<li class="waves-effect w-100">
        <a href="contact.php?lang=<?= $_GET['lang']?>"><i class="material-icons">phone</i><?= $contact?></a>
	</li><br>
	<li class="w-100">
		<a href="" class="dropdown-trigger" data-target="lang2">
			<i class="material-icons">language</i><?= $language?>
		</a>
		<ul id="lang2" class="dropdown-content">
			<li>
				<a href="&lang=ru" class="black-text">
					<img width="20" src="img/langs/ru.png" class="mr-3" alt=""> Ru</a>
			</li>
			<li>
				<a href="&lang=en" class="black-text">
					<img width="20" src="img/langs/eng.png" class="mr-3" alt=""> En</a>
			</li>
			<li>
				<a href="&lang=uz" class="black-text">
					<img width="20" src="img/langs/uz.png" class="mr-3" alt=""> Uz</a>
			</li>
		</ul>
	</li>
	<ul id="lang" class="dropdown-content">
		<li>
			<a href="&lang=ru" class="black-text">
				<img width="20" src="img/langs/ru.png" class="mr-3" alt=""> Ru</a>
		</li>
		<li>
			<a href="&lang=en" class="black-text">
				<img width="20" src="img/langs/eng.png" class="mr-3" alt=""> En</a>
		</li>
		<li>
			<a href="&lang=uz" class="black-text">
				<img width="20" src="img/langs/uz.png" class="mr-3" alt=""> Uz</a>
		</li>
	</ul>
	</li>
	<li>
		<div class="divider"></div>
	</li>
	<li>
		<a class="subheader"><?= $cats?></a>
	</li>
	<li>
		<a href="#!">Category 1</a>
	</li>
	<li>
		<a href="#!">Category 2</a>
	</li>
	<li>
		<a href="#!">Category 3</a>
	</li>
	<li>
		<a href="#!">Category 4</a>
	</li>
	<li>
		<a href="#!">Category 5</a>
	</li>
</ul>

<!-- search -->
<nav class="amber search">
	<div class="nav-wrapper">
		<form action="search.php?lang=<?= $_GET['lang']?>" method="get">
			<div class="input-field">
				<input id="search" name="search" type="search" required style placeholder="<?= $searchPlaceholder?>">
				<label class="label-icon" for="search">
					<i class="material-icons">search</i>
				</label>
				<button type="submit" class="btn waves-amber amber waves-effect z-depth-0 search-submit">Search</button>
			</div>
		</form>
	</div>
</nav>