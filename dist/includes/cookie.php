<?php

if ($_GET['lang']) {
    setcookie('lang', $_GET['lang'], time() + (86400 * 30), "/");
}

?>