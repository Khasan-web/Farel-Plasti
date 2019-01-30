<?php require "includes/cookie.php"?>
<!DOCTYPE html>
<html lang="<?= $activeLang?>">
<?php $title = $about[$activeLang]?>
<head>
	<?php require "includes/head.php";?>
	<title><?= $title?> | Farel Plastic</title>
</head>

<body>
	<?php require "includes/navbar.php";?>

	<section id="about-company">
		<div class="container">
			<h2 class="main-title"><?= $aboutTitle[$activeLang]?></h2>
			<div class="underline red darken-2"></div>
			<div class="row mt-4">
				<div class="col l6 m8 s12 offset-l3 offset-m2">
					<div class="card z-depth-1">
						<div class="card-content">
							<p><?= $aboutCompany[$activeLang]?></p>
						</div>
					</div>
                    <div class="col l6 m8 s8 offset-l3 offset-m2 offset-s2 my-4">
                        <img src="img/logo.png" alt="Farel Plastic" class="w-100">
                    </div>
				</div>
			</div>
		</div>
	</section>

	<?php require "includes/footer.php"?>
</body>

</html>