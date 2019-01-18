<!DOCTYPE html>
<html lang="en">

<head>
	<?php require "includes/head.php";?>
	<title>Contact Us | Farel Plastic</title>
	<style>
		.card.horizontal .card-image {
			max-width: 70% !important;
			width: 70% !important;
		}
	</style>
</head>

<body>
	<?php require "includes/navbar.php";?>

	<section id="contact">
		<div class="container">
			<h2 class="main-title"><?= $contact?></h2>
			<div class="underline red darken-2"></div>
			<div class="row">
				<div class="col l10 s12 offset-l1 my-5">
					<div class="card z-depth-1 hide-on-med-and-up">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.27988647175!2d-74.25986673512958!3d40.697670068477386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY!5e0!3m2!1sen!2s!4v1546600385245"
						 width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div class="card horizontal">
						<div class="card-image hide-on-small-and-down">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.27988647175!2d-74.25986673512958!3d40.697670068477386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY!5e0!3m2!1sen!2s!4v1546600385245"
							 width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
						<div class="card-stacked">
							<div class="card-content black-text">
								<p class="title-address">Address</p>
								<p class="grey-text text-darken-1">Lorem ipsum dolor sit.</p>
								<br>
								<p class="title-address">Phone numbers</p>
								<p class="grey-text text-darken-1">Lorem ipsum dolor sit.</p>
								<br>
								<p class="title-address">Email</p>
								<p class="grey-text text-darken-1">Lorem ipsum dolor sit.</p>
							</div>
							<div class="card-action">
								<a href="#" class="m-1">
									<img src="img/social-nets/facebook.jpg" width="25" alt="Facebook" title="Facebook">
								</a>
								<a href="#" class="m-1">
									<img src="img/social-nets/insta.jpg" width="25" alt="Instagram" title="Instagram">
								</a>
								<a href="#" class="m-1">
									<img src="img/social-nets/google.jpg" width="25" alt="Google" title="Google">
								</a>
								<a href="#" class="m-1">
									<img src="img/social-nets/twitter.jpg" width="25" alt="Twitter" title="Twitter">
								</a>

							</div>
						</div>
					</div>
				</div>
				<div class="col l6 s12 offset-l3">
					<div class="card z-depth-1 p-3">
						<form>
							<div class="row p-4 center-align">
								<div class="input-field col m6 s12">
									<i class="material-icons prefix">account_circle</i>
									<input id="icon_prefix" type="text" class="validate">
									<label for="icon_prefix">Full Name</label>
								</div>
								<div class="input-field col m6 s12">
									<i class="material-icons prefix">phone</i>
									<input id="icon_telephone" type="tel" class="validate">
									<label for="icon_telephone">Telephone</label>
								</div>
								<div class="input-field col s12">
									<i class="material-icons prefix">email</i>
									<input id="icon_email" type="email" class="validate">
									<label for="icon_email">Email</label>
								</div>
								<div class="input-field col s12">
									<i class="material-icons prefix">mode_edit</i>
									<textarea id="icon_prefix2" class="materialize-textarea"></textarea>
									<label for="icon_prefix2">Message</label>
								</div>
								<button class="btn waves-effect amber darken-2 center-align">Send message!</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>

	<?php require "includes/footer.php"?>
</body>

</html>