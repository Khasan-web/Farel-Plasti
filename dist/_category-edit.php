<?php include "widgets/auth.php"?>
<?php
    if (isset($_POST['editCategory'])) {
        $name_en = $_POST['en_name'];
        $name_ru = $_POST['ru_name'];
        $name_uz = $_POST['uz_name'];
        $name_uz_split = str_split($name_uz);
        foreach ($name_uz_split as $char) {
            if ($char != "'") {
                $name_uz_sql .= $char;
            } else {
                $name_uz_sql .= "`";
            }
        }
        $keywords = $_POST['keywords'];
        $keywords_split = str_split($keywords);
        foreach ($keywords_split as $char) {
            if ($char != '\'') {
                $keywords_sql .= $char;
            } else {
                $keywords_sql .= '`';
            }
        }
        $description = $_POST['description'];
        $desc_split = str_split($description);
        foreach ($desc_split as $char) {
            if ($char != "'") {
                $desc_sql .= $char;
            } else {
                $desc_sql .= "`";
            }
        }
        mysqli_query($con, "UPDATE `category_en` SET `name`='$name_en',`keywords`='$keywords_sql',`description`='$desc_sql' WHERE `id`=" . $_GET['id']);
        mysqli_query($con, "UPDATE `category_ru` SET `name`='$name_ru',`keywords`='$keywords_sql',`description`='$desc_sql' WHERE `id`=" . $_GET['id']);
        mysqli_query($con, "UPDATE `category_uz` SET `name`='$name_uz_sql',`keywords`='$keywords_sql',`description`='$desc_sql' WHERE `id`=" . $_GET['id']);
        header('refresh:0');
    }
?>
<?php
    if (isset($_POST['removeCat'])) {
        mysqli_query($con, "DELETE FROM `category_en` WHERE `id` = " . $_GET['id']);
        mysqli_query($con, "DELETE FROM `category_ru` WHERE `id` = " . $_GET['id']);
        mysqli_query($con, "DELETE FROM `category_uz` WHERE `id` = " . $_GET['id']);
        header("Location: /_admin?username=$admin[username]&password=$admin[password]&auth=$_GET[auth]");
    }
?>
<?php
    $admin_data = mysqli_query($con, "SELECT * FROM `admin`");
    $admin = mysqli_fetch_assoc($admin_data);
    if ($_GET['username']  != $admin['username'] || $_GET['password']  != $admin['password'] || $_GET['auth']  != $admin['auth_key']) {
        header("Location: /_login.php");
    }
?>
<?php
    // get products
    $products = mysqli_query($con, "SELECT COUNT(`id`) AS `product_count` FROM `product_en` WHERE `category_id` = " . $_GET['id']);
    $product_count = mysqli_fetch_assoc($products);
    $product_count = $product_count['product_count'];
?>
<?php
    // get category
    $cat_en = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `category_en` WHERE `id` = " . $_GET['id']));
    $cat_ru = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `category_ru` WHERE `id` = " . $_GET['id']));
    $cat_uz = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `category_uz` WHERE `id` = " . $_GET['id']));
    if ($activeLang == 'ru') {
        $cat = $cat_ru;
    } else if ($activeLang == 'en') {
        $cat = $cat_en;
    } else if ($activeLang == 'uz') {
        $cat = $cat_uz;
    }
?>
<?php require "includes/cookie.php"?>
<!DOCTYPE html>
<html lang="<?= $activeLang?>">
<?php $title = $cat_edit[$activeLang];?>
<head>
	<?php require "includes/head.php";?>
	<title><?= $title?> | Farel Plastic</title>
</head>

<body>
	<?php require "includes/navbar.php";?>
    
    <section id="category_edit">
        <div class="container">
        <?php include 'widgets/backToAdmin.php'?>
            <h2 class="main-title"><?= $cat['name']?></h2>
			<div class="underline red darken-2"></div>
                <div class="card horizontal mt-5">
                    <div class="row m-0 w-100">
                        <div class="col l4 m12">
                            <div class="card-image p-5" style="max-width: 100%">
                                <img src="img/home/categories/<?= $cat['illustration']?>" style="width: 100%">
                            </div>
                        </div>
                        <div class="col l8 m12">
                            <div class="card-stacked">
                                <div class="card-content">
                                <span class="grey-text mr-4"><?= $keywords[$activeLang]?>:</span> 
                                <p class="mb-5"><?= $cat['keywords']?></p>
                                <span class="grey-text mr-4"><?= $desc[$activeLang]?>:</span> 
                                <p class="mb-5"><?= $cat['description']?></p>
                                <span class="grey-text mr-4"><?= $qty[$activeLang]?>:</span> 
                                <p class="mb-5"><?= $product_count?></p>
                                </div>
                                <div class="card-action">
                                    <a href="/_category-products?username=<?= $admin['username']?>&password=<?= $admin['password']?>&auth=<?= $_COOKIE['auth_key']?>&id=<?= $cat['id']?>" class="btn btn-small amber"><?= $seeProd[$activeLang]?></a>
                                    <a href="#edit_form" class="btn btn-small blue"><?= $edit[$activeLang]?></a>
                                    <form action="" method="post" style="display: inline">
                                        <button type="submit" name="removeCat" class="btn btn-small red" onclick="return confirm('Remove this category?');"><?= $remove[$activeLang]?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
        </div> <!-- /container -->
    </section>

    <section id="edit_form" class="my-5 pt-5">
        <div class="container">
            <h2 class="main-title"><?= $edit[$activeLang]?></h2>
            <div class="underline red darken-2"></div>
            <div class="row">
                <div class="col l4 m6 s12 offset-l4 offset-m3">
                    <p class="grey-text center-align"><?= $noteAboutLangs[$activeLang]?></p>
                </div>
            </div>
            <form action="" method="post" class="mt-5">
                <div class="row">
                    <div class="input-field col l4 m6 s12">
                        <input id="en_name" name="en_name" type="text" class="validate" required value="<?= $cat_en['name']?>">
                        <label for="en_name">En <?= $name[$activeLang]?></label>
                    </div>
                    <div class="input-field col l4 m6 s12">
                        <input id="ru_name" name="ru_name" type="text" class="validate" required value="<?= $cat_ru['name']?>">
                        <label for="ru_name">Ru <?= $name[$activeLang]?></label>
                    </div>
                    <div class="input-field col l4 m6 s12">
                        <input id="uz_name" name="uz_name" type="text" class="validate" required value="<?= $cat_uz['name']?>">
                        <label for="uz_name">Uz <?= $name[$activeLang]?></label>
                    </div>
                    <div class="input-field col m12 s12">
                        <input id="keywords" name="keywords" type="text" class="validate" required value="<?= $cat['keywords']?>">
                        <label for="keywords"><?= $keywords[$activeLang]?></label>
                    <span class="helper-text"><?= $helperKeywords[$activeLang]?></span>
                    </div>
                    <div class="input-field col m12 s12">
                        <textarea id="description" name="description" type="text" required class="materialize-textarea" data-length="200"><?= $cat['description']?></textarea>
                        <label for="description"><?= $desc[$activeLang]?></label>
                    </div>
                </div>
                <div class="center-align">
                    <button name="editCategory" type="submit" class="btn amber"><?= $edit[$activeLang]?></button>
                </div>
            </form>
        </div>
    </section>

    <?php require "includes/footer.php"?>
</body>

</html>