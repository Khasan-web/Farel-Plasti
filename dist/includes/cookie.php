<?php
// language switcher
if (isset($_POST['uz'])) {
	setcookie('lang', 'uz', time() + (86400 * 30), "/");
	header('refresh:0');
} else if (isset($_POST['ru'])) {
	setcookie('lang', 'ru', time() + (86400 * 30), "/");
	header('refresh:0');
} else if (isset($_POST['en'])) {
	setcookie('lang', 'en', time() + (86400 * 30), "/");
	header('refresh:0');
}
?>
<?php require "includes/language.php"?>