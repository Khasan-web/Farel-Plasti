<footer class="page-footer amber darken-2">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">Farel Plastic</h5>
				<p class="grey-text text-lighten-4"><?= $welcomeInfo[$activeLang]?></p>
			</div>
			<div class="col l4 offset-l2 s12">
				<h5 class="white-text">Check also:</h5>
				<ul>
				<?php
					foreach ($catArr as $cat) {
						?>
							<div class="col s12 p-0">
								<li class="py-2">
									<a href="category?category=<?= $cat['id']?>" class="white-text"><?= $cat['name']?></a>
								</li>
							</div>
						<?
					}
				?>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			www.farelplastic.uz
			<a class="grey-text text-lighten-4 right" href="/_login"><?= $admin_title[$activeLang]?></a>
		</div>
	</div>
</footer>
<script src="js/libs.min.js"></script>
<script src="js/common.js"></script>